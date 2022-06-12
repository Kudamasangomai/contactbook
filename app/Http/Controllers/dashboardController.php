<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class dashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data= array(
        'title' => 'Dashboard',
       // 'total_contacts' => Contact::where('user_id', auth()->user()->id)->count(),
        );
        
        return view('pages.dashboard')->with($data);
    }
}
