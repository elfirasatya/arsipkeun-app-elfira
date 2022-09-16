<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload($file)
    {
        if (!$file) {
            return null;
        }
        $filename = pathinfo($file->getClientOriginalName())['filename'];
        $imgfilename = join('', explode(' ', $filename));
        $imgName = $imgfilename . '-' . time() . '.' .  $file->extension();
        $file->move(public_path('uploads/'), $imgName);
        return $imgName;
    }
}
