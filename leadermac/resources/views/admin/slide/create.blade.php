@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/slides" class="btn btn-success">Назад</a>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить слайд</h3>
                </div>
                <form method="POST" action="/admin/slides/create">
                    {{ csrf_field() }} 
                    <div class="box-body">

                        <div class="form-group">
                            <label>Изображение</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a data-input="thumbnail" data-preview="holder" class="btn btn-primary img-upload">
                                        <i class="fa fa-picture-o"></i> Загрузить
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="img">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div> 

                        
                        <div class="form-group">
                            <label>Ссылка:</label>
                            <input class="form-control" type="text" name="url">
                        </div>
                        
                        <div class="form-group">
                            <label>Заголовок 1:</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        
                       
                        <div class="form-group">
                            <label>Заголовок 2:</label>
                            <input class="form-control" type="text" name="title2">
                        </div>
                        
                        <div class="form-group">
                            <label>Отображать:</label>
                            {{Form::select('show', ['true' => 'Да', 'false' => 'Нет'], null, ['class' => 'form-control'])}}
                        </div>
                        
                        <div class="form-group">
                            <label>Новок окно:</label>
                            {{Form::select('new_window', ['true' => 'Да', 'false' => 'Нет'], null, ['class' => 'form-control'])}}
                        </div>
          




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