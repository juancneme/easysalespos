<?php

namespace App\Helpers\Sir;

/**
 * Description of ReportField
 *
 * @author OIVANANGEL
 */

/**
 * represents each field of the report
 */
class ReportField {

    public $label;
    public $value = 0;
    public $type = '';
    public $formula = '';

    public function __construct($value, $label, $type = null, $formula = '') {
        if (is_array($value)) {
            $this->value = $value;
        } else if ($value instanceof ReportField) {
            $this->value = $value->value;
        } else {
            $this->value = (float) $value;
        }

        if (!empty($type)) {
            $this->setType($type);
        }

        if (!empty($formula)) {
            $this->formula = $formula;
        }

        $this->setLabel($label);
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getLabel() {
        return $this->getLabel();
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

    function getFormattedValue($type = null) {
        $return = 0;
        $_type = $type != null ? $type : $this->type;
        switch ($_type) {
            case '$':
                $return = '$' . number_format($this->value, 2);
                break;
            case '%':
                $return = number_format($this->value, 2) . '%';
                break;
            case '%%':
                $return = number_format($this->value * 100, 2) . '%';
                break;
            case '#':
                $return = number_format($this->value, 2);
                break;
            case '##':
                $return = (int) $this->value;
            default:
                $return = $this->value;
        }
        return $return;
    }

}
