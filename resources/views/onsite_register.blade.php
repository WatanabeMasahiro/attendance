@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->

    <h2 class=""><b>（仮サブタイトル）- 現場登録 -</b></h2>

    <div class="my-1">
        <input class="form-control border-secondary text-center" type="text" placeholder="現場名" style="width: 200px; margin: 0 auto;">
        <input value="登録" class="strSearch btn btn-secondary mt-1 px-3" type="submit">
    </div>

    <hr>


    <table class="noset-table table table-hover table-dark recordTable">
        <tr class="recordData table-secondary text-dark">
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">登録現場　一覧</th>
        </tr>
        <tr class="recordData table-secondary text-dark">
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">1</td>
        </tr>
        <tr class="recordData table-secondary text-dark">
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">2</td>
        </tr>
    </table>

    <div class="text-center">ここにページネーション</div>

</div>


@include('includes.footer')