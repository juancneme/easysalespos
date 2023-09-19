<?php


namespace App\Http\Controllers\Bulk;


use App\Enums\PermissionsEnum;
use App\Helpers\Image;
use App\Helpers\Zip;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Directory;


class UploadBulkImageController extends Controller
{
    public function __construct(Request $request)
    {
        $this->_request = $request;
        $this->file = $this->_request->file('upload_image');

        $this->path = 'support/pictures/productscatalogs/'
            . $this->_request->catalog
            . '/';
    }

    public function uploadImage()
    {
        $this->createDirectory();
        $this->extractZip();
        $this->moveImage();
    }

    public function createDirectory()
    {
        $directory = new Directory($this->path, PermissionsEnum::ALL);
        $directory->create();
    }

    public function extractZip()
    {
        $zip = new Zip($this->file, $this->path);
        $zip->extract();
    }

    public function moveImage()
    {
        $image = new Image($this->path, $this->_request->catalog);
        $image->categoryMove();
    }
}
