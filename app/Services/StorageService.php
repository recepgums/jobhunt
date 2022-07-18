<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorageService
{
    const TYPES = [
        self::JOB_PHOTO,
    ];

    const JOB_PHOTO = "job/photo/";
    const USER_PHOTO = "user/photo/";

    public function put($pathType, $file)
    {
        $isS3 = env('FILESYSTEM_DISK') == "s3";

        $storedFile = $isS3 ? Storage::put($this->generatePath($pathType), $file) : Storage::disk('public')->put($this->generatePath($pathType), $file);

        return [
            'size' => $file->getSize(),
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'path' => $isS3 ? Storage::url($storedFile) : env('APP_URL') . Storage::url($storedFile),
            'name' => basename($storedFile),
        ];
    }

    public function generatePath($type)
    {
        return $type . Carbon::now()->format('Y/m/d/');
    }
}
