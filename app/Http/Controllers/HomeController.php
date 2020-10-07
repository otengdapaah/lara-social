<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Models\Message;

class HomeController extends Controller
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
        $following = Auth::user()->following->pluck('id');
        
        $messages = Message::whereIn('user_id', $following)->orWhere('user_id', Auth::user()->id)->get();

        return view('home', [
            'messages' => $messages
        ]);
    }
}
