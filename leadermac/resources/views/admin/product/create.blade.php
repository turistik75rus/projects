@extends('admin.layout')

@section('content')


<section class="content-header">

    <a href="/admin/products" class="btn btn-success">Назад</a>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить продукт</h3>
                </div>
                <form enctype="multipart/form-data" method="POST" action="/admin/products/create">
                    {{ csrf_field() }} 
                    <div class="box-body">

                        <div class="form-group">
                            <label>Title:</label>
                            <input required="requered"  class="form-control" type="text" name="title">
                        </div>
                        
                        <div class="form-group">
                            <label>Название в общем меню (для SEO):</label>
                            <input class="form-control" type="text"  name="name_menu">
                        </div>
                        
                        <div class="form-group">
                            <label>Сортировка:</label>
                            <input class="form-control" type="text" name="order_id">
                        </div>

                        <div class="form-group">
                            <label>Краткое название для меню слева:</label>
                            <input required="requered"  class="form-control" type="text" name="title_menu">
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
                            <label>Иконка раздела:</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a data-input="thumbnail" data-preview="holder" class="btn btn-primary img-upload">
                                        <i class="fa fa-picture-o"></i> Загрузить
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="icon">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div> 


                        <div class="form-group">
                            <label>Фотограции или ссылки на видео:</label>
                            <div id="product-photos" class="row">
                                <div id="photocol-0" class="col-xs-4">
                                    <div class="input-group">
                                        <!--<span class="input-group-btn">-->
                                            <a data-input="photo-0" data-preview="photoholder-0" class="btn btn-primary img-upload">
                                                <i class="fa fa-picture-o"></i> Загрузить
                                            </a>
                                            <button type="button" class="btn btn-danger" onclick="deletePhoto(0)"><i class="fa fa-trash"></i></button>
                                        <!--</span>-->
                                        <input placeholder="Ссылка" id="photo-0" class="form-control photo-input" type="text" name="photos[0][url]">
                                        <input placeholder="Номер сортировки" class="form-control" value="1" name="photos[0][order_id]">
                                    </div>
                                    <img id="photoholder-0" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>
                        </div> 
                        <div style="padding-top: 40px; padding-bottom: 40px;" class="col-xs-12">
                            <button id="product-photos-add" type="button" class="btn btn-block btn-success">Добавить новую</button>
                        </div>


        



           
                        
                        <div class="form-group">
                            <label>Краткое описание(для SEO):</label>
                            <textarea  rows="10" class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="content"></textarea>
                        </div>
                        
                        
                                         <div class="form-group">
                            <label>Keywords(для SEO):</label>
                            <textarea  rows="10" class="form-control" name="keywords"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Название в хлебных крошках (для SEO):</label>
                            <input class="form-control" type="text"  name="name_breadcrumb">
                        </div>
                        <div class="form-group">
                            <label>Н1 (для SEO):</label>
                            <input class="form-control" type="text"  name="h1">
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