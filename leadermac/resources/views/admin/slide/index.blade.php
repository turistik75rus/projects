@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/slides/create" class="btn btn-success">Создать</a>
     <a href="/admin/slides/order" class="btn btn-success">Сортировка</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Слайдер</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th>Фото</th>
                                <th>Заголовок 1</th>
                                <th>Заголовок 2</th>
                                <th>Ссылка</th> 
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($slides as $slide)
                            <tr>
                                <td><img style="height: 30px;" src="{{$slide->img}}"></td>
                                <td><a href="/admin/slides/{{$slide->id}}/edit">{{$slide->title}}</a></td>
                                <td><a href="/admin/slides/{{$slide->id}}/edit">{{$slide->title2}}</a></td>
                                <td><a href="{{$slide->url}}">{{$slide->url}}</a></td></td>
                                <td>
                                    <a href="/admin/slides/{{$slide->id}}/edit" class="btn btn-warning">Изменить</a>
                                          <a href="/admin/slides/{{$slide->id}}/delete" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                     {{ $slides->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection