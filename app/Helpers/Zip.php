<?php


namespace App\Helpers;


use ZipArchive;

class Zip
{
    public function __construct($file, $path)
    {
        $this->file = $file;
        $this->path = $path;
    }

    public function extract(){
        $archive = new ZipArchive();
        $archive->open($this->file);
        $archive->extractTo($this->path);
        $archive->close();
    }

}