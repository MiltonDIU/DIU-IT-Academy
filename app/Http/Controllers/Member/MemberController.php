<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{



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
    }
public function myCourse(){
        return view('template.member.my-course');
}

public function myProfile(){
        return view('template.member.my-profile');
}

public function myCertificate(){
        return view('template.member.my-certificate');
}

    public function myCommunity(){
        return view('template.member.my-community');
    }
public function profileUpdate(Request $request){

        dd($request);
}
}
