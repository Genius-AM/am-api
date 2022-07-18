@extends('layouts.personal_layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-title">
                    <div class="col-lg-10">
                        <div class="user-info-id">
                            <h4>ID-пользователя</h4>
                            {{$user->id}}
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-3">
                        <div class="user-info-box">
                            <h4>Должность:</h4>
                            {{$user->JobTitle}}
                        </div>
                        <br>
                        <div class="user-info-box name">
                            <h4>Имя Фамилия</h4>
                            {{ $user['full_name']}}
                        </div>
                        <br>
                        <div class="user-info-box phone">
                            <h4>Почта</h4>
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 240px">
                Изенить данные профиля
            </button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$user->name}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group mt-1" method="post" enctype="multipart/form-data" action="{{ url('user/personal/{personal}') }}">
                            @csrf
                            @method('PUT')
                            <input class="form-control mt-2 ml-3" name="name" align="middle" type="text" placeholder="{{$user->name}}" required style="width: 260px">
                            <input class="form-control mt-2" name="last_name" type="text" placeholder="{{$user->last_name}}" required style="width: 260px">
                            <input class="form-control mt-2" name="email" type="email" placeholder="{{$user->email}}" style="width: 260px">


                            <button type="submit" class="btn btn-primary mt-3">Изменить</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
