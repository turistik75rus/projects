@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/tags/create" class="btn btn-success">Создать</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Теги</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
              
                                <th>Название</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($tags as $tag)
                            <tr>
                           
                                <td><a href="/admin/tags/{{$tag->id}}/edit">{{$tag->name}}</a></td>
                                <td>
                                    <a href="/admin/tags/{{$tag->id}}/edit" class="btn btn-warning">Изменить</a>
                                     <a href="/admin/tags/{{$tag->id}}/delete" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                     {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection