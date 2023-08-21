<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait SaveFile
{
    public function saveImage($fieldName,$request,$directory,$name=null)
    {
      
        if($request->hasFile($fieldName))
        {
            $filenameWithExt = $name?:$request->file($fieldName)->getClientOriginalName();
            $fileNameToStore = time().'_'.$filenameWithExt;
            if($request->file($fieldName)->storeAs('public/' . $directory, $fileNameToStore)){
                return $fileNameToStore;
            } 
        }
        return null;
    }
}
