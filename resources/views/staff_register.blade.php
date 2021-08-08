@include('includes.head')

@include('includes.header')

<div class="container text-center">


    <h2 class="subTitle_2 pt-1 pb-2 mb-4" style="letter-spacing: 0.02em;"><b>ー スタッフ登録 ー</b></h2>


    @if($errors->has('name'))
        <div class="flashingWarning">
            <div class="text-danger h4 mt-3">※同じ現場に、</div>
            <div class="text-danger h4 mb-3">同じ名前のスタッフ名は登録できません。</div>
        </div>
    @elseif(old('staff_registerBtn') == true)
        <div class="flashingWarning">
            <div class="text-danger h4 mt-3">入力データを登録しました。</div>
        </div>
    @elseif(old('delete') == true)
        <div class="flashingWarning" id="staff_registerDelete">
            <div class="text-danger h4 mt-3">データを削除しました。</div>
            <div class="d-none" id="staff_registerPagepass2">{{old('pagepass2')}}</div>
        </div>
    @else
        @isset($registered_call)
            <div class="flashingWarning text-danger h4 my-3">{{$registered_call}}</div>
        @endisset
    @endif


    <form action="/staff_register" method="POST">
    @csrf

        <input class="pagepass2" name="pagepass2" type="hidden" value="{{$pagepass2}}">

        <input name="user_id" type="hidden" value="{{$user->id}}">

        <div class="my-3">
            <div class="my-1">現場名を選択してください。</div>
            <select name="field_id" class="p-1">
            @if(old('field_id') == null)
                <option hidden>現場名</option>
                @foreach($fields as $field)
                    <option value="{{$field->id}}">{{$field->name}}</option>
                @endforeach
            @else
                @foreach($fields as $field)
                    @if($field->id == old('field_id'))
                    <option value="{{$field->id}}" selected>{{$field->name}}</option>
                    @continue
                    @else
                    <option value="{{$field->id}}">{{$field->name}}</option>
                    @endif
                @endforeach
            @endif
            </select>
        </div>

        <div class="my-1">
            <div class="my-1">スタッフ名を入力してください。</div>
            <input class="form-control border-secondary pl-2" name="name" type="text" value="{{ old('name') }}" placeholder="スタッフ名" style="width: 200px; margin: 0 auto;">
            <button name="staff_registerBtn" value="true" type="submit" class="staff_registerBtn strSearch btn btn-primary my-3 px-3">登録</button>
        </div>

    </form>


    <hr>


        <table class="table table-hover table-dark recordTable" style="max-width:500px; margin: 0 auto;">
            <thead>
                <tr>
                    <th style="letter-spacing: 0.05em;">登録スタッフ 一覧</th>
                </tr>
            </thead>
    @isset($staff_s)
            <tbody>
        @foreach($staff_s as $staff)
                <tr class="recordData_staff table-secondary text-dark">
                    <td class="pb-2 align-middle" style="font-size: 15px;">
                    <div class="send_staffId d-none">{{$staff->id}}</div>
                        <div style="font-size: 16px">{{$staff->name}}</div>  
                        <div style="font-size: 10px">【
                        @foreach($fields as $field)
                            @if($staff->field_id == $field->id)
                                {{$field->name}}
                            @endif
                        @endforeach
                        】</div>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $staff_s->links('vendor.pagination.bootstrap-4') }}</div>
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


</div>


@include('includes.footer')