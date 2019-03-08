<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        print_r(Attendance::whereUserId(Auth::user()->id)->get()->toArray());
        return view('home');
    }

    public function markin(Request $request) {
        echo "<pre>";
        print_r($request->input());
        print_r(Auth::user());
        echo "</pre>";
        $attendanceEntry = new Attendance();
        $attendanceEntry->user_id = Auth::user()->id;
        $attendanceEntry->type = "markIn";
        $attendanceEntry->save();
        return redirect()->back();
    }

    public function markout(Request $request) {
        echo "<pre>";
        print_r(Auth::user());
        print_r($request->input());
        echo "</pre>";
        $attendanceEntry = new Attendance();
        $attendanceEntry->user_id = Auth::user()->id;
        $attendanceEntry->type = "markOut";
        $attendanceEntry->save();
        return redirect()->back();
    }
}
