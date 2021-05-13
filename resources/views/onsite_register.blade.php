@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->

    <h2 class="subTitle_3 pt-1 pb-2 mb-4" style="letter-spacing: 0.05em;"><b>ー 現場登録 ー</b></h2>

    <div class="my-1">
        <form action="/onsite_register" method="POST">
        @csrf
            <input name="user_id" type="hidden" value="{{$user->id}}">
            <input name="name" type="text" placeholder="現場名" class="form-control border-secondary text-center" style="width: 200px; margin: 0 auto;">
            <button name="onsite_registerBtn" type="submit" class="onsite_registerBtn btn btn-secondary mt-1 px-3">登録</button>
        </form>
    </div>

    <hr>


    <table class="noset-table table table-hover table-dark recordTable">
        <tr class="recordData table-secondary text-dark">
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">登録現場　一覧</th>
        </tr>
        @foreach($fields as $field)
            <tr class="recordData table-secondary text-dark">
                <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">{{$field->name}}</td>
            </tr>
        @endforeach
    </table>

    <div class="text-center">ここにページネーション</div>

</div>


@include('includes.footer')