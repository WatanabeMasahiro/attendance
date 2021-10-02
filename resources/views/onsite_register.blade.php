@include('includes.head')

@include('includes.header')


<div class="container mainContents text-center">

@if(session()->get('pagepass') != decrypt($user->pagepass))
    <div class="bg-danger border-right border-left py-3 rounded-circle">
        <h2 class="my-5">※ページパスが不一致です。</h2>
        <p class="my-4">（管理者用ページの表示には、パス認証が必要です。）</p>
    </div>
@else


    <h2 class="subTitle_3 pt-1 pb-2 mb-4" style="letter-spacing: 0.05em;"><b>ー {{$department_onsite}}登録 ー</b></h2>

    @if($errors->has('name'))
        <div class="flashingWarning text-danger h4 my-3">※同じ名前の{{$department_onsite}}名は登録できません。</div>
    @elseif(old('delete') == true)
        <div class="flashingWarning text-danger h4 mt-3">データを削除しました。</div>
    @elseif(old('onsite_registerBtn') == true)
        <div class="flashingWarning text-danger h4 my-3">入力データを登録しました。</div>
    @endif

    <hr/>

    <form action="/onsite_register" method="POST"  class="border-right border-left">
    @csrf
        <div class="my-1">
            <div class="my-2">{{$department_onsite}}名を入力してください。</div>
            <div class="opt_name d-none">{{$department_onsite . '名'}}</div>
            <input name="name" type="text" value="{{ old('name') }}" placeholder="{{$department_onsite . '名'}}" class="form-control border-secondary text-center" style="width: 200px; margin: 0 auto;" required>
            <button name="onsite_registerBtn" value="true" type="submit" class="onsite_registerBtn btn btn-success btn-lg my-3 px-3">登録</button>
        </div>
    </form>

    <hr/>

    <form id="formHome" class="my-5" action="{{url('/onsite_register')}}" method="GET">
        <div class="my-5">
            <table style="margin: 0 auto;">
                <tr class="">
                    <td class="py-2 pr-2 pl-2">
                        <input class="form-control d-inline border-primary text-center my-1 ml-1" type="search" name="str_search" value="{{$str_search}}" style="width: 200px;" placeholder="Search"></td>
                    <td class="py-2">
                        <input value="検索" id="strSearch" class="strSearch btn btn-primary px-3" type="submit">
                    </td>
                </tr>
            </table>
        </div>
    </form>


        <table class="table table-hover table-dark recordTable" style="max-width:500px; margin: 0 auto;">
            <thead>
                <tr>
                    <th style="letter-spacing: 0.05em;">登録された{{$department_onsite}}　一覧</th>
                </tr>
            </thead>
    @isset($fields)
            <tbody class="nondata_tbody">
            @foreach($fields as $field)
                <tr class="recordData_field table-secondary text-dark" style="cursor:pointer;">
                    <td class="pb-2 align-middle" style="font-size: 15px;"><div class="send_onsiteId d-none">{{encrypt($field->id)}}</div>{{$field->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $fields->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}</div>

    @else
            <tbody>
                <tr>
                    <td class="align-middle bg-white" style="font-size: 15px;">
                        <div class="h2 my-5 text-dark"><b>データがありません。</b></div>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset


@endif

</div>


@include('includes.footer')