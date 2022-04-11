@extends('layouts.admin_layouts')

@section('title', ' Редактировать книгу ')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Редактировать книгу : {{ $products ['title']}} </h1>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">


            <form action="{{ route('product.update', $products['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название категории</label>
                        <input type="text" class="form-control" name="title" value="{{ $products['title'] }}" id="exampleInputEmail1" placeholder="Название категории" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>

        </div>
    </section>


@endsection

