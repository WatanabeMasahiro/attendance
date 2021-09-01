@include('includes.head')

@include('includes.header')


<div class="container text-center">


    <h2 class="subTitle_5 pt-1 pb-2" style="letter-spacing: 0.25em;"><b>ー 出退勤 ー</b></h2>

    @if($errors->has('remarks'))
        <div class="flashingWarning text-danger h4 my-3">※データが登録できません。<p class="mt-2 h5">（備考欄の文字数を、おおよそ1000文字までにしてください。）</p></div>
    @endif


    @if($fieldName == false || $staffNames == false)
        <div class="h4 my-4">データがありません。</div>
    @else
        <div class="h4 my-4"><b class="mark border rounded-pill px-5 py-1">{{$fieldName}}</b></div>

        <form action="/attendance" method="POST">
        @csrf
            <div class="text-center">

                <input name="field_name" type="hidden" value="{{$fieldName}}">

                <div class="text-center my-2">
                    <div class="my-1">名前を選択して下さい。</div>
                    <select name="staff_name" class="p-1">
                    @if(old('staff_name') == null)
                        <option value="0" hidden>スタッフ名</option>
                        @foreach($staffNames as $staffName)
                            <option>{{$staffName->name}}</option>
                        @endforeach
                    @else
                        @foreach($staffNames as $staffName)
                            @if($staffName->name == old('staff_name'))
                            <option selected>{{$staffName->name}}</option>
                            @continue
                            @else
                            <option>{{$staffName->name}}</option>
                            @endif
                        @endforeach
                    @endif
                    </select>
                </div>

                <textarea name="remarks" rows="4" cols="40" placeholder="備考欄" class="p-2 mt-3">{{old('remarks')}}</textarea>

                <div class="text-center mt-3 mb-4">
                    <button name="punchIn" value="true" type="submit" class="punchinBtn btn btn-danger btn-lg mt-1 mr-4">出勤</button>
                    <button name="punchOut" value="true" type="submit" class="punchoutBtn btn btn-info btn-lg mt-1 ml-4">退勤</button>
                </div>

            </div>
        </form>

        <div class="text-danger">※備考欄の文字数は、おおよそ1000文字までです。</div>
    @endif


</div>


@include('includes.footer')