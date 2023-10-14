<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function setting(){
        return view('settings');
    }

    public function update_picture(Request $request){
        $request->validate(
            [
                'first_name'      => 'required',
                'last_name'       => 'required',
                ]
            );
            if ($request->profile_picture) {
                $request->validate(
                    [
                    'profile_picture' => 'image|mimes:jpeg,png,jpg|max:1024'
                    ]
                );
            
                $file_name = auth()->user()->profile_picture;
                $request->file('profile_picture')->storeAs('public/pictures',$file_name);
                // return $request;
            }
        $user = DB::table('users')->where('id',auth()->user()->id)->update(
            [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'updated_at' => now()
            ]
        );

        if ($user) {
            return redirect()->route('settings',['msg'=>'Profile Updated']);
        }
        // echo "ues";
    }

    public function delete_profile(){
        $user = DB::table('users')->where('id',auth()->user()->id)->delete();
        if($user){
            session()->flush();
            auth::logout();
            return redirect()->route('home');
        }
    }
}
