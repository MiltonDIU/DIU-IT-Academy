<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function htest(){
$arr =[2, -1, 5, 6, 0, -3];
$this->plusMinus($arr);
}

   public function plusMinus($arr) {
       $len = sizeof($arr);
        $positiveCount = 0;
         $negativeCount = 0;
         $zeroCount = 0;
       for ($i = 0; $i < $len; $i++) {
           if ($arr[$i] > 0) {
               $positiveCount++;
           }
           else if ($arr[$i] < 0) {
               $negativeCount++;
           }
           else if ($arr[$i] == 0) {
               $zeroCount++;
           }
       }
       echo $positiveCount / $len."     ";
       echo $negativeCount / $len."     ";
       echo $zeroCount / $len."     ";
      echo "/n";
    }


    public function apiTest(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.1card.com.bd/danubehome/fail?order_id=DAN635196f09199b',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
//        dd(( json_decode($response)));
        $asd=  json_decode($response);
        return $asd[0]->id;
    }
}
