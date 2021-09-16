<?php

namespace App\Traits;


Trait imageTrait
{
    function saveImage($photo,$folder){
        $file_extension = $photo -> getclientoriginalextension();
        $file_name      = time().'.'.$file_extension;
        $path           = $folder;
        $photo -> move($path,$file_name);

        return $file_name;
    }

}
