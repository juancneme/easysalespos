<?php

namespace App\Helpers\Sir;

use App\Helpers\Sir\ReportField;
use App\Helpers\Sir\PncTotals;
use App\Helpers\Sir\FormulaParser\FormulaParser;

/**
 * Description of ReportColumn
 *
 * @author OIVANANGEL
 */

/**
 * represents one column of the report
 */
class ReportColumn {

    protected $fields = array();
    protected $errors = array();

    public function __construct($args) {
        foreach ($args as $k => $v) {
            $this->setValue($k, $v);
        }
    }

    /**
     * export this object's data in the form of a TotalsClass
     */
    function export() {
        $totals = new PncTotals();
        foreach ($this->fields as $k => $v) {
            $totals->{$k} = $this->getValue($k);
        }
        return $totals;
    }

    function getField($row) {
        $field = false;
        echo 'this ';
        if (!is_object($row)) {
            if (!empty($this->{$row})) {
                return $this->{$row};
            }

            if (!empty($this->fields[$row])) {
                return $this->fields[$row];
            }

            if (method_exists($this, strtolower($row))) {
                return $this->{strtolower($row)}();
            }

            //try to find the function but don't break if doesn't exists
            try {
                $field = $this->calculateFieldValue($row);
            } catch (Exception $e) {
                //do nothihg
                var_dump($e);
                die();
            }
        }

        return $field;
    }

    function calculateFieldValue($row, $formula = '') {
        $value = 0;
        if (!empty($formula)) {
            $value = $this->parseFormula($formula, $row);
            return $this->setValue($row, $value);
        }
    }

    function parseFormula($fm, $row = '') {
        $_this = $this;
        $fm = preg_replace_callback(REGEXPFORMULA, function($var) use ($_this, $row) {
            if (substr($var[0], 1) == $row) {
                //JError::raiseWarning( 100, 'Label not found: ' . $row->label );
                return 0;
            }
            return $_this->getValue(substr($var[0], 1), true);
        }, $fm);

        $result = 0;

        try {
            $parser = new FormulaParser($fm, 6);
            $result = $parser->getResult();
        } catch (\Exception $e) {
            echo $e->getMessage(), "\n";
        }
        return is_infinite($result) || is_nan($result) ? 0 : $result;
    }

    function getValue($label) {
        $return = 0;
        $field = $this->getField($label);

        if ($field !== false) {
            if (is_object($field) && is_numeric($field->value)) {
                $return = $field->value;
            } else {
                $return = $field;
            }
        }

        return $return;
    }

    function setValue($row, $value, $type = null, $formula = '') {
        return $this->fields[$row] = new ReportField($value, $row, $type, $formula);
    }

    protected function division($a, $b) {
        if ($b == 0)
            return 0;

        return $a / $b;
    }

}
