@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->

    <h2 class=""><b>（仮サブタイトル）- 出退勤 -</b></h2>

    <div class="h4 mt-4 mb-3"><b>【　現場名　】</b></div>

    <div class="my-1">
        <select name="title" class="p-1">
                <option vlaue="1">名前１</option>
                <option vlaue="1">名前2</option>
                <option vlaue="1">名前3</option>
        </select>
    </div>

    <textarea name="kanso" rows="4" cols="40" placeholder="備考欄" class="p-2"></textarea>

    <div class="text-center">
        <button class="btn btn-success">出勤</button>
        <button class="btn btn-danger">退勤</button>
    </div>

</div>


@include('includes.footer')