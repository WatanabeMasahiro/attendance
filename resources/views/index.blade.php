@include('includes.head')

@include('includes.header')


<div class="container text-center">


    <h2 class="subTitle_1 pb-2" style="letter-spacing: 0.05em;"><b>ホーム</b></h2>


    <div class="text-right">
        <a href="https://nabel.blog/wp1/syuttaikinsystem-how-to-use/">出退勤システムの使い方</a>
    </div>


    @isset($pass_mismatch)
        <div class="flashingWarning text-danger h4 my-3">管理者用パスの認証がされていません。<br/>もしくは有効時間切れです。</div>
    @endisset

    @if($old_punch === 1)
        <div class="flashingWarning text-danger h4 my-3">出勤データを登録しました。</div>
    @elseif($old_punch === 0)
        <div class="flashingWarning text-danger h4 my-3">退勤データを登録しました。</div>
    @elseif(old('delete') == true)
        <div class="flashingWarning old_delete text-danger h4 my-3">データを削除しました。</div>
    @endif


    <hr/>


    <form action="/attendance" method="GET" class="border-right border-left">
        <div class="my-2">{{$department_onsite}}名を選択し、出退勤ボタンを押してください。</div>
        <div class="my-2">
            <select name="on_site" class="p-1">
                <option class="opt_name" value="0" hidden>{{$department_onsite . "名"}}</option>
                @foreach($fields as $field)
                    <option value="{{encrypt($field->id)}}">{{$field->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <input value="出退勤" class="index_punchBtn btn btn-danger" type="submit">
        </div>
    </form>


    <hr/>


        <form id="formHome" class="my-5" action="{{url('/')}}" method="GET">
            <table style="margin: 0 auto;">
                <tr class="form_daySearch border border-secondary">
                    <td class="py-2">
                        <input class="form-control d-inline border-primary text-center mt-1 mr-1" type="date" name="day1_search" value="{{$day1_search}}" style="width: 200px;">から<br/>
                        <input class="form-control d-inline border-primary text-center mb-1 mr-1" type="date" name="day2_search" value="{{$day2_search}}" style="width: 200px;">まで
                    </td>
                    <td class="py-2 pl-2 pr-2">
                        <input value="日付検索" id="daySearch" class="d-inline daySearch btn btn-primary px-3" type="submit">
                    </td>
                </tr>
                <tr class="form_strSearch border border-secondary">
                    <td class="py-2 pr-5 pl-2">
                        <input class="form-control d-inline border-success text-center my-1 ml-1" type="search" name="str_search" value="{{$str_search}}"  style="width: 200px;" placeholder="Search"></td>
                    <td class="py-2">
                        <input value="文字検索" id="strSearch" class="strSearch btn btn-success px-3" type="submit">
                    </td>
                </tr>
            </table>
        </form>


        <table class="table table-hover table-dark recordTable my-5">
            <thead>
                <tr>
                    <th style="width: 130px;">日　時<div class="d-inline-block" style="font-size: 8px">（降順）</div></th>
                    <th style="width: 300px; letter-spacing: 1em;">{{$department_onsite}}</th>
                    <th style="font-size: 15px; width: 200px;">スタッフ</th>
                    <th style="width: 100px;">出　退</th>
                    <th>備　考</th>
                </tr>
            </thead>
    @isset($contents)
            <tbody class="nondata_tbody">
        @foreach($contents as $content)
                @if(session()->get('pagepass') != $user->pagepass)
                <tr class="table-secondary text-dark">
                    <td class="align-middle" style="font-size: 15px;">
                @else
                <tr class="recordData_content table-secondary text-dark">
                    <td class="align-middle" style="font-size: 15px;">
                        <div class="send_contentId d-none">{{encrypt($content->id)}}</div>
                @endif
                        <b><div class="">{{$content->edited_at->format('Y-m-d')}}</div>
                        <div class="">{{$content->edited_at->format('H:i')}}</div></b>
                    </td>
                    <td class="align-middle" style="font-size: 15px;">{{$content->field_name}}</td>
                    <td class="align-middle" style="font-size: 15px;">{{$content->staff_name}}</td class="align-middle">
                    <td class="align-middle" style="font-size: 18px;">
                        @if($content->punch === 1)
                            <div class="text-danger"><b>出勤</b></div>
                        @elseif($content->punch === 0)
                            <div class="text-info"><b>退勤</b></div>
                        @else
                            <div class="text-secondary" style="font-size: 15px;">なし</div>
                        @endif
                    </td>
                    <td class="align-middle" style="font-size: 15px;"><pre class="text-left pl-2 my-0">{{mb_substr(str_replace(array("\r\n", "\r", "\n"), ' ', $content->remarks), 0, 20)}}@if(mb_strlen(str_replace(array("\r\n", "\r", "\n"), ' ', $content->remarks)) > 20)…@endif</pre></td>
                </tr>
        @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $contents->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}</div>
    @else
            <tbody>
                <tr>
                    <td class="align-middle bg-white" colspan="5" style="font-size: 15px;">
                        <div class="h2 my-5 text-dark"><b>データがありません。</b></div>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset


</div>


@include('includes.footer')