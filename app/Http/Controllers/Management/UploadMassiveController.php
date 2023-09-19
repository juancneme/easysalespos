<?php

namespace App\Http\Controllers\Management;

    use App\Models\Management\Catalog;
use App\Models\Management\CatalogProducts;
use App\Models\Management\Category;
use App\Models\Management\Contract;
use App\Models\Management\ExcelField;
use App\Models\Management\Inventory;
use App\Models\Management\Lists;
use App\Models\Management\Supplier;
use App\Models\Management\User;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Protection;
use Validator;
use Illuminate\Support\Facades\DB;
use PHPExcel_IOFactory;
use Carbon\Carbon;
use ZipArchive;

const RANGE = 500;
const status = 'status';
const SCHEMA = 'easysalespos';
const SALES_UNITIES = 53;

/**
 * Class UploadMassiveController
 * @package App\Http\Controllers\Management
 */
class UploadMassiveController extends Controller
{
    /**
     *Consultas para saca la info de los schema de las tablas
     * @param $request
     */
    private function queryCallBack($request)
    {
        //Trae las columnas de la tabla
        $this->columns = \DB::select(\DB::raw("SELECT INFORMATION_SCHEMA.COLUMNS.* FROM INFORMATION_SCHEMA.COLUMNS
                            WHERE TABLE_SCHEMA =" . "'" . SCHEMA . "'" . " AND TABLE_NAME =" . "'" . strtolower($request->table) . "'" . ";"));

        $this->items = \DB::select(\DB::raw("SELECT TAB1.FOR_NAME, TAB2.FOR_COL_NAME, TAB1.REF_NAME, TAB2.REF_COL_NAME
                                                FROM INFORMATION_SCHEMA.INNODB_SYS_FOREIGN AS TAB1
                                                INNER JOIN INFORMATION_SCHEMA.INNODB_SYS_FOREIGN_COLS AS TAB2 ON TAB2.ID = TAB1.ID
                                                WHERE TAB1.FOR_NAME ='" . SCHEMA . "/" . strtolower($request->table) . "'"));


        $this->units = $request->units;
        $this->unitPassed = [];

    }

    /**
     * @param Request $request
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     * @throws \PHPExcel_Writer_Exception
     */
    public function downloadFile(Request $request)
    {

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Template.xlsx"');
        header('Cache-Control: max-age=0');

        error_reporting(E_ALL);
        ini_set('display_errors', true);
        $objPHPExcel = new \PHPExcel();
        $table = strtolower($request->table);

        //Llamado de las consultas
        $this->queryCallBack($request);

        //Agreaga los campos a la tabla
        //Aca se colocan todos los campos a omitir
        tableFieldExcel($this->columns, $request->exceptionfields);


        /*Info General Excel*/
        // Propiedades del documento
        $objPHPExcel->getProperties()->setCreator("Administrador")
            ->setLastModifiedBy("admin")
            ->setTitle("Office 2007 XLSX Documento cargue tabla : " . $table)
            ->setSubject("Office 2007 XLSX Documento cargue tabla : " . $table)
            ->setDescription("Documento de cargue tabla " . $table . " para Office 2007 XLSX, generado usando clases de PHP.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Archivo con resultado tabla " . $table);

        $head = 1;
        $activa = 0;
        $lastColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
        $lastRow = $objPHPExcel->getActiveSheet()->getHighestRow() + 1;
        $boldArray = array('font' => array('bold' => true,), 'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        $objPHPExcel->getActiveSheet($activa)->setTitle("Items");
        $objPHPExcel->getActiveSheet($activa)->getColumnDimension($lastColumn);
        $numberSheets = 1;
        $tittles = ExcelField::where('name_table', $table)->where('status', 1)->get();
        //Creacion de titulos
        $range = count($tittles);
        for ($i = 0; $i < count($tittles); $i++)
        {
            $objPHPExcel->setActiveSheetIndex($activa)->setCellValue($lastColumn . $head, $tittles[$i]->name_field);
            $objPHPExcel->setActiveSheetIndex($activa)
                ->getStyle($lastColumn . $head)
                ->getFill()
                ->setFillType(\PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY);

            $objPHPExcel->setActiveSheetIndex($activa)->getStyle($lastColumn . $head)->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $lastColumn++;
        }
        if($request->table != 'catalog_products')
        {
            $objPHPExcel->setActiveSheetIndex($activa)->setCellValue($lastColumn . $head, 'description'); //TODO Columna especifica
            $objPHPExcel->setActiveSheetIndex($activa)
                ->getStyle($lastColumn . $head)
                ->getFill()
                ->setFillType(\PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY);

        }
        $lastColumn = "A";
        for ($j = 0; $j < count($tittles); $j++) {
            for ($i = 0; $i < count($this->columns); $i++) {
                if ($this->columns[$i]->COLUMN_NAME == $tittles[$j]->name_field) {
                    if ($this->columns[$i]->EXTRA != "auto_increment") {
                        if ($this->columns[$i]->COLUMN_KEY != "" || $this->columns[$i]->COLUMN_NAME == 'status') {
                            if ($this->columns[$i]->COLUMN_NAME != 'supplier_id') {
                                $objPHPExcel->createSheet($numberSheets)->setTitle($this->columns[$i]->COLUMN_NAME)->setSheetState(\PHPExcel_Worksheet::SHEETSTATE_HIDDEN); // Creamos las pestañas con los titulos
                            }
                            if (count(explode(',', $request->units)) > 0) {
                                $itemsFila = $this->phpSheets($objPHPExcel, $this->columns[$i], 0);
                            } else if (!empty($request->units) && !strpos($request->units, ',')) {

                                $itemsFila = $this->phpSheets($objPHPExcel, $this->columns[$i], $request->units);
                            } else {

                                $itemsFila = $this->phpSheets($objPHPExcel, $this->columns[$i]);
                            }

                            if($table !== 'inventory')
                                $this->dropDownFormat($objPHPExcel, $lastColumn, $this->columns[$i], $itemsFila);

                            $numberSheets += 1;
                        }
                    }

                    //Ancho de las columnas
                    $objPHPExcel->getActiveSheet($activa)->getColumnDimension($lastColumn)->setWidth(20);
                    // Fuente de la primera fila en negrita
                    $objPHPExcel->getActiveSheet($activa)->getStyle($lastColumn)->applyFromArray($boldArray);
                    $lastColumn++; //va iterando desde la B,C...n en la fila 1 ($head)
                }
            }
        }

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
//        $objPHPExcel->getActiveSheet()->getProtection()->setSheet(true);
//        $objPHPExcel->getActiveSheet()->getStyle('A2:' . $lastColumn . RANGE)->getProtection()->setLocked(\PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
//        $objPHPExcel->getActiveSheet()->getStyle('A1:' . $lastColumn . RANGE)->setQuotePrefix(true);

        if ($table === 'inventory') {
            $data = CatalogProducts::where('catalog_id', $request->catalog)
                ->where('inventory_control',0)->get();

            for ($i = 0; $i < count($data); $i++) {
                $catalogName = Catalog::where('id', $data[$i]->catalog_id)->value('name');
                $productName = CatalogProducts::where('id', $data[$i]->product_id)->value('name');
                
                $objPHPExcel->setActiveSheetIndex($activa)->setCellValue('A' . $lastRow, $catalogName . ' - '. $data[$i]->catalog_id)->getStyle('A' . $lastRow)
                    ->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('EBF5FB');

                $objPHPExcel->setActiveSheetIndex($activa)->setCellValue('B' . $lastRow, $data[$i]->name .' - '. $data[$i]->id)->getStyle('B' . $lastRow)
                    ->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('EBF5FB');

                $objPHPExcel->setActiveSheetIndex($activa)->setCellValue('C' . $lastRow, $data[$i]->saleprice);
                $objPHPExcel->setActiveSheetIndex($activa)->setCellValue('D' . $lastRow, 0);

                $objPHPExcel->setActiveSheetIndex($activa)->getStyle('A' . $lastRow)->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $objPHPExcel->setActiveSheetIndex($activa)->getStyle('B' . $lastRow)->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $objPHPExcel->setActiveSheetIndex($activa)->getStyle('C' . $lastRow)->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $objPHPExcel->setActiveSheetIndex($activa)->getStyle('D' . $lastRow)->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $objPHPExcel->setActiveSheetIndex($activa)->getStyle('C' . $lastRow)->getNumberFormat()->setFormatCode('$ #,##0.00');

                foreach(range('A','B') as $columnID) {
                    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                        ->setAutoSize(true);
                }
                $lastColumn++;

                $lastRow++;
            }
        }

        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $objWriter->save('php://output');
        exit;
    }

    /**
     * Carga el archivo excel al sistema
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadFile(Request $request)
    {
        $group = $request->group;
        $page = $request->page;

        if($page == 'Inventorycatalogsproducts'){
            $validator = Validator::make($request->all(), [
                'upload_file' => 'required',
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'upload_file' => 'required',
                'upload_image' => 'required'
            ]);
        }

        if ($validator->fails()) return back()->with('errors', array(__("Please upload a file")));

        $table = strtolower($request->table);
        $file = $request->file('upload_file');
        $ext = $file->getClientOriginalExtension();

        $images = $request->file('upload_image');

        if ($ext == 'xls' || $ext == 'xlsx') {
            $path = $file->getRealPath();

            //Lee el excel
            try {
                Log::info('Antes de Leer Excel');
                //Lee la 1 hoja e ignora los campos null
                $data = Excel::selectSheetsByIndex(0)->load($path, function ($reader) {
                    $reader->ignoreEmpty();
                })->get();

                Log::info('Despues de Leer Excel');

                $newdata =[];

                foreach ($data->getHeading() as $id => $key){
                    Log::info('Procesando registro ' . $id . '->' . $key . '<-');
                    foreach ($data as $id1 => $values) {
                        Log::info('Procesando registro ' . $id1 . '->' . $values . ' ' . strlen($values) . '<-');

                        if(strlen($values) <= 2){
                            break;
                        }
                        isset($values[$key]) && $values[$key] !=null ? array_push($newdata,$values) : null;
                    }
                    break;
                }

                Log::info('Saliendo del foreach');

            } catch (\Throwable $th) {
                if (isset($request->catalog)) {
                    $id = $request->catalog;
                    return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('File not supported'));
                }
                return redirect(strtolower($group . '/' . $page))->with('errors', __('File not supported'));
            }
            $headersNewExcel = $data->getHeading();

            Log::info('header: ' . $headersNewExcel[0]);

            $headersPlantilla = ExcelField::select('name_field')
                ->where('name_table', '=', $table)
                ->where('status', '=', 1)
                ->orderBy('id', 'asc')->get();

            Log::info('headerPlantilla: ' . $headersPlantilla[0]);

            Log::info('Entrando a las validaciones');

            /**
             *

            $validate = $this->validateProduct($data,$request->catalog);
            if ($validate['status'] === false) {
                $id = $request->catalog;
                return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('El producto ' . $validate['index'] . ' ya existe'));
            }

            //Validar categorias
            $validateCategory = $this->validateCategory($data, $request->catalog, $group, $page);
            if ($validateCategory['status'] === false) {
                $id = $request->catalog;
                return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('La categoría ' . $validateCategory['index'] . ' con id ' . $validateCategory['id'] . ' no existe, por favor revise todos sus daots e intente nuevamente'));
            }

            //Validar unidades
            $validateUnity = $this->validateUnity($data, $request->catalog, $group, $page);
            if ($validateUnity['status'] === false) {
                $id = $request->catalog;
                return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('La unidad ' . $validateUnity['index'] . ' con id ' . $validateUnity['id'] . ' no existe, por favor revise todos sus daots e intente nuevamente'));
            }

            //Validar campos
             $validateFields = $this->validateFields($data);
             if(isset($validateFields['product'])){
                if ($validateFields['status'] === false) {
                    $id = $request->catalog;
                    return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('El campo ' .  $validateFields['index'] . ' del producto ' . $validateFields['product'] . ' está vacio, por favor revise todos sus datos e intente nuevamente'));
                }
             }
             * */

            Log::info('Saliendo de validaciones');
             
            if (count($headersNewExcel) == count($headersPlantilla)) {
                //Compara las columnas de la BD con las que viene en el excel
                for ($i = 0; $i < count($headersPlantilla); $i++) {
                    if ($headersPlantilla[$i]['name_field'] != $headersNewExcel[$i]) {
                        return back()->with('errors', array(__("The columns do not correspond, please download the format again")));
                    }
                }
                $data = $newdata;

                if (!empty($data) && count($data)) {

                    $images_name = [];
                    $imagesArray = [];
                    $imagesNamesArray = [];

                    foreach ($data as $d){
                        if(!empty($d->image))array_push($images_name, str_replace('-',' ',$d->image));
                    }
                    try {
                        DB::beginTransaction();
                        foreach ($data as $key => $value) {
                            $request = new Request($value->all());
                            foreach ($request->all() as $key1 => $val) {
                                if (strpos($key1, '_id'))
                                    $request->query->add([str_ireplace('_id', '', $key1) => $val]);
                            }
                            foreach ($request->all() as $key2 => $val) {
                                if($key2 != 'image'){
                                    if($table !== 'inventory'){
                                        if (strpos($val, '-')) {
                                            $pos = strpos($val, '-');
                                            $id = substr($val, $pos + 1);
                                            $request->query->add([str_ireplace('-', '', $key2) => trim($id)]);
                                        }
                                    }
                                }
                            }

                            //Agragrar variables propias del modulo
                            $request->query->add(['status' => 1]);
                            $request->query->add(['excelFile' => true]);
                            //PRODUCTS
                            $request->query->add(['localtaxonomy' => 'x.x.x.x.x']);
                            $request->query->add(['excelData' => $data]);

                            /**
                            if(!empty($images)){
                                foreach($images as $image){
                                    $name = trim(strtolower(str_replace('-',' ',$image->getClientOriginalName())));
                                    array_push($imagesNamesArray, $name);
                                    array_push($imagesArray, $image);
                                }
                                $request->query->add(['imagesExcelNames' => $images_name]);
                                $request->query->add(['imagesNames' => $imagesNamesArray]);
                                $request->files->add($imagesArray);
                            }
                             **/

                            //CANTRACTS
                            $hoy = Carbon::now();
                            $request->query->add(['startdate' => $hoy]);
                            $request->query->add(['enddate' => $hoy->addyear()]);
                            $request->query->add(['id' => $request->catalog]);
                            //Trae algun relacion
                            $id = $this->getCustomRelation($request, $group, $page);
                            $request->merge([
                                'supplier' => $id,
                            ]);

                            //Invoca el metodo del controllador correspondiente al group y al page
                            Log::info('Antes de entrar al constructor');
                            $className = 'App\\Http\\Controllers\\' . ucfirst($group) . '\\' . ucfirst($page) . 'Controller';
                            $controller = new \ReflectionClass($className);
                            if ($controller->hasMethod("save")) {
                                $response = $controller->getMethod("save")->invokeArgs(new $className(), array($request, $group, $page));
                            }
                            Log::info('Despues de entrar al constructor');

                        }
                    } catch (\Exception $e) {
                        DB::rollback();
                        if (isset($request->catalog)) {
                            $id = $table == 'inventory' ? $this->catalogId($request->catalog) : $request->catalog;
                            return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('Ocurrio un error inesperado favor comunicarse con un administrador'));
                        }
                        DB::rollback();
                        return redirect(strtolower($group . '/' . $page))->with('errors', array(__("Ocurrio un error inesperado favor comunicarse con un administrador")));
                    }
                }

            } else {
                if (isset($request->catalog)) {
                    $id = $table == 'inventory' ? $this->catalogId($request->catalog) : $request->catalog;
                    return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('The number of columns is not correct, please download the format again'));
                }
                return redirect(strtolower($group . '/' . $page))->with('errors', array(__("The number of columns is not correct, please download the format again")));
            }

        }
        else {
            if (isset($request->catalog)) {
                $id = $table == 'inventory' ? $this->catalogId($request->catalog) : $request->catalog;
                return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __('The file must have an .xsl or .xlsx extension'));
            }
            return redirect(strtolower($group . '/' . $page))->with('errors', array(__("The file must have an .xsl or .xlsx extension")));

        }

        if ($response === true) {
            DB::commit();
            if (isset($request->catalog)) {
                $id = $table == 'inventory' ? $this->catalogId($request->catalog) : $request->catalog;


                if($table == 'catalog_products') {
                    $this->ftpProcess($request, $images);
                    $result = $this->moveImages($request);
                }
                else{
                    $result =true;
                }

                if($result === true)
                    return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('success', __($table !== 'inventory' ? 'Products added successfully' : 'Saved successfuly'));
                else
                    //DB::delete('delete from catalog_products where catalog_id = ' . $request->catalog);
                    return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', __( 'Error uploading files'));
            }
            return redirect(strtolower($group . '/' . $page))->with('success', array(__("Products added successfully")));

        } else {
            DB::rollback();
            if (isset($request->catalog)) {
                $id = $request->catalog;
                return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $id)->with('errors', array(__("File can't be readed. Please review data and try again later")));
            }
            return redirect(strtolower($group . '/' . $page));

        }

    }

    /**
     * Crea las hojas de calculo
     *
     * @param $objPHPExcel
     * @param $numberSheets
     * @param $columns
     */

    private function phpSheets($objPHPExcel, $nameColumns, $uni = 0)
    {
        $array = explode(',', $this->units);
        for ($a = 0; $a < count($this->items); $a++) {
            if ($nameColumns->COLUMN_NAME != 'supplier_id' && $nameColumns->COLUMN_NAME == $this->items[$a]->FOR_COL_NAME && $nameColumns->COLUMN_NAME) {
                $string = str_replace('/', '.', $this->items[$a]->REF_NAME);

                if (strpos($this->items[$a]->REF_NAME, 'lists')) {
                    foreach ($array as $key => $value) {
                        if (!in_array($value, $this->unitPassed)) {
                            array_push($this->unitPassed, $value);
                            $uni = $value;
                        } else {
                            continue;
                        }
                        break;
                    }
                    $tableLabels = Lists::where('idowner', '=', $uni)
                        ->whereRaw('id <> idowner')
                        ->orderBy('order', 'asc')->get();

                } elseif (strpos($this->items[$a]->REF_NAME, 'persons')) {

                    $tableLabels = \DB::select(\DB::raw("SELECT id, 
                        concat(socialreason,' ',firstname,' ',othernames,' ',lastname,' ',otherlastname) as name
                        FROM  " . $string . " WHERE status = 1"));

                } else {
                    $tableLabels = $this->queryList($string, $nameColumns);
                }

                $this->dropdownSheets($objPHPExcel, $nameColumns, $tableLabels);
                return $tableLabels;
            } else {
                continue;
            }

        }

    }

    /**
     * Añade a las nuevas hojas los items correspondientes para llenar cada dropdown
     * @param $objPHPExcel
     * @param $indexSheet
     * @param $items
     * @return mixed
     */

    private function dropdownSheets($objPHPExcel, $indexSheet, $items)
    {
        for ($a = 0; $a < count($items); $a++) {
            $index2Sheet = $a + 1;
            if (isset($items[$a]->name)) {
                //Para grandes cantidades toca meterlas en una columna y darles el rango en el dropdow
                $objPHPExcel->setActiveSheetIndexByName($indexSheet->COLUMN_NAME)->setCellValue('A' . $index2Sheet, $items[$a]->name)->getProtection()->setSheet(true);
            } elseif (isset($items[$a]->numbercontract)) {

                $objPHPExcel->setActiveSheetIndexByName($indexSheet->COLUMN_NAME)->setCellValue('A' . $index2Sheet, $items[$a]->numbercontract)->getProtection()->setSheet(true);
            }

            $objPHPExcel->setActiveSheetIndexByName($indexSheet->COLUMN_NAME)->setCellValue('B' . $index2Sheet, $items[$a]->id)->getProtection()->setSheet(true);
            $objPHPExcel->setActiveSheetIndexByName($indexSheet->COLUMN_NAME)->setCellValue('C' . $index2Sheet, '=A' . strval($index2Sheet) . '&" - "' . '&B' . strval($index2Sheet))->getProtection()->setSheet(true);
        }


        return $objPHPExcel->setActiveSheetIndex(0);

    }

    /**
     * Da el formato del dropdow con las expecificaciones y la cantidad de celdas a tomar
     * @param $objPHPExcel
     * @param $lastColumn
     * @param $columns
     * @param $index
     */
    private function dropDownFormat($objPHPExcel, $lastColumn, $columns, $items)
    {
        if ($columns->COLUMN_NAME != 'supplier_id') {

            for ($j = 2; $j < RANGE; $j++) {
                $objValidation = $objPHPExcel->getActiveSheet()->getCell($lastColumn . $j)->getDataValidation();
                $objValidation->setType(\PHPExcel_Cell_DataValidation::TYPE_LIST);
                $objValidation->setErrorStyle(\PHPExcel_Cell_DataValidation::STYLE_INFORMATION);
                $objValidation->setAllowBlank(false);
                $objValidation->setShowInputMessage(true);
                $objValidation->setShowErrorMessage(true);
                $objValidation->setShowDropDown(true);
                $objValidation->setErrorTitle('Input error');
                $objValidation->setError('Value is not in list.');
                $objValidation->setPromptTitle('Pick from list');
                $objValidation->setPrompt('Please pick a value from the drop-down list.');
                if ($items != null) {

                    //Para libre office
//                $objValidation->setFormula1('=' . $columns->COLUMN_NAME . '!B1' . ':' . 'B' . count($items) . '&"-"&' . $columns->COLUMN_NAME . '!A1' . ':' . 'A' . count($items));
                    $objValidation->setFormula1('=' . $columns->COLUMN_NAME . '!$C$1' . ':' . '$C$' . count($items));


                } elseif ($columns->COLUMN_NAME == 'status') {

                    $objValidation->setFormula1('"1 - Activo,0 - Inactivo"');
                }

            }
        }
    }

    /**
     * Crea las consuiltas para los determinadas relaciones
     *
     * @param $string
     * @param $params
     * @return mixed
     */
    public function queryList($string, $params)
    {
        switch ($params->COLUMN_NAME) {
            case 'category_id':
                return \DB::select(\DB::raw("SELECT *  FROM  " . $string . " WHERE contract_id = " . 1 . " ORDER BY name" ));
            case 'supplier_id':
                return \DB::select(\DB::raw("SELECT *  FROM  " . $string . " WHERE contract_id = " . \auth()->user()->contract_id));
            case 'catalog_id':
                $id = Input::get('catalog');
                return \DB::select(\DB::raw("SELECT *  FROM  " . $string . " WHERE id = " . $id));
            case 'contract_id':
                return \DB::select(\DB::raw("SELECT *  FROM  " . $string . " WHERE id = " . \auth()->user()->contract_id));
            default :
                return \DB::select(\DB::raw("SELECT *  FROM  " . $string . " WHERE status = 1"));

        }


    }

    public function getCustomRelation(Request $request, $group, $page)
    {
        $option = $request->all();
        if (!empty($option["supplier_id"])) {
            $personId = DB::table('persons')
                ->join('users', 'users.person_id', '=', 'persons.id')
                ->where('users.id', auth()->user()->id)
                ->first();

            $exist = Supplier::where('name', $option["supplier_id"])->exists();
            if ($exist) {
                $id = Supplier::where('name', $option["supplier_id"])->value('id');
                return $id;

            } else {
                $newRequest =
                    [
                        'excelFile' => true,
                        'name' => $option["supplier_id"],
                        'shortname' => $option["supplier_id"],
                        'person' => $personId->person_id,
                        'order' => 1,
                        'contract' => \auth()->user()->contract_id,

                    ];
                $request = new Request($newRequest);
                (New SuppliersController)->save($request, $group, $page);
                return Supplier::where('name', $option["supplier_id"])->value('id');

            }

        }

    }

    public function validateProduct($data,$cat)
    {
        foreach ($data as $key => $value) {
            if (CatalogProducts::where('name', $value->name)->where('catalog_id','=',$cat)->exists()) {
                return ['index' => $value->name,
                    'status' => false,
                ];
            }
        }
        return [
            'status' => true,
        ];
    }

    public function validateCategory($data, $catalog, $group, $page){  
        foreach ($data as $key => $value) {
            $category_id = explode("-", $value->category_id);
            if(isset($category_id[1])){
                $exists = Category::where('id', trim($category_id[1]))->where('contract_id',1)->exists();
                $index = $category_id[0];
                if(!$exists){
                    return ['index' => $index,
                            'id' => $category_id[1],
                            'status' => false
                     ];
                } 
            }     
        }       
    }

    public function validateUnity($data, $catalog, $group, $page){
        foreach ($data as $key => $value) {
            $salesunit_id = explode("-", $value->salesunit_id);
            if(isset($salesunit_id[1])){
                $exists = Lists::where('id', trim($salesunit_id[1]))->where('idowner',SALES_UNITIES)->exists();
                $index = $salesunit_id[0];
                if(!$exists){
                    return ['index' => $index,
                            'id' => $salesunit_id[1],
                            'status' => false,
                     ];
                } 
            }     
        }       
    }

    public function validateFields($data){
        foreach ($data as $key => $value) {
            if(is_null($value->purchaseprice)){
                $product = $value->name;
                $field = 'purchaseprice';
                return [    
                    'index' => $field,
                    'product' => $product,
                    'status' => false,
                ];  
            }
            else if(is_null($value->saleprice)){
                $product = $value->name;
                $field = 'saleprice';
                return [    
                    'index' => $field,
                    'product' => $product,
                    'status' => false,
                ];  
            } 
            else if(is_null($value->barcode)){
                $product = $value->name;
                $field = 'barcode';
                return [    
                    'index' => $field,
                    'product' => $product,
                    'status' => false,
                ];  
            } 
        }
    }
           

    public function catalogId($name){
        return $catalogid = Catalog::where('name', $name)
            ->where('contract_id',auth()->user()->contract_id)
            ->value('id');
    }

    public function uploadImages(Request $request, $group, $page){
        try{
            if(!empty($request->files)) {
                if (count(array_diff($request->imagesNames, $request->imagesExcelNames)) > 0 || count(array_diff($request->imagesExcelNames, $request->imagesNames)) > 0) {
                    return redirect(strtolower('/' . $group . '/' . $page . '?id=') . $request->catalog)
                        ->with('errors', array(__("Images can't be saved. Please review data and try again later")));
                } else {
                    foreach ($request->files as $value => $image) {
                        $imgExt = $image->getClientOriginalExtension();
                        $image_name = $image->getClientOriginalName();

                        $category = CatalogProducts::where('catalog_id', $request->catalog)
                            ->where('image', $image_name )->value('category_id');

                        if ($imgExt == 'png') {
                            $image_path = public_path('/support/pictures/products/' . $request->catalog . '/' .
                                str_pad($category, 3, "0", STR_PAD_LEFT));

                            $image->move($image_path, $image_name);
                        }
                    }
                }
            }
        }
        catch(\Exception $e){}
    }

    public function moveImages(Request $request){

        $path  = '/ftp_images/'. str_pad($request->catalog, 3, "0", STR_PAD_LEFT);

        try {

            foreach (\File::files(public_path() . $path) as $path) {

                $name = \File::name($path) . '.png';

                $product = CatalogProducts::where('catalog_id', $request->catalog)->where('image', str_replace(' ', '', strtolower($name)))->first();
                
                if(!is_null($product)) {

                    $file_name = 'CATE' . $request->catalog . $product->id . '.png';

                    $image_path = 'support/pictures/productscatalogs/' . $request->catalog . '/' . str_pad($product->category_id, 3, "0", STR_PAD_LEFT) . '/';

                    $oldmask = umask(0);

                    if (!file_exists(public_path($image_path))) mkdir($image_path, 0777, true);

                    umask($oldmask);

                    rename($path, $image_path . $file_name);

                    $product->image = $file_name;
                    $product->save();
                }
            }
        }
        catch (\Exception $e) {
            //DB::delete('delete from catalog_products where catalog_id = ' . $request->catalog);
            return false;
        }

        return true;

    }

    public function ftptest(){
        $localFile = \File::get('support/pictures/products/prod000000.png');

        Storage::disk('ftp')->put('ftp_image.png', $localFile);
    }

    public function ftpProcess(Request $request, $file){

        $path = public_path() . '/ftp_images/' . $request->catalog;

        //Create directory
        $oldmask = umask(0);
        if (!file_exists($path)) mkdir($path, 0777, true);
        umask($oldmask);

        //Extract archive and move to ftp_images
        $archive = new ZipArchive();
        $archive->open($file);
        $archive->extractTo($path);
        $archive->close();

        //Storage::disk('ftp')->put($file->getClientOriginalName(), $file);
    }

}
