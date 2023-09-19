<?php

namespace App\Http\Controllers\Bulk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use \App\Models\Management\CatalogProducts;

class UploadExcelController extends Controller
{
    public function __construct(Request $request)
    {
        $this->_request = $request;
        $this->group = $this->_request->group;
        $this->page = $this->_request->page;
        $this->table = strtolower($this->_request->table);
        $this->file = $this->_request->file('upload_file');
        Log::useDailyFiles(storage_path() . '/logs/uploadExcel.log');
    }

    public function updload()
    {
        return $this->validateExtension()
            ? $this->readExcel()
            : redirectType(__('The file must have an .xsl or .xlsx extension'), 'errors');
    }

    public function validateExtension()
    {
        $ext = $this->file->getClientOriginalExtension();

        return !($ext != 'xls' && $ext != 'xlsx');
    }

    public function readExcel()
    {
        $path = $this->file->getRealPath();
        $this->messageLog('Leyendo Excel...');
        $response = 0;

        try {
            DB::beginTransaction();

            $data = Excel::selectSheetsByIndex(0)->load($path, function ($reader) {
                $reader->ignoreEmpty();
            })->get();

            $response = $this->processateData($data);

            if ($response[0] == 'true') DB::commit();

            $this->messageLog('Excel Leido');
        } catch (\Throwable $th) {
            DB::rollback();
        }

        if ($this->table == 'catalog_products') $this->uploadImages($response[0]);

        return $response[0] == 'true'
            ? redirectType(__($response[1] . " Products added successfully"), 'success')
            : redirectType($response[0], 'errors', true);
    }

    public function processateData($data)
    {
        $response = null;
        $key = 0;

        //Quitar registros vacios
        $newData = [];
        $headings = $data->getHeading();
        collect($data)->each(function ($value) use (&$newData, $headings) {
            if (count($value) == count($headings)) {
                array_push($newData, $value);
            } else {
                return false;
            }
        });

        // Se sobrescribe el arreglo con los nuevos items 
        count($newData) > 0 && $data = $newData;

        foreach ($data as $key => $values) {
            foreach ($headings as $column => $value) {
                if ((str_contains($values->$value, ' - ')))
                    //$value = trim(explode('_id', $value)[0]);
                    $values->$value = trim(explode(' - ', $values->$value)[1]);
            };


            if (strlen($values) <= 2 || is_null($values)) break;
            $this->messageLog('Procesando Registro ' . $key . '->' . $values . ' ' . '<-');

            $count = CatalogProducts::where('catalog_id', $values->catalog_id)
                ->count();

            $count = $count > 0
                ? $count + 1
                : $key + 1;

            $response = $this->saveRows($values, $count);

            if ($response != 'true') break;
        }

        return [$response, $key + 1];
    }

    public function saveRows($values, $sequence)
    {
        $className = 'App\\Http\\Controllers\\' . ucfirst($this->group) . '\\' . ucfirst($this->page) . 'Controller';
        $controller = new \ReflectionClass($className);
        $response = 1;
        $values->put('excel', true);
        $values->put('sequence', $sequence);

        if ($controller->hasMethod("save")) {
            $response = $controller->getMethod("save")->invokeArgs(
                new $className(),
                array(
                    $values,
                    $this->group,
                    $this->page
                )
            );
        }
        return $response;
    }

    public function uploadImages($response)
    {
        if ($response == 'true') {
            $images = new UploadBulkImageController($this->_request);
            $images->uploadImage();
        }
    }

    public function messageLog($message)
    {
        Log::info($message);
    }
}
