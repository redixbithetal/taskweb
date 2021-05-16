<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Storage;
use Image;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function fileuploadFileImage(Request $request, $uploadFolderName, $inputFileName){
        $image     = $request->file($inputFileName);
        $fileName  = time() . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();                 
        });
        $img->stream(); 
        Storage::disk('local')->put('/public/'.$uploadFolderName.'/'.$fileName, $img, 'public');
        return $fileName;
    }

    protected function removeImage($image_path)
    {
        $image_path = Storage_path().'/app/public/'.$image_path;
        if(file_exists($image_path)){
            unlink($image_path);
        }        
    }
}
