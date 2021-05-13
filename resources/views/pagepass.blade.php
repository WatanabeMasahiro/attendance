@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->

    <h2 class=""><b>- ページパスの入力 -</b></h2>

    <form action="/attendance" method="POST">
    @csrf
        <div class="my-2 text-center">
            <input  name="on_site" type="hidden" value="{{$onsite}}">
            <!-- <input name="pagepass1" type="hidden" value="{{$user->pagepass}}"> -->
            <input name="pagepass2" type="password" class="form-control border-secondary text-center" style="width: 200px; margin: 0 auto;">
            <button name="" type="submit" class="btn btn-success my-2">送信</button>
        </div>
    </form>


</div>


@include('includes.footer')