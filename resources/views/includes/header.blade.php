<body>
    <div class="container header">    <!-- header -->


        <div id="siteTitle" class="siteTitle text-center">
            <h1 class="siteTitle mt-5 pb-1">
                <a href="/" style="text-decoration: none;">
                    <b class="text-danger"><i class="fas fa-user-clock mr-3"></i>出退勤システム</b>
                </a>
            </h1>
        </div>



        <hr class="w-75 pb-0 mb-0">


        <div class="d-block userName text-center">
            @if (Auth::check())
            <p class="text-muted userInfo_M pt-2 pb-0">　<b><i class="fa fa-user h4" aria-hidden="true"></i> 『　{{$user -> name}}　』</b>　</p>
            @else
            <p class="text-muted userInfo_M p-2">　<a href="/register"><b>ユーザー登録</b></a>　</p>
            @endif
        </div>


        <div class="text-center">
            <a id="logout-link" class="logout-links" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
        @if(session()->has('pagepass'))
            <div class="d-inline"> / </div>
            <a class="ancTran1" href="/withdrawal">退会</a>
        @endif
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


        <!-- <hr class="w-75 pb-0 mb-0"> -->


        <nav class="navbar navbar-expand-lg navbar-light bg-warning p-0 rounded mt-3 mb-4">
            @if(session()->has('pagepass'))
            <a class="navbar-brand"><b class="d-lg-none ml-3">メニュー（管理者用）</b></a>
            @else
            <a class="navbar-brand"><b class="d-lg-none ml-3">メニュー</b></a>
            @endif
            <button class="navbar-toggler m-1 border border-light" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-around py-1" id="navbarNavAltMarkup">
                <ul class="d-lg-none navbar-nav border-top border-white">       <!-- モバイル_ul -->
                    <li class="nav-item" style="margin:0 auto;">
                        <a class="nav-link p-3 font-weight-bold" href="/">HOME</a>
                    </li>
                </ul>               <!-- モバイル_ul -->
                <ul class="d-none d-lg-block navbar-nav">                   <!-- PC__ul -->
                    <li class="nav-item" style="margin:0 auto;">
                        <a class="nav-link p-3 font-weight-bold" href="/">HOME</a>
                    </li>
                </ul>
            @if(session()->has('pagepass'))
                <ul class="navbar-nav">
                    <li class="nav-item" style="margin:0 auto;">
                        <a class="ancTran2 nav-link p-3 font-weight-bold" href="/staff_register">　スタッフ登録　</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item" style="margin:0 auto;">
                        <a class="ancTran3 nav-link p-3 font-weight-bold" href="/onsite_register">　　{{$department_onsite}}登録　　</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item" style="margin:0 auto;">
                        <a class="ancTran4 nav-link p-3 font-weight-bold" href="/info_change">ユーザー情報変更</a>
                    </li>
                </ul>
            @endif
                <ul class="navbar-nav">
                    <li class="nav-item" style="margin:0 auto;">
                        <a class="ancTran_pagepass nav-link p-3 font-weight-bold" href="/pagepass" style="border-bottom: 5px solid #ed514e; border-left: 1px solid #ed514e; border-radius: 18px;">《勤怠管理者用画面》</a>
                    </li>
                </ul>                           <!-- PC__ul -->
            </div>
        </nav>


        <form id="passForm" name="passForm" action="" method="GET" style="display: none;">
        </form>


        <!-- <hr class="pt-0 mt-0"> -->


    </div>                                  <!-- /header -->