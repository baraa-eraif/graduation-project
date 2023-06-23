<?php

namespace Modules\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{

  public function getDefaultImage($id)
  {

    $path = storage_path('app/public/image/' . $id);


    if (!File::exists($path)) abort(404);
//        dd($path);

    $file = File::get($path);
    $type = File::mimeType($path);

    $manager = new ImageManager();
    $image = $manager->make($file);
    $response = Response::make($image->encode($image->mime), 200);
    $response->header("CF-Cache-Status", 'HIF');
    $response->header("Cache-Control", 'max-age=604800, public');
//            $response->header("Content-Encoding", 'gzip');
    $response->header("Content-Type", $type);
//            $response->header("Vary", 'Accept-Encoding');

    return $response;

  }
}
