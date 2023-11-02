<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index(){
    $data = array(
        'title' => 'Index Page',
        'message' => 'This is the landing page of the app'
    );
    return view('pages/index')->with($data);
   }
    public function about(){
        $data = array(
            'title' => 'About page',
            'message' => 'This is the About page'
        );
        return view('pages/about')->with($data);
    }

    public function services(){
        $data = array(
            'title' => 'Service Page',
            'message' => 'This is the services page'
        );
        return view('pages/services')->with($data);
    }
}

