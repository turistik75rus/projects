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
                    <h3 class="box-title">Создание тега</h3>
                </div>
                <form method="POST" action="/admin/tags/create">
                    {{ csrf_field() }} 

                    <div class="box-body">


                        <div class="form-group">
                            <label>Title (SEO):</label>
                            <input required="requered"  class="form-control" type="text"  name="tag[title]">
                        </div>


                        <div class="form-group">
                            <label>Slug (SEO):</label>
                            <input  required="requered"  class="form-control" type="text"   name="tag[slug]">
                        </div>

                        <div class="form-group">
                            <label>H1 (SEO):</label>
                            <input  required="requered"  class="form-control" type="text" name="tag[h1]">
                        </div>

                        <div class="form-group">
                            <label>Название:</label>
                            <input  required="requered"  class="form-control" type="text"  name="tag[name]">
                        </div>

                        <div class="form-group">
                            <label>Текст в хлебных крошках:</label>
                            <input  required="requered"  class="form-control" type="text"  name="tag[name_breadcrumb]">
                        </div>


                        <div class="form-group">
                            <label>Description (для SEO):</label>
                            <textarea  rows="10" class="form-control" name="tag[description]"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Keywords (для SEO):</label>
                            <textarea  rows="10" class="form-control" name="tag[keywords]"></textarea>
                        </div>


                        <div class="form-group">
                            <label>Текст сверху:</label>
                            <textarea class="form-control ck-ed" name="tag[text1]"></textarea>
                        </div>


                        <div class="form-group">
                            <label>Текст снизу:</label>
                            <textarea class="form-control ck-ed" name="tag[text2]"></textarea>
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