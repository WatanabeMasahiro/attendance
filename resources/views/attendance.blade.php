@include('includes.head')

@include('includes.header')

<hr class="w-75">

<div class="container mainContents text-center">    <!-- mainContents -->


    <h2 class="subTitle_5 pt-1 pb-2" style="letter-spacing: 0.25em;"><b>ー 出退勤 ー</b></h2>

    <div class="h4 my-4"><b>【　{{$fieldName}}　】</b></div>

    <form action="/attendance" method="POST">
    @csrf
        <div class="text-center">

            <input name="user_id" type="hidden" value="{{$user->id}}">

            <input name="field_name" type="hidden" value="{{$fieldName}}">

            <div class="text-center my-2">
                <div class="my-1">名前を選択して下さい。</div>
                <select name="staff_name" class="p-1">
                    <option value="0" hidden>スタッフ名</option>
                    @foreach($staffNames as $staffName)
                        <option vlaue="1">{{$staffName->name}}</option>
                    @endforeach
                </select>
            </div>

            <input name="punch" type="hidden" value="{{$punch}}">

            <textarea name="remarks" rows="4" cols="40" placeholder="備考欄" class="p-2 mt-3"></textarea>

            <div class="text-center mt-3 mb-4">
                <button name="punchIn" type="submit" class="punchinBtn btn btn-danger btn-lg mt-1 mr-4">出勤</button>
                <button name="punchOut" type="submit" class="punchoutBtn btn btn-info btn-lg mt-1 ml-4">退勤</button>
            </div>

        </div>
    </form>


</div>


@include('includes.footer')