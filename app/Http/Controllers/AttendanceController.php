<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Field;
use App\Models\Staff;
use App\Models\Content;
use App\Http\Requests\Onsite_registerRequest;
use App\Http\Requests\Staff_registerRequest;
use App\Http\Requests\Info_changeRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('ParamPagepass');
    // }


    public function indexGet(Request $request)
    {
        $user = Auth::user();
        $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
        $fields = $user->fields->all();

        $old_punch = $request->old('punch');
        $pass_mismatch = $request->old('mis_match');

        $day1_search = $request->day1_search;
        $day2_search = $request->day2_search;
        $str_search = mb_convert_kana(strtolower($request->str_search), 'a');

        $contents = $user->contents();
        if (!empty($day1_search)) {
            $contents->whereDate('edited_at', '>=', $day1_search);
        }
        if (!empty($day2_search)) {
            $contents->whereDate('edited_at', '<=', $day2_search);
        }
        if (!empty($str_search)) {
            $contents->where(function($contents) use($str_search){
                $contents->where('field_name', 'like', "%{$str_search}%")
                    ->orwhere('staff_name', 'like', "%{$str_search}%")
                    ->orwhere('remarks', 'like', "%{$str_search}%");
                if ($str_search == "出勤") {
                    $contents->orwhere('punch', '=', 1);
                } elseif ($str_search == "退勤") {
                    $contents->orwhere('punch', '=', 0);
                }
            });
        }
        $contents = $contents->orderBy('edited_at', 'desc')->paginate(5);

        return view('index', compact('user', 'department_onsite', 'fields', 'old_punch', 'pass_mismatch', 'day1_search', 'day2_search', 'str_search', 'contents'));
    }

    // public function indexPost(Request $request) {
    //     return redirect('/index');
    // }


    // public function remarks_changeGet(Request $request)
    // {
    //     $user = Auth::user();
    //     return view('remarks_change', compact('user',));
    // }

    // public function remarks_changePost(Request $request)
    // {
    //     $this->validate($request, Content::$rules);
    //     return redirect('/')->withInput();
    // }


    public function attendanceGet(Request $request)
    {
        $user = Auth::user();
        $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
        $onsite = decrypt($request->on_site);
        $fieldObj = $user->fields->where('id', $onsite)->first();
        if(!is_null($fieldObj)) {
            $fieldName = $fieldObj->name;
            $staffNames = $fieldObj->staff_s;
        } else {
            $fieldName = false;
            $staffNames = false;
        }
        $punch = null;
            return view('attendance', compact('user', 'department_onsite', 'onsite', 'fieldName', 'staffNames', 'punch'));
    }

    public function attendancePost(Request $request)
    {
        $this->validate($request, Content::$rules);
            $user = Auth::user();
            $user_id = array('user_id' => $user->id);
            $edited_at = array('edited_at' => date('Y-m-d H:i:s'));
            $request->merge($user_id)->merge($edited_at);
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


    public function staff_registerGet(Request $request){
        if(!(session()->has('pagepass'))){
            $mis_match = array('mis_match' => true);
            $request->merge($mis_match);
            return redirect('/')->withInput();
        }
            $user = Auth::user();
            $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
            $str_search = mb_convert_kana(strtolower($request->str_search), 'a');
            $fields = $user->fields->all();
            $staff_s = Staff::leftJoin('fields', 'staff.field_id', '=', 'fields.id')
                ->select('staff.id as s_id', 'fields.id as f_id', 'staff.user_id', 'staff.name as staff_name', 'fields.name as field_name')
                ->where('staff.user_id', $user->id);
            if (!empty($str_search)) {
                $staff_s->where(function($staff_s) use($str_search){
                    $staff_s->where('staff.name', 'like', "%{$str_search}%")
                        ->orWhere('fields.name', 'like', "%{$str_search}%");
                });
            }
            $staff_s = $staff_s->orderBy('staff.id', 'desc')->paginate(5);

            return view('staff_register', compact('user', 'department_onsite', 'str_search', 'fields', 'staff_s'));
    }

    public function staff_registerPost(Staff_registerRequest $request) {
        $user = Auth::user();
        $user_id = array('user_id' => $user->id);
        $field_id = array('field_id' => decrypt($request->field_id));
        $request->merge($user_id)->merge($field_id);
        $staff = new Staff;
        $form = $request->all();
        unset($form['_token']);
        $staff->fill($form)->save();
        return back()->withInput();
    }


    public function onsite_registerGet(Request $request)
    {
        if(!(session()->has('pagepass'))){
            $mis_match = array('mis_match' => true);
            $request->merge($mis_match);
            return redirect('/')->withInput();
        }
            $user = Auth::user();
            $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
            $str_search = mb_convert_kana(strtolower($request->str_search), 'a');
            $fields = $user->fields();
            if (!empty($str_search)) {
                $fields->where(function($fields) use($str_search){
                    $fields->where('name', 'like', "%{$str_search}%");
                });
            }
            $fields = $fields->orderBy('id', 'desc')->paginate(5);
            return view('onsite_register', compact('user', 'department_onsite', 'str_search', 'fields'));
    }

    public function onsite_registerPost(Onsite_registerRequest $request)
    {
        $user = Auth::user();
        $user_id = array('user_id' => $user->id);
        $request->merge($user_id);
        $field = new Field;
        $form = $request->all();
        unset($form['_token']);
        $field->fill($form)->save();
        return back()->withInput();
    }


    public function info_changeGet(Request $request)
    {
        if(!(session()->has('pagepass'))){
            $mis_match = array('mis_match' => true);
            $request->merge($mis_match);
            return redirect('/')->withInput();
        }
            $user = Auth::user();
            $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
            $old_infoChange = $request->old('infoChange');
            return view('info_change', compact('user', 'department_onsite', 'old_infoChange'));
    }

    public function info_changePost(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'email' => [Rule::unique('users')->ignore($user->id)],
          ]);
        $field = User::find($user->id);
        $form = $request->all();
        unset($form['_token']);
        $field->fill($form)->save();
        session()->forget('pagepass');
        session()->put('pagepass', $field->pagepass);
        return back()->withInput();
    }


    public function withdrawalGet(Request $request)
    {
        if(!(session()->has('pagepass'))){
            $mis_match = array('mis_match' => true);
            $request->merge($mis_match);
            return redirect('/')->withInput();
        }
            $user = Auth::user();
            $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
        return view('withdrawal', compact('user', 'department_onsite'));
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
        if(!(session()->has('pagepass'))){
            $mis_match = array('mis_match' => true);
            $request->merge($mis_match);
            return redirect('/')->withInput();
        }
            $user = Auth::user();
            $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
        //     $pagepass1 = array('pagepass1' => $user->pagepass);
        //     $request->merge($pagepass1);
        // if ($request->pagepass1 != $request->pagepass2) {
        //     $mis_match = array('mis_match' => true);
        //     $request->merge($mis_match);
        //     return redirect('/')->withInput();
        // } else {
            $content_s = $user->contents->where('id', decrypt($request->content_id));
            $content_isEmpty = $content_s->isEmpty();
            // $old_update = $request->old('update');
            return view('content_update_delete', compact('user', 'department_onsite', 'content_s', 'content_isEmpty'));
        // }

    }

    public function content_update_deletePost(Request $request)
    {
        $idContent = array('id' => decrypt($request->id));
        $request->merge($idContent);
        if ($request->has('update')){
            $this->validate($request, Content::$rules);
            $form = $request->all();
            unset($form['_token'], $form['update']);
            Content::where('id', $request->id)
            ->update($form);
            return back()->withInput();
        } elseif ($request->has('delete')) {
            Content::find($request->id)->delete();
            return redirect('/')->withInput();
        }
    }


    public function staff_update_deleteGet(Request $request)
    {
        if(!(session()->has('pagepass'))){
            $mis_match = array('mis_match' => true);
            $request->merge($mis_match);
            return redirect('/')->withInput();
        }
            $user = Auth::user();
            $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
        //     $pagepass1 = array('pagepass1' => $user->pagepass);
        //     $request->merge($pagepass1);
        // if ($request->pagepass1 != $request->pagepass2) {
        //     $mis_match = array('mis_match' => true);
        //     $request->merge($mis_match);
        //     return redirect('/')->withInput();
        // } else {
            $staff_s = $user->staffs->where('id', decrypt($request->staff_id));
            $staff_isEmpty = $staff_s->isEmpty();
            $fields = $user->fields->all();
            // $staff_id = $request->staff_id;
            // $passpage2 = $request->pagepass2;
            // $old_update = $request->old('update');
            return view('staff_update_delete', compact('user', 'department_onsite', 'staff_s', 'staff_isEmpty', 'fields'));
        // }
    }

    public function staff_update_deletePost(Request $request)
    {
        $idStaff = array('id' => decrypt($request->id));
        $request->merge($idStaff);
        $idField = array('field_id' => decrypt($request->field_id));
        $request->merge($idField);
        if ($request->has('update')){
            $request->validate([
                'name' => 'required|unique:staff,name,' . ',id,field_id,' . $request->input('field_id'),',user_id,' . Auth::user()->id,
            ]);
            $staff = Staff::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            $staff->fill($form)->save();
            return back()->withInput();
        } elseif($request->has('delete')) {
            Staff::find($request->id)->delete();
            return redirect('/staff_register')->withInput();
        }
    }


    public function onsite_update_deleteGet(Request $request)
    {
        if(!(session()->has('pagepass'))){
            $mis_match = array('mis_match' => true);
            $request->merge($mis_match);
            return redirect('/')->withInput();
        }
            $user = Auth::user();
            $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
            $field_s = $user->fields()->where('id', decrypt($request->onsite_id))->get();
            $field_isEmpty = $field_s->isEmpty();
            return view('onsite_update_delete', compact('user', 'department_onsite', 'field_s', 'field_isEmpty'));
    }

    public function onsite_update_deletePost(Request $request)
    {
        $idField = array('id' => decrypt($request->id));
        $request->merge($idField);
        if ($request->has('update')){
            $request->validate([
                'name' => 'required|unique:fields,name,' . ',id,user_id,' . Auth::user()->id,
           ]);
            $field = Field::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            $field->fill($form)->save();
            return back()->withInput();
        } elseif($request->has('delete')) {
            Field::find($request->id)->delete();
            Staff::where('field_id', $request->id)->delete();
            return redirect('/onsite_register')->withInput();
        }
    }


    public function pagepass_sessionGet(Request $request) {
        $user = Auth::user();
        $department_onsite = null;
        if($user->department_onsite == 1){
            $department_onsite = "現場";
        }elseif($user->department_onsite == 0){
            $department_onsite = "部署";
        }
        $pagepass_mistake = $request->old('mis_pagepass');
        $pagepass_success = $request->old('success_pagepass');
        return view('pagepass_put.pagepass', compact('user', 'department_onsite', 'pagepass_mistake', 'pagepass_success'));
    }

    public function pagepass_sessionPost(Request $request) {
        if($request->pagepass_input == true){
            $request->validate([
                'pagepass' => 'required',
            ]);
            session()->put('pagepass', $request->pagepass);
            if(Auth::user()->pagepass != session()->get('pagepass')){
                session()->forget('pagepass');
                $mis_pagepass = array('mis_pagepass' => true);
                $request->merge($mis_pagepass);
            }elseif(Auth::user()->pagepass == session()->get('pagepass')){
                $success_pagepass = array('success_pagepass' => true);
                $request->merge($success_pagepass);
            }
        }elseif($request->pagepass_output == true){
            session()->forget('pagepass');
            
        }
        return back()->withInput();
    }


}
