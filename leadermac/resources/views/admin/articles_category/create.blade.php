@extends('admin.layout')

@section('content')
<section class="content-header">

    <a href="/admin/articles_categories" class="btn btn-success">Назад</a>

</section>



<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Создать категорию</h3>
                </div>
                <form method="POST" action="/admin/articles_categories/create">
                    {{ csrf_field() }} 
                    <div class="box-body">

                        
          
                        <div class="form-group">
                            <label>Название:</label>
                            <input required="requered"  class="form-control" type="text" name="category[name]">
                        </div>
                        
                       <div class="form-group">
                            <label>H1 (SEO):</label>
                            <input required="requered"  class="form-control" type="text" name="category[h1]">
                        </div>
                        
                        <div class="form-group">
                            <label>Title (SEO):</label>
                            <input required="requered"  class="form-control" type="text" name="category[title]">
                        </div>

                             <div class="form-group">
                            <label>Description (SEO):</label>
                            <textarea  rows="10" class="form-control" name="category[description]"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Keywords (SEO):</label>
                            <textarea  rows="10" class="form-control" name="category[keywords]"></textarea>
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