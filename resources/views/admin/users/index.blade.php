@extends('layouts.admin_layouts')


<div class="container">
    <h3 class="mt-4" style=" text-align: center;font-size: 30px; font-family: sans-serif, Verdana">Все пользователи:</h3>
    <div class="row">
        @foreach($users as $user)
            <div class="card mt-2" style="width: 24rem; outline: 1px solid #000;margin-left: 140px">
                <div class="card-body">
                    <h4 class="card-text">{{$user['full_name']}}</h4>
                    <h4 class="card-text" style="font-size: 17px; font-family: sans-serif, Verdana">Должность: {{$user->JobTitle}}</h4>
                    <h4 class="card-text" style="font-size: 17px; font-family: sans-serif, Verdana">Почта: {{$user->email}}</h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
