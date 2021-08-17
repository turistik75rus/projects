@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/services/create" class="btn btn-success">Создать</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Услуги</h3>
                </div>
      
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr> 
                                <th>Название</th>
                                <th>В меню услуги</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($services as $service)
                            <tr>
                                <td><a href="/admin/services/{{$service->id}}/edit">{{$service->name}}</a></td>
                                <td>
                                    @if($service->in_menu)
                                    Да
                                    @else
                                    Нет
                                    @endif
                                </td>
                                <td><a href="/admin/services/{{$service->id}}/edit" class="btn btn-warning">Изменить</a></td>
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