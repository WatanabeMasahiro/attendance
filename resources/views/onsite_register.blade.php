@include('includes.head')

@include('includes.header')

<div class="container mainContents text-center">    <!-- mainContents -->


    <h2 class="subTitle_3 pt-1 pb-2 mb-4" style="letter-spacing: 0.05em;"><b>ー 現場登録 ー</b></h2>

    @if($errors->has('name'))
        <div class="flashingWarning text-danger h4 my-3">※同じ名前の現場名は登録できません。</div>
    @else
        @isset($registered_call)
            <div class="flashingWarning text-danger h4 my-3">{{$registered_call}}</div>
        @endisset
    @endif

    <div class="my-1">
        <div class="my-1">現場名を入力してください。</div>
        <form action="/onsite_register" method="POST">
        @csrf
            <input class="pagepass2" name="pagepass2" type="hidden" value="{{$pagepass2}}">
            <input name="user_id" type="hidden" value="{{$user->id}}">
            <input name="name" type="text" value = "{{ old('name') }}" placeholder="現場名" class="form-control border-secondary text-center" style="width: 200px; margin: 0 auto;">
            <button name="onsite_registerBtn" type="submit" class="onsite_registerBtn btn btn-success my-3 px-3">登録</button>
        </form>
    </div>

    <hr>

        <table class="table table-hover table-dark recordTable" style="max-width:500px; margin: 0 auto;">

            <thead>
                <tr>
                    <th style="letter-spacing: 0.05em;">登録された現場　一覧</th>
                </tr>
            </thead>
    @isset($fields)
            <tbody>
            @foreach($fields as $field)
                <tr class="table-secondary text-dark">
                    <td class="pb-2 align-middle" style="font-size: 15px;">{{$field->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="paginate d-flex justify-content-center my-4">{{ $fields->links('vendor.pagination.bootstrap-4') }}</div>
    @else
            <tbody>
                <tr>
                    <td class="align-middle bg-white" style="font-size: 15px;">
                        <div class="h2 my-5 text-dark"><b>データがありません。</b></div>
                    </td>
                </tr>
            </tbody>
        </table>
    @endisset


</div>


@include('includes.footer')