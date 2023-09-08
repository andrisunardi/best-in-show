<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class LivewireUpload
{
    public function upload(
        ?TemporaryUploadedFile $file,
        string $name = null,
        string $disk = 'images',
        string $directory = 'others',
        string $checkAsset = null,
        string $fileAsset = null,
        bool $deleteAsset = false,
    ): ?string {
        $fileName = now()->format('Y-m-d-H-i-s');

        if ($name) {
            $fileName = Str::slug($name).'-'.now()->format('Y-m-d-H-i-s');
        }

        if (! $file) {
            if ($checkAsset) {
                $fileName = "{$fileName}.".File::extension($fileAsset);

                File::copy(
                    public_path("{$disk}/{$directory}/{$fileAsset}"),
                    public_path("{$disk}/{$directory}/{$fileName}"),
                );

                return $fileName;
            }

            return null;
        }

        if ($checkAsset && $deleteAsset) {
            File::delete(public_path("{$disk}/{$directory}/{$fileAsset}"));
        }

        $fileName = "{$fileName}.{$file->extension()}";
        $file->storePubliclyAs($directory, $fileName, $disk);

        return $fileName;
    }
}
