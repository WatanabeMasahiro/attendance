@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->

    <h2 class=""><b>- 勤怠管理者用パス -</b></h2>

    <form action="/pagepass" method="POST">
    @csrf
        <div class="my-2 text-center">
            <input name="pagepass" type="password" class="form-control border-secondary text-center" style="width: 200px; margin: 0 auto;">
            <button name="pagepass_input" type="submit" class="btn btn-success m-3">ログイン</button>
            <button name="pagepass_output" type="submit" class="btn btn-danger m-3">ログアウト</button>
        </div>
    </form>


</div>


@include('includes.footer')