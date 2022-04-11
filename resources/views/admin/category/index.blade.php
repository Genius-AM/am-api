<?php  ?>
@extends('layouts.admin_layouts')

@section('title', 'Все категории')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все категории</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            ID
                        </th>
                        <th style="width: 20%">
                           Название
                        </th>

                    </tr>
                    </thead>
                    @foreach($categories as $category)
                    <tbody>
                        <tr>
                            <td>
                                {{$category ['id']}}
                            </td>
                            <td>
                               {{$category ['title']}}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route( 'categories.edit' , $category['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                   Редактировать
                                </a>
                               <form action="{{route('categories.destroy', $category['id']) }}" method="POST" style="display: inline-block">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                       <i class="fas fa-trash">
                                       </i>
                                       Удалить
                                   </button>
                               </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

