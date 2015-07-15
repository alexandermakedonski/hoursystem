<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Filesystem\Filesystem;

class AvatarController extends Controller
{
    public function __construct(){
        $this->middleware('lockscreen');
    }

    public function getIndex($id){
        $user_id = \Hashids::decode($id);
        if(!count($user_id)) return abort('404');

        try{
            $email = \App\User::findOrFail($user_id[0])->email;

        }catch(\App\Exceptions\Exception $e){
            return abort(404);
        }

        $path = storage_path().'\profiles\\'.$email.'\avatar\avatar.jpg';
        $img = new Filesystem;

        try
        {
            $imgReal = $img->get($path);
            $headers = array('Content-Type' => $img->mimeType($path));
        }
        catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $exception)
        {
            $imgReal = $img->get(storage_path().'/profiles/default.jpg');
            $headers = array('Content-Type' => $img->mimeType(storage_path().'/profiles/default.jpg'));
        }

        return Response::make($imgReal,200,$headers);
    }
}
