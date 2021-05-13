@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->


    <h2 class="subTitle_2 pt-1 pb-2 mb-4" style="letter-spacing: 0.02em;"><b>ー スタッフ登録 ー</b></h2>

    <form action="/staff_register" method="POST">
    @csrf
        <input  name="user_id" type="hidden" value="{{$user->id}}">

        <div class="my-3">
            <div class="my-1">現場名を選択してください。</div>
            <select name="field_id" class="p-1">
                <option hidden>現場名</option>
                @foreach($fields as $field)
                    <option value="{{$field->id}}">{{$field->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="my-1">
            <div class="my-1">スタッフ名を入力してください。</div>
            <input class="form-control border-secondary pl-2" name="name" type="text" placeholder="スタッフ名" style="width: 200px; margin: 0 auto;">
            <button name="staff_registerBtn" type="submit" class="staff_registerBtn strSearch btn btn-secondary my-3 px-3">登録</button>
        </div>

    </form>


    <hr>


        <table class="table table-hover table-dark recordTable" style="max-width:500px; margin: 0 auto;">
            <thead>
                <tr>
                    <th style="letter-spacing: 0.05em;">登録スタッフ一覧<div class="d-inline-block" style="font-size: 8px">（降順）</div></th>
                </tr>
            </thead>
    @isset($staff_s)
            <tbody>
        @foreach($staff_s as $staff)
                <tr class="table-secondary text-dark">
                    <td class="pb-2 align-middle" style="font-size: 15px;">{{$staff->name}}</td>
                </tr>
        @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $staff_s->links('vendor.pagination.bootstrap-4') }}</div>
    @else
            <tbody>
                <tr class="recordData table-secondary text-dark">
                    <td class="matter_td px-3 pb-0 align-middle  bg-white" colspan="5" style="font-size: 15px;">
                        <div class="h2 my-5"><b>データがありません。</b></div>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset

</div>


@include('includes.footer')