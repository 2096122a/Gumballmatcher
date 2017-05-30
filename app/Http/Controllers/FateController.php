<?php

namespace App\Http\Controllers;

use App\Faction;
use App\Fate;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FateController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $user = Auth::user();

        return view('fate')
            ->with(compact('groups'))
            ->with(compact('user'));
    }
}
