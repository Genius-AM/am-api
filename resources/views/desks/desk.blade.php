@extends('layouts.app')

@section('content')
<div class="container">

    <form method="get" action="{{ route('desk.new') }}">
        <input type="text" name="cod" class="col-lg-3">
            <div class="form-group">
                @if(\Illuminate\Support\Facades\Session::get('SmsCode') == \Illuminate\Http\Request::)
                    <label class="form-label mt-3">Добавление доски</label>
                    <input type="text" name="name" style="width:200px;" placeholder="Введите название доски" size="5" class="form-control w-25">
                @endif
            </div>
        <button type="submit" class="btn btn-primary mt-3">Создать</button>
    </form>

    <div class="row">
        <div class="col-lg-3">
            @foreach($desks as $desk)
                @if( \Illuminate\Support\Facades\Auth::id() == $desk->user_id )
                    <div class="card mt-5 ">
                        <div class="card-body">
                            <a class="card-title d-flex justify-content-between align-items-center desk-name" href="{{route('desk-lists.index')}}" target="_blank" style="color: black; text-decoration: none;">{{$desk->name }}</a>
                        </div>
                        <button type="submit" name="del" class="btn btn-danger">Удалить</button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
