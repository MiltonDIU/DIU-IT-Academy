<?php
/**
 * Created by PhpStorm.
 * User: DIU
 * Date: 02/8/2022
 * Time: 9:22 AM
 */

namespace App\Helpers;
use App\Models\Slider;
use DB;

use Auth;
use File;
class SettingsHelper
{
        public static function sliders($page_name){
        $sliders = Slider::orderBy('created_at', 'desc')->where('is_active',1)->where('page_name',$page_name)->get();
        return $sliders;
    }

    public static function enrollment($course_id){

            if (count(auth()->user()->course()->where('id', $course_id)->get())>0){
                return true;
            }else{
                return false;
            }
    }
}
