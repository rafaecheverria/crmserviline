<?php

namespace App\Http\Controllers\User;

use App\User;
use Auth;
use Image;
use Illuminate\Http\Request;
use App\Http\Requests\AvatarRequest;
use App\Http\Controllers\Controller;

class AvatarController extends Controller
{

    public function store(AvatarRequest $request)
    {
       if ($request->hasFile('avatar')) {
            $user = User::findOrFail($request->id);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $file_name = $user->id . '.' . $extension;
            $avatar = $user->avatar;
            $path = public_path('/assets/img/perfiles/' . $file_name);
            Image::make($request->file('avatar'))
                ->fit(300, 300)
                ->save($path);
            $user->avatar = $file_name;
            $user->save();

            return response()->json([
                "success" => true,
                "path" => $path,
                "file_name" => $file_name,
                "avatar" => $avatar,
                "message" => "La imagen fue subida con exito!"
            ]);
        }
    }
}
