@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">


    <h2 class="subTitle_3 pt-1 pb-2 mb-4" style="letter-spacing: 0.05em;"><b>ー 現場登録 ー</b></h2>

    @if($errors->has('name'))
        <div class="flashingWarning text-danger h4 my-3">※同じ名前の現場名は登録できません。</div>
    @elseif(old('delete') == true)
        <div class="flashingWarning" id="onsite_registerDelete">
            <div class="text-danger h4 mt-3">データを削除しました。</div>
            <div class="d-none" id="onsite_registerPagepass2">{{old('pagepass2')}}</div>
        </div>
    @else
        @isset($registered_call)
            <div class="flashingWarning text-danger h4 my-3">{{$registered_call}}</div>
        @endisset
    @endif

    <hr/>

    <form action="/onsite_register" method="POST"  class="border-right border-left">
    @csrf

        <input class="pagepass2" name="pagepass2" type="hidden" value="{{$pagepass2}}">

        <input name="user_id" type="hidden" value="{{$user->id}}">

        <div class="my-1">
            <div class="my-1">現場名を入力してください。</div>
            <input name="name" type="text" value = "{{ old('name') }}" placeholder="現場名" class="form-control border-secondary text-center" style="width: 200px; margin: 0 auto;">
            <button name="onsite_registerBtn" type="submit" class="onsite_registerBtn btn btn-success btn-lg my-3 px-3">登録</button>
        </div>

    </form>

    <hr>

    <div class="d-block d-xl-none my-5">        <!-- mobile searchBar -->
        <table style="margin: 0 auto;">
            <form id="formHome_1" class="my-5" action="{{url('/onsite_register')}}" method="GET">
                <input class="pagepass2" name="pagepass2" type="hidden" value="{{$pagepass2}}">
                <tr class="form_strSearch">
                    <td class="py-2 pr-2 pl-2">
                        <input class="form-control d-inline border-primary text-center my-1 ml-1" type="search" name="str_search" value="{{$str_search}}"  style="width: 200px;" placeholder="Search"></td>
                    <td class="py-2">
                        <input value="検索" id="strSearch" class="strSearch btn btn-primary px-3" type="submit">
                    </td>
                </tr>
            </form>
        </table>
    </div>                                      <!-- /mobile searchBar -->

    <div class="d-none d-xl-block">     <!-- PC searchBar -->
        <form id="formHome_2" class="form-inline my-5 justify-content-center" action="{{url('/onsite_register')}}" method="GET">
            <input class="pagepass2" name="pagepass2" type="hidden" value="{{$pagepass2}}">
            <table class="">
                <tr class="form_strSearch">
                    <div class="col-auto pr-2 ml-4">
                        <input class="form-control border-primary text-center" type="search" name="str_search" value="{{$str_search}}" placeholder="Search"><br/>
                    </div>
                    <div class="col-auto pl-0">
                        <input value="検索" id="strSearch" class="strSearch btn btn-primary px-3" type="submit">
                    </div>
                </tr>
            </table>
        </form>
    </div>                              <!-- /PC searchBar -->


        <table class="table table-hover table-dark recordTable" style="max-width:500px; margin: 0 auto;">
            <thead>
                <tr>
                    <th style="letter-spacing: 0.05em;">登録された現場　一覧</th>
                </tr>
            </thead>
    @isset($fields)
            <tbody class="nondata_tbody">
            @foreach($fields as $field)
                <tr class="recordData_field table-secondary text-dark">
                    <td class="pb-2 align-middle" style="font-size: 15px;"><div class="send_onsiteId d-none">{{$field->id}}</div>{{$field->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $fields->appends(request()->except('pagepass1'))->links('vendor.pagination.bootstrap-4') }}</div>

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


</div>


@include('includes.footer')