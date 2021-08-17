@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/menu/create" class="btn btn-success">Создать</a>

</section>


<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Меню</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr> 
                                <th>Текст</th>
                                <th>Номер сортировки</th>
                                <th>URL</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($menu as $item)
                            <tr>
                                <td><b>{{$item->name}}</b></td>
                                <td>{{$item->order_id}}</td>
                                <td><a href="{{$item->link}}">{{$item->link}}</a></td>
                                <td>
                                    <a href="/admin/menu/{{$item->id}}/edit" class="btn btn-warning">Изменить</a>
                                     <a href="/admin/menu/{{$item->id}}/delete" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                            @foreach($item->children as $child)
                            <tr>
                                <td>{{$child->name}}</td>
                                <td>{{$child->order_id}}</td>
                                <td><a href="{{$child->link}}">{{$child->link}}</a></td>
                                <td>
                                    <a href="/admin/menu/{{$child->id}}/edit" class="btn btn-warning">Изменить</a>
                                     <a href="/admin/menu/{{$child->id}}/delete" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
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