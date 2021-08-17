@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/documents" class="btn btn-success">Назад</a>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Документ {{$document->name}}</h3>
                </div>
                <form method="POST" enctype="multipart/form-data" action="/admin/documents/{{$document->id}}/edit">
                    {{ csrf_field() }} 
                    <div class="box-body">

                        <div class="form-group">
                            <label>Название:</label>
                            <input required="requered" class="form-control" value="{{$document->name}}" type="text" name="document[name]">
                        </div>
                        
                        <div class="form-group">
                            <label>Отображать в меню:</label>
                            {{Form::select('document[in_menu]', ['1' => 'Да', '0' => 'Нет'], $document->in_menu, ['class' => 'form-control'])}}
                        </div>
                        
                        
                        <div class="form-group">
                            <label>URL страницы или файл ниже:</label>
                            <input class="form-control" value="{{$document->url}}" type="text" name="document[url]">
                        </div>
                        
                        <a href="{{$document->url}}">{{$document->name}}</a>
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