@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/pages/create" class="btn btn-success">Создать</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Страницы</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
              
                                <th>Заголовок</th>
                                <th>URL</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($pages as $page)
                            <tr>
                           
                                <td><a href="/admin/pages/{{$page->id}}/edit">{{$page->title}}</a></td>
                                <td><a href="{{$page->url}}">{{$page->url}}</td>
                                <td>
                                    <a href="/admin/pages/{{$page->id}}/edit" class="btn btn-warning">Изменить</a>
                                          <a href="/admin/pages/{{$page->id}}/delete" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                     {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection