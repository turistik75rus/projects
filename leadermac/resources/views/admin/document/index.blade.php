@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/documents/create" class="btn btn-success">Создать</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Документация</h3>
                </div>
      
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr> 
                                <th>Название</th>
                                <th>В меню документы</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($documents as $document)
                            <tr>
                                <td><a href="/admin/documents/{{$document->id}}/edit">{{$document->name}}</a></td>
                                <td>
                                    @if($document->in_menu)
                                    Да
                                    @else
                                    Нет
                                    @endif
                                </td>
                                <td><a href="/admin/documents/{{$document->id}}/edit" class="btn btn-warning">Изменить</a></td>
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