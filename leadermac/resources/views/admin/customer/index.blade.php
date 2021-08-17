@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/customers/create" class="btn btn-success">Создать</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Клиенты</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
              
                                <th>Город</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($customers as $customer)
                            <tr>
                           
                                <td><a href="/admin/customers/{{$customer->id}}/edit">{{$customer->name}}</a></td>
                                <td>
                                    <a href="/admin/customers/{{$customer->id}}/edit" class="btn btn-warning">Изменить</a>
                                      <a href="/admin/customers/{{$customer->id}}/delete" class="btn btn-danger">Удалить</a>
                                    
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