<?php

namespace App\Http\Controllers;

//Use Auth Class
use auth;

//Bring in the User Model
use App\Models\User;
use Illuminate\Http\Request;

//Use Storage Facade
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //Upload Function
    public function uploadAvatar(Request $req){

        //If File is Actually Uploaded
        if($req->hasFile('image')){

            //Get Original name of the Image
            $filename = $req->image->getClientOriginalName(); 

            //Delete Previously Uploaded Image
            $this->deleteOldImage(); 
          

            //Store Uploaded Image
            $req->image->storeAs('images', $filename, 'public'); //store image in images folder, with the file name and in the public disk

            //Update Authenticated User Avatar
            auth::user()->update(['avatar' => $filename]); //user update profile picture


            //If Upload is Successful
            return redirect('home')->with('status', 'Photo Uploaded Successfully');
        }
        //If Upload is not Successful
        return redirect('home')->with('error', 'Photo Uploaded Failed');
       

    }


    protected function deleteOldImage(){
          //Check if User Already Uploaded an Image (Delete Previosly Uploaded Image)
          if(auth::user()->avatar){
            Storage::delete('/public/images/'.auth()->user()->avatar);
        }
    }
}
