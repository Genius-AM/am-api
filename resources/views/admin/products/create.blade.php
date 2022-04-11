@extends('layouts.admin_layouts')

@section('title', 'Добавить кингу')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Добавить книгу </h1>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss = "alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i> {{ session('success') }} </h4>
                </div>
            @endif
        </div>
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">


            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название книги</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Название книги" required>
                    </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Выбрать категорию</label>
                                <select name="category" class="custom-select">
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1" >Нажми меня :)</label >
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Загрузить</button>
                </div>

            </form>


        </div><!-- /.container-fluid -->
    </section>


@endsection

<?php ?>
