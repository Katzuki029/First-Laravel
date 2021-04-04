<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        //image crud
        if($request->hasFile('image'))
        {
            // get the name of the avatar
            $filename = $request->image->getClientOriginalName();
            //upload or update the avatar
            $this->deleteOldImage();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar'=>$filename]);
            //redirect and flash showing message in image update
            return redirect()->back()->with('message', 'Image Uploaded..');
        }
        return redirect()->back()->with('error', 'Image not Uploaded..');
    }

    protected function deleteOldImage()
    {
        //delete the old imagage avatar
        if(auth()->user()->avatar)
        {
            Storage::delete('/public/images/' . auth()->user()->avatar);
        }
    }

    public function index()
    {
        // Eloquent Crud
        //insert
        // $user = new User();
        // $user->name = 'Katzuki';
        // $user->email = 'aominechandaiki@gmail.com';
        // $user->password = \bcrypt('password');
        // $user->save();

        //delete
        // User::where('id',2)->delete();

        // update
        // User::where('id',3)->update(['name' =>'Katzz']);

        // Select all
        // $user = User::all();
        // return $user;


        // $data = ['name' => 'Katzuki Fushimi', 'email' => 'katzuki@gmail.com', 'password' =>\bcrypt('password')];
        // User::create($data);

        

        $user = User::all();
        return $user;
        return view('home');
    }
}
