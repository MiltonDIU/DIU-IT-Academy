<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    use MediaUploadingTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }


    public function coursesEnrollment(Request $request){
        $course= Course::find($request->input('course_id'));
        $course->user()->sync(Auth::id());
        return redirect(route('student.my-course'));
    }
public function myCourse(){
        return view('template.student.my-course');
}

public function myProfile(){
        $user = auth()->user();
        return view('template.student.my-profile',compact('user'));
}

public function myCertificate(){
        return view('template.student.my-certificate');
}

    public function myCommunity(){
        return view('template.student.my-community');
    }
public function profileUpdate(Request $request){
        $user = auth()->user();
        $data = $request->all();
       $user->update($data);
    //return redirect()->route('student.my-profile')->with('message', __('Your profile successfully updated'));
    return redirect()->route('student.my-profile')->with(['message'=>'global.change_password_success','page'=>'my-profile']);

}

public function updatePassword(Request $request){
    $user = auth()->user();
    $request->validate([
        'password' => 'required|confirmed|min:8'
    ]);
    $data['password'] = Hash::make($request->input('password'));
    $user->update($data);
    //return redirect()->route('student.password.update')->with('message', __('global.change_password_success'));
    return redirect()->route('student.my-profile')->with(['message'=>'Your password successfully update','page'=>'password']);
}

public function updateAbout(Request $request){
    $user = auth()->user();
    $request->validate([
        'about' => 'required'
    ]);
    $data['about']=$request->input('about');
    $user->update($data);
    return redirect()->route('student.my-profile')->with(['message'=>'Your about content successfully update','page'=>'about']);
}

public function profilePictureUpdate(Request $request){
    $user = auth()->user();
//    if ($request->input('avatar', false)) {
//        $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
//    }

    if ($request->input('avatar', false)) {
        if (!$user->avatar || $request->input('avatar') !== $user->avatar->file_name) {
            if ($user->avatar) {
                $user->avatar->delete();
            }
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
        }
    } elseif ($user->avatar) {
        $user->avatar->delete();
    }


    $user->update();
    return redirect()->route('student.my-profile')->with(['message'=>'Your profile picture successfully update','page'=>'profile-picture']);
}

}
