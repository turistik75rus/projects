@extends('admin.layout')

@section('content')



    <section class="content-header">

        <a href="/admin/articles_categories/create" class="btn btn-success">Создать</a>

     

    </section>


    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Категории статей</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th>Название</th>
                                    <th>Ссылка</th>
                                    <th style="width: 40px">Действие</th>
                                </tr>
                                @foreach($categories as $category)
                                <tr>

                                    <td><a href="/admin/articles_categories/{{$category->id}}/edit">{{$category->title}}</a></td>
                                    <td><a href="/{{$category->slug}}">/{{$category->slug}}</a></td>
                                    <td>
                                        <a href="/admin/articles_categories/{{$category->id}}/edit" class="btn btn-warning">Изменить</a>
                                        <a href="/admin/articles_categories/{{$category->id}}/delete" class="btn btn-danger">Удалить</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection