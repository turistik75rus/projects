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
                    <h3 class="box-title">Добавить страницу</h3>
                </div>
                <form method="POST" action="/admin/pages/create">
                    {{ csrf_field() }} 
                    <div class="box-body">


                        <div class="form-group">
                            <label>Title(SEO):</label>
                            <input  required="requered"  class="form-control" type="text" name="page[title]">
                        </div>
                        
                               <div class="form-group">
                            <label>H1:</label>
                            <input  required="requered"  class="form-control" type="text" name="page[h1]">
                        </div>
                        
                        <div class="form-group">
                            <label>Текст в хлебных крошках:</label>
                            <input  required="requered"  class="form-control" type="text" name="page[name]">
                        </div>
                        
                        <div class="form-group">
                            <label>В меню полезных ссылок:</label>
                            {{Form::select('page[in_menu]', ['1' => 'Да', '0' => 'Нет'], null, ['class' => 'form-control'])}}
                        </div>
        
                        <div class="form-group">
                            <label>Description (для SEO):</label>
                            <textarea  rows="10" class="form-control" name="page[description]"></textarea>
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Keywords (для SEO):</label>
                            <textarea  rows="10" class="form-control" name="page[keywords]"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="page[content]"></textarea>
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