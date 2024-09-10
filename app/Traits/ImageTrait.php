<?php

namespace App\Traits;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public $baseFolder = 'public/chatdocs';
    public $yearFolder = '';
    public $path = 'app/';
    public $folder  = '';

    public function __construct()
    {
        $year  =  Carbon::now()->format('Y');
        $this->yearFolder = $this->baseFolder . '/' . $year;
        // Check if the base folder exists, if not create it with 777 permissions
        if (!Storage::exists($this->baseFolder)) {
            Storage::makeDirectory($this->baseFolder);
            chmod(storage_path($this->path . $this->baseFolder), 0777); // Set permissions to 777
        }

        // Check if the year-wise folder exists, if not create it with 777 permissions
        if (!Storage::exists($this->yearFolder)) {
            Storage::makeDirectory($this->yearFolder);
            chmod(storage_path($this->path . $this->yearFolder), 0777); // Set permissions to 777
            $this->folder = $this->yearFolder;
        }
        $this->folder = $this->yearFolder;
    }

    #---- upload image and resize them ---#
    public function uploadImage($file, $folder = 'public/profile')
    {
        $folder;
        $filename = rand(111111, 999999) . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($folder, $filename);
        return $path;
    }

    public function uploadMedia($file)
    {
        $this->folder;
        $filename = rand(111111, 999999) . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($this->folder, $filename);
        return $path;
    }


    public function resizeImage($image)
    {
        // Handle the uploaded image
        $filename = time() . rand(00000, 99999) . '.' . $image->getClientOriginalExtension();   
        $path = storage_path('app/public/profile/' . $filename);

        // Resize the image
        $img = Image::make($image->getRealPath());
        $img->fit(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        return 'public/profile/' . $filename;
    }
}
