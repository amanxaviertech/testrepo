<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;

class ImageController extends Controller
{
    public function serveWebp($filename)
    {
        $extensions = ['jpg', 'jpeg', 'png'];
        $sourcePath = null;

        // Find the correct file extension
        foreach ($extensions as $ext) {
            $path = public_path("images/{$filename}.{$ext}");
            if (file_exists($path)) {
                $sourcePath = $path;
                break;
            }
        }

        if (!$sourcePath) {
            abort(404, 'Image not found');
        }

        try {
            $imagick = new Imagick($sourcePath);
            $imagick->setFormat('webp');

            // Set appropriate headers for WebP image
            return response($imagick->getImageBlob(), 200, ['Content-Type' => 'image/webp']);
        } catch (\Exception $e) {
            return response('Failed to process image', 500);
        }
    }
}
