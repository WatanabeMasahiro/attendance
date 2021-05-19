<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Field;
use App\Models\Staff;
use App\Models\Content;
use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{

    public function indexGet(Request $request)
    {
        $user = Auth::user();
        $fields = $user->fields->all();
        $contents = $user->contents()->orderBy('created_at', 'desc')->paginate(5);
        $search = $request->search;
        return view('index', compact('user', 'fields', 'contents', 'search',));
    }

    // public function indexPost(Request $request) {
    //     return redirect('/index');
    // }


    public function attendanceGet(Request $request)
    {
        $user = Auth::user();
        $onsite = $request->on_site;
        $fieldName = $user->fields->where('id', $onsite)->first()->name;
        $staffNames = Field::where('id', $onsite)->first()->staff_s;
        $punch = null;
            return view('attendance', compact('user', 'onsite', 'fieldName', 'staffNames', 'punch'));
    }

    public function attendancePost(Request $request)
    {
            $this->validate($request, Content::$rules);
            $user = Auth::user();
        if ($request->has('punchIn')){
            $punch_in = array('punch' => 1);
            $request->merge($punch_in);
            $content = new Content;
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form)->save();
            return redirect('/');
        } elseif ($request->has('punchOut')){
            $punch_out = array('punch' => 0);
            $request->merge($punch_out);
            $content = new Content;
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form)->save();
            return redirect('/');
        }
    }


    public function staff_registerGet(Request $request) {
            $user = Auth::user();
            $pagepass1 = array('pagepass1' => $user->pagepass);
            $old_pagepass2 = $request->old('pagepass2');
            $registered_call = null;
        if (isset($old_pagepass2)) {
            $pagepass2 = array('pagepass2' => $old_pagepass2);
            $request->merge($pagepass1)->merge($pagepass2);
            $registered_call = "入力データを登録しました。";
        } else {
            $request->merge($pagepass1);
        }

        if ($request->pagepass1 != $request->pagepass2) {
            return redirect('/');
        } else {
            $fields = $user->fields->all();
            $staff_s = Staff::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5);
            $pagepass2 = $request->pagepass2;
            return view('staff_register', compact('user', 'fields', 'staff_s', 'pagepass2', 'registered_call'));
        }
    }

    public function staff_registerPost(HelloRequest $request) {
        $staff = new Staff;
        $form = $request->all();
        unset($form['_token']);
        $staff->fill($form)->save();
        return redirect('/staff_register')->withInput();
    }


    public function onsite_registerGet(Request $request)
    {
            $user = Auth::user();
            $pagepass1 = array('pagepass1' => $user->pagepass);
            $old_pagepass2 = $request->old('pagepass2');
            $registered_call = null;
        if (isset($old_pagepass2)) {
            $pagepass2 = array('pagepass2' => $old_pagepass2);
            $request->merge($pagepass1)->merge($pagepass2);
            $registered_call = "入力データを登録しました。";
        } else {
            $request->merge($pagepass1);
        }

        if ($request->pagepass1 != $request->pagepass2) {
            return redirect('/');
        } else {
            $fields = $user->fields()->orderBy('id', 'desc')->paginate(5);
            $pagepass2 = $request->pagepass2;
            return view('onsite_register', compact('user', 'fields', 'pagepass2', 'registered_call'));
        }
    }

    public function onsite_registerPost(Request $request)
    {
        $this->validate($request, Field::$rules);
        $field = new Field;
        $form = $request->all();
        unset($form['_token']);
        $field->fill($form)->save();
        return redirect('/onsite_register')->withInput();
    }


    public function info_changeGet(Request $request)
    {
            $user = Auth::user();
            $pagepass1 = array('pagepass1' => $user->pagepass);
            $request->merge($pagepass1);
        if ($request->pagepass1 != $request->pagepass2) {
            return redirect('/');
        } else {
            return view('info_change', compact('user',));
        }
    }

    public function info_changePost(Request $request)
    {
        $user = Auth::user();
        dd($request);   //チェック後に消す。
        return view('info_change', compact('user',));
    }


    // public function pagepassGet(Request $request) {
    //     $user = Auth::user();
    //     $onsite = $request->on_site;
    //     return view('pagepass', compact('user', 'onsite',));
    // }

    // public function pagepassPost(Request $request) {
    //     $user = Auth::user();
    //     $onsite = $request->on_site;
    //     $pagepass1 = array('pagepass1' => $user->pagepass);
    //     $request->merge($pagepass1);
    //     // dd($request);
    //     return view('pagepass', compact('user', 'onsite',));
    // }


    public function withdrawalGet(Request $request)
    {
        $user = Auth::user();
            $pagepass1 = array('pagepass1' => $user->pagepass);
            $request->merge($pagepass1);
        if ($request->pagepass1 != $request->pagepass2) {
            return redirect('/');
        } else {
            return view('withdrawal', compact('user'));
        }
    }

    public function withdrawalPost(Request $request)
    {
        if ($request->has('withdrawalBtn')){
            $user = Auth::user();
            Auth::logout();
            $user->where('id', $user->id)->delete();
            Field::where('user_id', $user->id)->delete();
            Staff::where('user_id', $user->id)->delete();
            Content::where('user_id', $user->id)->delete();
            return redirect('/login');
        } else {
            return redirect('/');
        }
    }


}
