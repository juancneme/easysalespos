<?php
namespace App\Models\Olap;

use App\Models\Sir\CubQuerys;

interface OlapDaoInterface {
    
    function runMdx($mdx);
    
    function hasError();
    
    function getErrorMessage();
    
    function toDto(CubQuerys $query);
    
    function toSingleDto();
}