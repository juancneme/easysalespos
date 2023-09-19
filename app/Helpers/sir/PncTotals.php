<?php

namespace App\Helpers\Sir;

/**
 * Description of PncTotals
 *
 * @author OIVANANGEL
 */
class PncTotals {

    // Default Variables for calc
    protected $_totalWeeks = 3;
    
    // Default Columns
    public $category;
    public $product;
    public $weeks;
    public $calculateWeeks;
    public $price;
    public $newPrice;

    public function __construct(Array $props = array()) {
        foreach ($props as $k => $v) {
            $this->{$k} = $v;
        }
    }

}
