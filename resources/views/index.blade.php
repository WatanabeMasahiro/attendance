@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->


    <h2 class="subTitle_1 pt-1 pb-2" style="letter-spacing: 0.05em;"><b>ホーム</b></h2>

    <hr/>

    <form action="/attendance" method="GET">
        <div class="">現場名を選択し、出退勤ボタンを押してください。</div>
        <div class="my-2">
            <select name="on_site" class="p-1">
                <option value="0" hidden>現場名</option>
                @foreach($fields as $field)
                    <option value="{{$field->id}}">{{$field->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <input value="出退勤" class="index_punchBtn btn btn-danger" type="submit">
        </div>
    </form>

    <hr/>

    <form action="/" method="GET">
        <div class="mt-4">絞り込みたい文字を入力し、検索ボタンを押してください。</div>
        <div class="mt-2 mb-4">
            <input name="search" value="{{$search}}" class="text-center form-control border-secondary my-1" type="search" placeholder="Search" style="width: 200px; margin: 0 auto;">
            <input value="検索" class="strSearch btn btn-secondary px-3" type="submit">
        </div>
    </form>

        <table class="table table-hover table-dark recordTable">
            <thead>
                <tr>
                    <th style="width: 130px;">日　時<div class="d-inline-block" style="font-size: 8px">（降順）</div></th>
                    <th style="width: 300px;">現　場</th>
                    <th style="font-size: 15px; width: 200px;">スタッフ</th>
                    <th style="width: 100px;">出　退</th>
                    <th>備　考</th>
                </tr>
            </thead>
    @isset($contents)
            <tbody>
        @foreach($contents as $content)
                <tr class="table-secondary text-dark">
                    <td class="align-middle" style="font-size: 15px;">
                        <div>{{$content->created_at->format('Y-m-d')}}</div>
                        <div>{{$content->created_at->format('H:i')}}</div>
                    </td>
                    <td class="align-middle" style="font-size: 15px;">{{$content->field_name}}</td>
                    <td class="align-middle" style="font-size: 15px;">{{$content->staff_name}}</td class="align-middle">
                    <td class="align-middle" style="font-size: 18px;">
                        @if($content->punch === 1)
                            <div class="text-danger"><b>出勤</b></div>
                        @elseif($content->punch === 0)
                            <div class="text-info"><b>退勤</b></div>
                        @else
                            <div class="text-secondary" style="font-size: 15px;">なし</div>
                        @endif
                    </td>
                    <td class="align-middle" style="font-size: 15px;"><pre>{{$content->remarks}}</pre></td>
                </tr>
        @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $contents->links('vendor.pagination.bootstrap-4') }}</div>
    @else
            <tbody>
                <tr>
                    <td class="align-middle bg-white" colspan="5" style="font-size: 15px;">
                        <div class="h2 my-5 text-dark"><b>データがありません。</b></div>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset


</div>


@include('includes.footer')