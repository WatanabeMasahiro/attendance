<?php

namespace App\Http\Controllers;

// use App\Models\~~;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{

    public function indexGet(Request $request) {
        $test = "123";
        return view('index', compact('test', ));
    }

    public function indexPost() {

        return redirect('/index');
    }


    public function attendanceGet(Request $request) {
        $test = "123";
        return view('attendance', compact('test',));
    }

    public function attendancePost() {

        return redirect('/attendance');
    }


    public function staff_registerGet() {
        $test = "123";
        return view('staff_register', compact('test',));
    }

    public function staff_registerPost() {

        return redirect('/staff_register');
    }


    public function onsite_registerGet() {
        $test = "123";
        return view('onsite_register', compact('test',));
    }

    public function onsite_registerPost() {

        return redirect('/onsite_register');
    }


    public function pass_pageGet() {
        $test = "123";
        return view('pass_page', compact('test',));
    }

    public function pass_pagePost() {

        return redirect('/pass_page');
    }


    public function pagepass_changeGet() {
        $test = "123";
        return view('pagepass_change', compact('test',));
    }

    public function pagepass_changePost() {

        return redirect('/pagepass_change');
    }

}
