<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AccountController extends Controller
{
    public function changephoto(Request $request){
        $errors = array();
        if ($request->hasFile('file')) {
            if($request->file('file')->isValid()) {
                try {
                    $file = $request->file('file');
                    $ext = $file->getClientOriginalExtension();
                    $validext = "jpg,png,jpeg";
                    if(strpos($validext, strtolower($ext)) !== false){
                        $name = time() . '.' . $ext;

                        $request->file('file')->move("avatars", $name);
                        $user = Auth::user();
                        $user->pic_url = "avatars/{$name}";
                        $user->save();
                    }else{
                        $errors['file'] = "Please upload an image";
                    }
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    $errors['file'] = "Error: ".$e;
                }
            } else
                $errors['file'] = "This file is invalid";
        }
        else
            $errors['file'] = "Please input a file";
        return back()->with('file_error', $errors);
    }

    public function resetpassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = Auth::user();
        if(Hash::check($request['old_password'], $user->password) && !$validator->fails()){
            $user->password = Hash::make($request['password']);
            $user->save();
            return back()->with('pwd_status', 'success');
        }else
            return back()->with('pwd_status', 'failure')->WithErrors($validator);
    }
}
