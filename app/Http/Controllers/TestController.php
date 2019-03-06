<?php

namespace App\Http\Controllers;

use Zttp\Zttp;

class TestController extends Controller
{
    /**
     * Show dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $response = Zttp::withHeaders([
            //Heasers
        ])->post('url', [
            //Data
        ]);



        return view('dashboard');
    }
}
