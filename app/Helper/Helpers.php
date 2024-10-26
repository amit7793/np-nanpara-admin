<?php


if (!function_exists('fileUploadOnServer')) {
    function fileUploadOnServer($files, $imageFloder)
    {
        $uploadOnS3Server = env('ImageUploadOnS3Server');
        if ($uploadOnS3Server == 1) {
            $path = \Storage::disk('s3')->put('uploads', $files);
            $path = \Storage::disk('s3')->url($path);
        } else {
            $namewithextension = $files->getClientOriginalName();

            $name = explode('.', $namewithextension)[0]; // Filename 'filename'

            $filename = $name . "." . $files->getClientOriginalExtension();

            $dir = public_path("storage/" . $imageFloder);

            $path = $dir . "/" . $filename;
            if (!\File::isDirectory($dir)) {
                \File::makeDirectory($dir, 493, true);
            }
            $files->move($dir, $filename);
            $path = url('/') . '/' . 'storage/' . $imageFloder . '/' . $filename;
        }
        return $path;
    }
}

?>
