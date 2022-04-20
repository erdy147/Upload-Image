<?php
  
namespace App\Http\Controllers;
use App\Models\Profile;
  
use Illuminate\Http\Request;
  
class ProfileController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return view('form',["profiles"=>Profile::get()]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
    
 
        $fileUploadedPath= $request->file("profile_picture")->store("profile");  //profile_picture is the name of form field

        //  save image and name in database
      	$profile=new Profile();
	$profile->profile_picture= $fileUploadedPath;
	$profile->save();


    
        return back()
            ->with('success','You have successfully uploaded image and form.');
            
    }
}
