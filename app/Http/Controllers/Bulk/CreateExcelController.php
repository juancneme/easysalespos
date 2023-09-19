<?php

namespace App\Http\Controllers\Bulk;

use App\Enums\ExcelEnum;
use App\Models\Management\Catalog;
use App\Models\Management\CatalogProducts;
use App\Models\Management\Category;
use App\Models\Management\ExcelField;
use App\Models\Management\Lists;
use App\Models\Management\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Style_Alignment;


class CreateExcelController extends Controller
{
    public $excel = '';
    public $excelWriter = '';
    public $columns = '';
    public $_request = '';
    public $nameTable = '';

    public function __construct($nameTable, Request $request)
    {
        dd("entro a excel constructor");
        $this->excel = new \PHPExcel();
        $this->excelWriter = \PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $_columnSchema = $this->getColumnSchemaTable($nameTable);
        tableFieldExcel($_columnSchema, $request->exceptionfields);
        $this->columns = ExcelField::columns($nameTable)->pluck('name_field');
        $this->_request = $request;
        $this->nameTable = $nameTable;
    }

    public function createExcel()
    {
        dd("llego createExcel");
        $this->getHeaders();
        $this->setContent();
        $this->downloadExcel($this->excelWriter);
    }

    private function getHeaders()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Template.xlsx"');
        header('Cache-Control: max-age=0');
    }

    private function setContent()
    {
        $this->setSheetName(__('Products'));
        $this->writeColumns($this->excel);
    }

    private function downloadExcel($excelWriter)
    {
        ob_end_clean();
        $excelWriter->save('php://output');
        exit;
    }

    private function setSheetName($sheetName)
    {
        $this->excel->getActiveSheet()->setTitle($sheetName);
    }

    private function writeColumns($excel)
    {
        $lastColumn = $excel->getActiveSheet()->getHighestColumn();
        $activeSheet = 0;

        for ($i = 0; $i < count($this->columns); $i++)
        {
            $excel->setActiveSheetIndex($activeSheet)->setCellValue($lastColumn . ExcelEnum::HEADER, $this->columns[$i]);
            $excel->setActiveSheetIndex($activeSheet)
                ->getStyle($lastColumn . ExcelEnum::HEADER)
                ->getFill()
                ->setFillType(\PHPExcel_Style_Fill::FILL_PATTERN_DARKGRAY);

            $excel->setActiveSheetIndex($activeSheet)->getStyle($lastColumn . ExcelEnum::HEADER)->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->writeDropdown($lastColumn);

            $lastColumn++;
        }

    }

    private function writeDropdown($column)
    {
        $header = $column . ExcelEnum::HEADER;
        $data = $this->excel->getActiveSheet()->getCell($header)->getValue();

        $this->excel->getActiveSheet()->getCell('B8')->getValue();
        $objValidation = $this->excel->getActiveSheet()->getCell($column . ExcelEnum::FIRST_ROW )
            ->getDataValidation();

        $objValidation->setType( \PHPExcel_Cell_DataValidation::TYPE_LIST );
        $objValidation->setErrorStyle( \PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
        $objValidation->setAllowBlank(false);
        $objValidation->setShowInputMessage(true);
        $objValidation->setShowErrorMessage(true);
        $objValidation->setShowDropDown(true);
        $objValidation->setErrorTitle('Input error');
        $objValidation->setError('Value is not in list.');
        $objValidation->setPromptTitle('Pick from list');
        $objValidation->setPrompt('Please pick a value from the drop-down list.');

        $list = $this->queryList($data);
        $objValidation->setFormula1('"'. $list . '"');
    }

    private function queryList($column)
    {
        $list = '';

        switch($column){
            case 'catalog_id':
                $list = $this->_request->catalog;
                break;
            case 'category_id':
                $list = Category::categories()->pluck('name')->toArray();
                $list = implode(',', $list);
                break;
            case 'supplier_id':
                $list = Supplier::supplier($this->_request->contract)->pluck('name')->toArray();
                $list = implode(',', $list);
                break;
            case 'salesunit_id':
                $list = Lists::unit()->pluck('name')->toArray();
                $list = implode(',', $list);
                break;
        }
        return $list;
    }

    private function getColumnSchemaTable($table)
    {
        return \DB::select(\DB::raw("SELECT INFORMATION_SCHEMA.COLUMNS.* FROM INFORMATION_SCHEMA.COLUMNS
                            WHERE TABLE_SCHEMA =" . "'" . SCHEMA . "'" . " AND TABLE_NAME =" . "'" . strtolower($table) . "'" . ";"));
    }
}
