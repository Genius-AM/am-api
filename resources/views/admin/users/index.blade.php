@extends('layouts.admin_layouts')


<div class="container">
    <h3 style="font-size: 30px; font-family: sans-serif, Verdana">Все пользователи:</h3>
    <div class="row">
        @foreach($users as $user)
            <div class="card mt-5 ml-4" style="width: 24rem; outline: 1px solid #000;">
                <div class="card-body">
                    <h4 class="card-title">{{$user['full_name']}}</h4>
                    <h4 class="card-text mt-4" style="font-size: 17px; font-family: sans-serif, Verdana">Id user: {{$user->id}}</h4>
                    <h4 class="card-text" style="font-size: 17px; font-family: sans-serif, Verdana">Должность: {{$user->JobTitle}}</h4>
                    <h4 class="card-text" style="font-size: 17px; font-family: sans-serif, Verdana">Почта: {{$user->email}}</h4>
                </div>
            </div>
        @endforeach
    </div>
</div>

<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 240px">
    Изенить данные профиля
</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-group mt-1" method="post" enctype="multipart/form-data" action="{{ url('user/personal/{personal}') }}">
                        @csrf
                        @method('PUT')
                        <input class="form-control mt-2 ml-3" name="name" align="middle" type="text" placeholder="" required style="width: 260px">
                        <input class="form-control mt-2" name="last_name" type="text" placeholder="" required style="width: 260px">
                        <input class="form-control mt-2" name="email" type="email" placeholder="" style="width: 260px">


                        <button type="submit" class="btn btn-primary mt-3">Изменить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
