<?php


namespace App\Services;
use Illuminate\Support\Facades\File;


class ImageService {

    public function  image_file_delete($file_name)
    {
        if (File::exists($file_name)) {
            File::delete($file_name);
            return true;
        }
        return false;
    }
}
?>
