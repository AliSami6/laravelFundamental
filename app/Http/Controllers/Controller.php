<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     protected function file_upload($file, $folder)
    {
        $product_file = $file;
        $file_extention = $product_file->getClientOriginalExtension();
        $product_image_name = time() . rand() . '.' . $file_extention;
        $product_file->move($folder, $product_image_name);
        return $product_image_name;
        // return 'Product image uploaded successfully.';
    }
     protected function file_updated($file, $folder, $old_file)
    {
        //prevoius file remove from resource
        if ($old_file != null) {
            file_exists($folder . $old_file->image) ? unlink($folder . $old_file->image) : false;
        }
        $product_file = $file;
        $file_extention = $product_file->getClientOriginalExtension();
        $product_image_name = time() . rand() . '.' . $file_extention;
        $product_file->move($folder, $product_image_name);
        return $product_image_name;
    }
     protected function file_remove($folder, $old_file)
    {
        return file_exists($folder . $old_file) ? unlink($folder . $old_file) : false;
    }
}