<!DOCTYPE html>
<html lang="ja">
<title>エラーページ｜出退勤システム</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <style>
    .error-wrap {
      margin: 10px auto;
      padding: 5px 20px;
      width: 300px;
      /* display: inline-block; */
      border: 1px solid #dcdcdc;
      box-shadow: 0px 0px 8px #dcdcdc;
    }
    h1 { font-size: 18px; }
    h2 {
      font-size: 16px;
      color: gray;
    }
    p { font-size: 12px; }
  </style>
</head>
<body>
<div class="error-wrap">
  <section>
    <h1>ページを表示できません</h1>
    <h2 class="gray-text">@yield('title')</h2>
    <div style="margin: 28px 0;">
      <p class="error-message">@yield('message')</p>
      <p class="error-detail">@yield('detail')</p>
    </div>
    @yield('link')
  </section>
</div>
</body>
</html>