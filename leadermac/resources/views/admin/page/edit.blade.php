@extends('admin.layout')

@section('content')
<section class="content-header">

    <a href="/admin/pages" class="btn btn-success">Назад</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменение страницы</h3>
                </div>
                <form method="POST" action="/admin/pages/{{$page->id}}/edit">
                    {{ csrf_field() }} 
                   
                    <div class="box-body">


                        <div class="form-group">
                            <label>Title (SEO):</label>
                            <input required="requered"  class="form-control" type="text" value="{{$page->title}}" name="page[title]">
                        </div>
                        
                        
                                  <div class="form-group">
                            <label>Slug (SEO):</label>
                            <input  required="requered"  class="form-control" type="text" value="{{$page->slug}}" name="page[slug]">
                        </div>
                        
                       <div class="form-group">
                            <label>H1:</label>
                            <input  required="requered"  class="form-control" type="text" value="{{$page->h1}}" name="page[h1]">
                        </div>
                        
                        <div class="form-group">
                            <label>Текст в хлебных крошках:</label>
                            <input  required="requered"  class="form-control" type="text" value="{{$page->name}}" name="page[name]">
                        </div>
                        

                        <div class="form-group">
                            <label>В меню полезных ссылок:</label>
                            {{Form::select('page[in_menu]', ['1' => 'Да', '0' => 'Нет'], $page->in_menu, ['class' => 'form-control'])}}
                        </div>
       
                        <div class="form-group">
                            <label>Краткое описание (для SEO):</label>
                            <textarea  rows="10" class="form-control" name="page[description]">{{$page->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="page[content]">{{$page->content}}</textarea>
                        </div>
                        
                                   <div class="form-group">
                            <label>Keywords (для SEO):</label>
                            <textarea  rows="10" class="form-control" name="page[keywords]">{{$page->keywords}}</textarea>
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