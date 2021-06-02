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
        $contents = $user->contents()->orderBy('updated_at', 'desc')->paginate(5);
        $search = $request->search;     //検索機能用。
        $old_punch = $request->old('punch');
        $old_delete = $request->old('delete');
        return view('index', compact('user', 'fields', 'contents', 'search', 'old_punch', 'old_delete'));
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
            // $this->validate($request, Content::$rules);
            // バリデーション処理　(備考は1000文字まで)
            $user = Auth::user();
        if ($request->has('punchIn')){
            $punch_in = array('punch' => 1);
            $request->merge($punch_in);
            $content = new Content;
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form)->save();
            return redirect('/')->withInput();
        } elseif ($request->has('punchOut')){
            $punch_out = array('punch' => 0);
            $request->merge($punch_out);
            $content = new Content;
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form)->save();
            return redirect('/')->withInput();
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


    public function content_update_deleteGet(Request $request)
    {
        $user = Auth::user();
            $pagepass1 = array('pagepass1' => $user->pagepass);
            $request->merge($pagepass1);
        if ($request->pagepass1 != $request->pagepass2) {
            return back();
        } else {
            $content_s = Content::where('id', $request->content_id)->get();
            $old_update = $request->old('update');
            return view('content_update_delete', compact('user', 'content_s', 'old_update'));
        }

    }

    public function content_update_deletePost(Request $request)
    {
        if ($request->has('update')){
            // バリデーション処理　(備考は1000文字まで)
            $content = Content::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            $content->fill($form)->save();
            return back()->withInput();
        } elseif($request->has('delete')) {
            Content::find($request->id)->delete();
            return redirect('/')->withInput();
        }
    }


    public function staff_update_deleteGet(Request $request)
    {
        $user = Auth::user();
            $pagepass1 = array('pagepass1' => $user->pagepass);
            $request->merge($pagepass1);
        if ($request->pagepass1 != $request->pagepass2) {
            return back();
        } else {
            $staff_s = Staff::where('id', $request->staff_id)->get();
            $fields = $user->fields->all();
            $old_update = $request->old('update');
            return view('staff_update_delete', compact('user', 'staff_s', 'fields', 'old_update'));
        }
    }

    public function staff_update_deletePost(Request $request)
    {
        // 同じ名前の禁止。。。
        if ($request->has('update')){
            // バリデーション処理
            $staff = Staff::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            $staff->fill($form)->save();
            return back()->withInput();
        } elseif($request->has('delete')) {
            Staff::find($request->id)->delete();
            return redirect('/')->withInput();
        }
    }


    public function onsite_update_deleteGet(Request $request)
    {
        $user = Auth::user();
            $pagepass1 = array('pagepass1' => $user->pagepass);
            $request->merge($pagepass1);
        if ($request->pagepass1 != $request->pagepass2) {
            return back();
        } else {
            $field_s = Field::where('id', $request->onsite_id)->get();
            $old_update = $request->old('update');
            return view('onsite_update_delete', compact('user', 'field_s', 'old_update'));
        }
    }

    public function onsite_update_deletePost(Request $request)
    {
        if ($request->has('update')){
            // バリデーション処理
            $field = Field::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            $field->fill($form)->save();
            return back()->withInput();
        } elseif($request->has('delete')) {
            Field::find($request->id)->delete();
            return redirect('/')->withInput();
        }
    }


}
