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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeText = session('homeText', 'HOMEE TEXT');
        return view('home');

    }

    public function editText(Request $request){
        session(['homeText' => $request->text]);
        if(session('homeText')){
            return response()->json([
                'success' => true,
                'message' => 'Text save successful',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Text not save'
        ]);

    }
}
