<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;

class VideoVController extends Controller{
    public function generateVideoUrl($id){
        $filePath = 'video/'.$id.'.mp4'; 
        $url = URL::temporarySignedRoute(
            'secure.video',
            now()->addMinutes(30),
            ['path' => $filePath]
        );
        return response()->json(['url' => $url]);
    }

    public function serveVideo(Request $request){
        $path = $request->query('path'); 
        if (!$request->hasValidSignature() || !file_exists(public_path($path))) {
            abort(403, 'Ruxsat yo\'q yoki video topilmadi.');
        }
        return response()->file(public_path($path), [
            'Content-Type' => 'video/mp4',
            'Content-Disposition' => 'inline',
        ]);
    }

}