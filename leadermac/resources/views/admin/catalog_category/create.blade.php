@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/catalog_categories" class="btn btn-success">Назад</a>

</section>



<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Создать категорию</h3>
                </div>
                <form method="POST" action="/admin/catalog_categories/create">
                    {{ csrf_field() }} 
                    <div class="box-body">
  
                        <div class="form-group">
                            <label>Родительская категория:</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Главная</option>
                                @foreach($parents as $parent)
                                <option value="{{$parent->id}}">{{$parent->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Язык:</label>
                            {{Form::select('lang', ['ru' => 'Русский', 'en' => 'Английский'], null, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            <label>Название:</label>
                            <input required="requered"  class="form-control" type="text" name="title">
                        </div>

                        <div class="form-group">
                            <label>Описание (для SEO):</label>
                            <textarea  rows="10" class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Картинка (для главных категорий):</label>
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