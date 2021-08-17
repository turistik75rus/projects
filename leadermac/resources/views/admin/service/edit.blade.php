@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/services" class="btn btn-success">Назад</a>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Услуга {{$service->name}}</h3>
                </div>
                <form method="POST" enctype="multipart/form-data" action="/admin/services/{{$service->id}}/edit">
                    {{ csrf_field() }} 
                    <div class="box-body">

                        <div class="form-group">
                            <label>Название:</label>
                            <input required="requered" class="form-control" value="{{$service->name}}" type="text" name="service[name]">
                        </div>
                        
                        <div class="form-group">
                            <label>Отображать в меню:</label>
                            {{Form::select('service[in_menu]', ['1' => 'Да', '0' => 'Нет'], $service->in_menu, ['class' => 'form-control'])}}
                        </div>
                        
                        
                        <div class="form-group">
                            <label>URL страницы или файл ниже:</label>
                            <input class="form-control" value="{{$service->url}}" type="text" name="service[url]">
                        </div>
                        
                        <a href="{{$service->url}}">{{$service->name}}</a>
                        <input name="file" type="file">

                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection