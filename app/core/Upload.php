<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

class Upload
{
    protected const ALLOWED_MIMES = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
        'application/pdf' => 'pdf',
    ];

    protected const MAX_SIZE_BYTES = 5242880; // 5 MB

    public static function process(array $file, string $subfolder = 'issues'): string
    {
        if (!isset($file['error']) || is_array($file['error'])) {
            throw new RuntimeException('Invalid file upload parameters.');
        }

        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('File exceeds maximum upload size limit.');
            default:
                throw new RuntimeException('Unknown file upload error.');
        }

        if ($file['size'] > self::MAX_SIZE_BYTES) {
            throw new RuntimeException('File size must not exceed 5MB.');
        }

        // Verify real MIME type using finfo
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);

        if (!array_key_exists($mime, self::ALLOWED_MIMES)) {
            throw new RuntimeException('Invalid file format. Allowed types: JPG, PNG, WEBP, PDF.');
        }

        $extension = self::ALLOWED_MIMES[$mime];

        // Ensure subfolder is valid and sanitized
        $subfolder = preg_replace('/[^a-zA-Z0-9_\-]/', '', $subfolder);
        $targetDir = __DIR__ . '/../../public/uploads/' . $subfolder;

        if (!is_dir($targetDir)) {
            @mkdir($targetDir, 0755, true);
        }

        $randomName = bin2hex(random_bytes(16)) . '.' . $extension;
        $destination = $targetDir . '/' . $randomName;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        return 'uploads/' . $subfolder . '/' . $randomName;
    }

    public static function processWithMetadata(array $file, string $subfolder = 'issues'): array
    {
        $path = self::process($file, $subfolder);
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file(__DIR__ . '/../../public/' . $path) ?: 'application/octet-stream';
        $size = file_exists(__DIR__ . '/../../public/' . $path) ? filesize(__DIR__ . '/../../public/' . $path) : $file['size'];

        return [
            'file_path' => $path,
            'mime'      => $mime,
            'size'      => $size,
        ];
    }
}

