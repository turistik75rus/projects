@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/service" class="btn btn-success">Назад</a>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить услугу</h3>
                </div>
                <form method="POST" enctype="multipart/form-data" action="/admin/services/create">
                    {{ csrf_field() }} 
                    <div class="box-body">

                        <div class="form-group">
                            <label>Название:</label>
                            <input required="requered" class="form-control" type="text" name="service[name]">
                        </div>
                        
                        <div class="form-group">
                            <label>Отображать в меню:</label>
                            {{Form::select('service[in_menu]', ['1' => 'Да', '0' => 'Нет'], null, ['class' => 'form-control'])}}
                        </div>
                        
                        <div class="form-group">
                            <label>URL страницы или файл ниже:</label>
                            <input class="form-control"  type="text" name="service[url]">
                        </div>
                        
               
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