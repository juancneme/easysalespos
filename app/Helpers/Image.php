<?php


namespace App\Helpers;


use App\Enums\PermissionsEnum;
use App\Models\Management\CatalogProducts;

class Image
{
    public function __construct($path, $id = null)
    {
        $this->path = $path;
        $this->id = $id;
    }


    public function move($image, $imageName)
    {
        $this->validate();
        $image->move($this->path . 'juju.png');
    }

    public function validate()
    {
        if (file_exists($this->path))
            unlink($this->path);
    }
    /**
     * Function to move upload images to respective category folder
     */
    public function categoryMove()
    {
        try {
            foreach (\File::files($this->path) as $path) {
                $name = \File::name($path) . '.png';

                $product = CatalogProducts::attribute(
                    $this->id,
                    'image',
                    str_replace(' ', '', strtolower($name))
                )->first();

                if (!is_null($product)) {
                    $file_name = 'PROD' . $this->id . str_pad($product->image_temporary, 4,"0", STR_PAD_LEFT) . '.png';

                    $newPath = $this->path
                        . str_pad($product->category_id, 3, "0", STR_PAD_LEFT)
                        . '/';

                    $categoryDirectory = new Directory($newPath, PermissionsEnum::ALL);
                    $categoryDirectory->create();

                    rename($this->path . $product->image, $newPath . $file_name);

                    $product->image = $file_name;
                    $product->save();
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
