@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/blocks/create" class="btn btn-success">Создать</a>

</section>


<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Тексты</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr> 
                                <th>Название</th>
                                <th>Код для вставки</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($blocks as $block)
                            <tr>
                                <td>{{$block->name}}</td>
                                <td><--block:{{$block->id}}--></td>
                                <td>
                                    <a href="/admin/blocks/{{$block->id}}/edit" class="btn btn-warning">Изменить</a>
                                       <a href="/admin/blocks/{{$block->id}}/delete" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {{ $blocks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection