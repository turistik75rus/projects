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
                <form method="POST" action="/admin/articles/{{$article->id}}/edit">
                    {{ csrf_field() }} 
                    <div class="box-body">
       
                         <div class="form-group">
                            <label>Дата:</label>
                            <input name="date" value="{{date('d.m.Y', strtotime($article->date))}}" type='text' class="datepicker-here"/>
                         </div>
                        
                        <div class="form-group">
                            <label>Категория:</label>
                            <select name="category_id"  class="form-control select-search">
                                @foreach($categories as $category)
                                    @if($article->category_id == $category->id)
                                    <option selected="selected" value="{{$category->id}}">{{$category->title}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
          
                        <div class="form-group">
                            <label>Теги:</label>
                            {{Form::select('tags[]', $tags, $article->tags->pluck('id')->toArray(), ['class' => 'form-control tagabble', 'multiple' => true])}}
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Картинка:</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a data-input="thumbnail" data-preview="holder" class="btn btn-primary img-upload">
                                        <i class="fa fa-picture-o"></i> Загрузить
                                    </a>
                                </span>
                                <input value="{{$article->img}}" id="thumbnail" class="form-control" type="text" name="img">
                            </div>
                            <img src="{{$article->img}}" id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label>Заголовок:</label>
                            <input required="requered"  value="{{$article->title}}" class="form-control" type="text" name="title">
                        </div>
                        
                                       <div class="form-group">
                            <label>Название в хлебных крошкаъ:</label>
                            <input required="requered" class="form-control" value="{{$article->name}}" type="text" name="name">
                        </div>
                        
                        <div class="form-group">
                            <label>H1:</label>
                            <input required="requered" class="form-control" value="{{$article->h1}}" type="text" name="h1">
                        </div>

                        <div class="form-group">
                            <label>Краткое описание:</label>
                            <textarea rows="10" class="form-control" name="description">{{$article->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="content">{{$article->content}}</textarea>
                        </div>
                                <div class="form-group">
                            <label>Description (SEO):</label>
                            <textarea rows="10" class="form-control" name="desc">{{$article->desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Keywords:</label>
                            <textarea class="form-control" name="keywords">{{$article->keywords}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Slug:</label>
                            <input required="requered" class="form-control" value="{{$article->slug}}" type="text" name="slug">
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