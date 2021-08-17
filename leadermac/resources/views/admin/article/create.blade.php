@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/articles" class="btn btn-success">Назад</a>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить новость</h3>
                </div>
                <form method="POST" action="/admin/articles/create">
                    {{ csrf_field() }} 
                    <div class="box-body">

                         <div class="form-group">
                            <label>Дата:</label>
                            <input name="date" type='text' class="datepicker-here"/>
                         </div>
                       
                        
                        <div class="form-group">
                            <label>Категория:</label>
                            <select name="category_id"  class="form-control select-search">
                                @foreach($categories as $category)
        
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                               
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Теги:</label>
                            {{Form::select('tags[]', $tags, null, ['class' => 'form-control tagabble', 'multiple' => true])}}
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Картинка:</label>
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
                            <label>Заголовок:</label>
                            <input required="requered" class="form-control" type="text" name="title">
                        </div>
                        
                        <div class="form-group">
                            <label>Название в хлебных крошкаъ:</label>
                            <input required="requered" class="form-control" type="text" name="name">
                        </div>
                        
                        <div class="form-group">
                            <label>H1:</label>
                            <input required="requered" class="form-control" type="text" name="h1">
                        </div>

                        <div class="form-group">
                            <label>Краткое описание:</label>
                            <textarea  rows="10" class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="content"></textarea>
                        </div>
                        
                                 <div class="form-group">
                            <label>Description (SEO):</label>
                            <textarea rows="10" class="form-control" name="desc"></textarea>
                        </div>
                        
                            <div class="form-group">
                            <label>Keywords:</label>
                            <textarea class="form-control" name="keywords"></textarea>
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