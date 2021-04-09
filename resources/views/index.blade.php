@include('includes.head')

@include('includes.header')

<div class="container mainContents">    <!-- mainContents -->

    <div class="text-center">
        <a href="/" class="">現場登録</a>
    </div>

    <select name="title" class="p-1">
            <option vlaue="1">現場名１</option>
            <option vlaue="1">現場名2</option>
            <option vlaue="1">現場名3</option>
    </select>

    <div class="text-center">
        <button class="btn btn-success">出退勤</button>
        <button class="btn btn-danger">スタッフ登録</button>
    </div>

    <input class="form-control border-secondary text-center" type="search" placeholder="Search" style="width: 200px;">
    <input value="検索" class="strSearch btn btn-secondary px-3" type="submit">


    <table class="noset-table table table-hover table-dark recordTable">
        <tr class="recordData table-secondary text-dark">
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">テスト１</th>
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">テスト2</th>
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">テスト3</th>
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">テスト4</th>
            <th class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">テスト5</th>
        </tr>
        <tr class="recordData table-secondary text-dark">
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">1</td>
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">2</td>
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">3</td>
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">4</td>
            <td class="matter_td px-3 pb-0 align-middle" style="font-size: 15px;">5</td>
        </tr>
    </table>

    <div class="text-center">ここにページネーション</div>

</div>


@include('includes.footer')