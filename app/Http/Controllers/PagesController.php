<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* users will not access all pages on this controller exceppt
         for the about and service page ,they have to be logged in*/
         
        $this->middleware('auth',['except' => ['about','services']]);
    }
    
    public function index()
    {
        $title = 'Login Page';
       return view('pages.login')->with('title',$title);
    }

    public function about()
     {
         //return about page in pages folder return with name about.blade.php
         //Word about will be displayed on the page assigned to variable $title
         $title = 'About';
        return view('pages.about')->with('title',$title);
    }

    public function services()
    {
         $data = array (
             'title' => '  my services',
             'languages'=>['django', 'laravel', 'vue']
        
         );
        return view('pages.services')->with($data);
    }

 
}
