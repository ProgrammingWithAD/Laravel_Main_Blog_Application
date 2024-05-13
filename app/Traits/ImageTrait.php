<?php
namespace App\Traits;
use Illuminate\Http\UploadedFile;


trait ImageTrait
{
    public function uploadOne(UploadedFile $uploaded_file,  $folder = "media/logo", $disk = "public")
    {
        $name             = time() . '-' . $uploaded_file->getClientOriginalName();
        $path             = $uploaded_file->storeAs($folder, $name, $disk);
        if ($path) {
            return        '/storage/' . $path;
        }

        return null;
    }

    public function deleteOne($fileUrl, $disk = 'public')
    {
        $path = str_replace('/storage/', '', $fileUrl);
        $file_path = 'app/' . $disk . '/' . $path;
        if ($fileUrl) {
            $storage_path = storage_path($file_path);
            $path         = str_replace('/', "\\", $storage_path);

            $deleted = false;
            if (file_exists($path)) {
                $deleted = unlink($path);
            }

            if ($deleted) {
                return true;
            }
        }
        return false;
    }
}

