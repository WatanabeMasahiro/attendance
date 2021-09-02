@include('includes.head')

@include('includes.header')

<<<<<<< HEAD
<div class="container mainContents text-center">    <!-- mainContents -->

    <h2 class=""><b>（仮サブタイトル）- スタッフ登録 -</b></h2>

    <div class="my-1">
        <select name="title" class="p-1">
                <option vlaue="1">現場名1</option>
                <option vlaue="1">現場名2</option>
                <option vlaue="1">現場名3</option>
        </select>
    </div>

    <div class="my-1">
        <input class="form-control border-secondary text-center" type="text" placeholder="スタッフ名" style="width: 200px; margin: 0 auto;">
        <input value="登録" class="strSearch btn btn-secondary mt-1 px-3" type="submit">
    </div>

    <hr>


    <table class="noset-table table table-hover table-dark recordTable">
        <tr class="recordData table-secondary text-dark">
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">登録スタッフ一覧</th>
        </tr>
        <tr class="recordData table-secondary text-dark">
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">現場名：スタッフ名１</td>
        </tr>
        <tr class="recordData table-secondary text-dark">
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">現場名：スタッフ名２</td>
        </tr>
    </table>

    <div class="text-center">ここにページネーション</div>
=======

<div class="container text-center">

@if(session()->get('pagepass') != $user->pagepass)
    <div class="bg-danger border-right border-left py-3 rounded-circle">
        <h2 class="my-5">※ページパスが不一致です。</h2>
        <p class="my-4">（管理者用ページの表示には、パス認証が必要です。）</p>
    </div>
@else


    <h2 class="subTitle_2 pt-1 pb-2 mb-4" style="letter-spacing: 0.02em;"><b>ー スタッフ登録 ー</b></h2>


    @if($errors->has('name'))
        <div class="flashingWarning">
            <div class="text-danger h4 mt-3">※同じ{{$department_onsite}}に、</div>
            <div class="text-danger h4 mb-3">同じ名前のスタッフ名は登録できません。</div>
        </div>
    @elseif(old('delete') == true)
        <div id="staff_registerDelete">
            <div class="flashingWarning text-danger h4 mt-3">データを削除しました。</div>
        </div>
    @elseif(old('staff_registerBtn') == true)
        <div class="flashingWarning text-danger h4 mt-3">入力データを登録しました。</div>
    @endif

    <hr/>

    <form action="/staff_register" method="POST" class="border-right border-left">
    @csrf
        <div class="my-3">
            <div class="my-1">{{$department_onsite}}名を選択してください。</div>
            <select name="field_id" class="p-1">
                <option class="opt_name" value="0" hidden>{{$department_onsite . "名"}}</option>
                @foreach($fields as $field)
                    <option value="{{encrypt($field->id)}}">{{$field->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="my-1">
            <div class="my-1">スタッフ名を入力してください。</div>
            <input name="name" type="text" value="{{ old('name') }}" placeholder="スタッフ名" class="form-control border-secondary pl-2" style="width: 200px; margin: 0 auto;" required>
            <button name="staff_registerBtn" value="true" type="submit" class="staff_registerBtn strSearch btn btn-primary my-3 px-3">登録</button>
        </div>
    </form>

    <hr>

    <form id="formHome" class="my-5" action="{{url('/staff_register')}}" method="GET">
        <table style="margin: 0 auto;">
            <tr class="form_strSearch">
                <td class="py-2 pr-2 pl-2">
                    <input class="form-control d-inline border-success text-center my-1 ml-1" type="search" name="str_search" value="{{$str_search}}"  style="width: 200px;" placeholder="Search"></td>
                <td class="py-2">
                    <input value="検索" id="strSearch" class="strSearch btn btn-success px-3" type="submit">
                </td>
            </tr>
        </table>
    </form>


        <table class="table table-hover table-dark recordTable" style="max-width:500px; margin: 0 auto;">
            <thead>
                <tr>
                    <th style="letter-spacing: 0.05em;">登録スタッフ 一覧</th>
                </tr>
            </thead>
    @isset($staff_s)
            <tbody class="nondata_tbody">
            @foreach($staff_s as $staff)
                <tr class="recordData_staff table-secondary text-dark">
                    <td class="pb-2 align-middle" style="font-size: 15px;">
                    <div class="send_staffId d-none">{{encrypt($staff->s_id)}}</div>
                        <div style="font-size: 16px">{{$staff->staff_name}}</div>  
                        <div style="font-size: 10px">【
                        @foreach($fields as $field)
                            @if($staff->f_id == $field->id)
                                {{$field->name}}
                            @endif
                        @endforeach
                        】</div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $staff_s->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}</div>
    @else
            <tbody>
                <tr>
                    <td class="align-middle bg-white" colspan="2" style="font-size: 15px;">
                        <div class="h2 my-5 text-dark"><b>データがありません。</b></div>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset


@endif
>>>>>>> test1

</div>


@include('includes.footer')