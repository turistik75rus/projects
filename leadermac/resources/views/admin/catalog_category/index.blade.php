@extends('admin.layout')

@section('content')

<form action="/admin/catalog_categories/order" method="post">
    {{csrf_field()}}
    <section class="content-header">

        <a href="/admin/catalog_categories/create" class="btn btn-success">Создать</a>
        <button type="submit" class="btn btn-warning">Обновить сортировку</button>
    </section>


    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Категории каталога</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                                <tr>
                                    <th style="width: 20px;">Номер сортировки</th>
                                    <th>Фото</th>
                                    <th>Название</th>
                                    <th>Язык</th>
                                    <th>Число публикаций</th>
                                    <th style="width: 40px">Действие</th>
                                </tr>
                                @foreach($categories as $category)
                                <tr>
                                    <th><input class="form-control" name="order[{{$category->id}}]order_id" value="{{$category->order_id}}"></th>
                                    <th><img src="{{$category->img}}" style="height: 40px;"></th>
                                    <th><a href="/admin/catalog_categories/{{$category->id}}/edit">{{$category->title}}</a></th>
                                    <td>@if($category->lang == 'ru') русский @else английский @endif</td>
                                    <td></td>
                                    <td><a href="/admin/catalog_categories/{{$category->id}}/edit" class="btn btn-warning">Изменить</a></td>
                                </tr>
                               
                                @foreach($category->children as $children)
                                <tr>
                                    <th><input class="form-control" name="order[{{$children->id}}]order_id" value="{{$children->order_id}}"></th>
                                    <th></th>
                                    <td><a href="/admin/catalog_categories/{{$children->id}}/edit">{{$children->title}}</a></td>
                                    <td>@if($children->lang == 'ru') русский @else английский @endif</td>
                                    <td>{{$children->products_count}}</td>
                                    <td><a href="/admin/catalog_categories/{{$children->id}}/edit" class="btn btn-warning">Изменить</a></td>
                                </tr>
                                @endforeach
                                 <tr><td colspan="6">Конец дочерних категорий</td></tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection