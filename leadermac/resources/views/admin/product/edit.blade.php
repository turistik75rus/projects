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
                    <h3 class="box-title">Изменить продукт</h3>
                </div>
                <form method="POST" action="/admin/products/{{$product->id}}/edit">
                    {{ csrf_field() }} 
                    <div class="box-body">
       
                        <div class="form-group">
                            <label>Title:</label>
                            <input required="requered"  class="form-control" type="text" value="{{$product->title}}" name="title">
                        </div>
                        
                       <div class="form-group">
                            <label>Название в общем меню (для SEO):</label>
                            <input class="form-control" type="text" value="{{$product->name_menu}}" name="name_menu">
                        </div>
                     
                        <div class="form-group">
                            <label>Сортировка:</label>
                            <input class="form-control" type="text" value="{{$product->order_id}}" name="order_id">
                        </div>

                        <div class="form-group">
                            <label>Краткое название для меню слева:</label>
                            <input required="requered"  class="form-control" type="text" value="{{$product->title_menu}}" name="title_menu">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Категория:</label>
                            <select name="category_id"  class="form-control select-search">
                                @foreach($categories as $category)
                                    @if($product->category_id == $category->id)
                                    <option selected="selected" value="{{$category->id}}">{{$category->title}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label>Главное изображение:</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a data-input="thumbnail" data-preview="holder" class="btn btn-primary img-upload">
                                        <i class="fa fa-picture-o"></i> Загрузить
                                    </a>
                                </span>
                                <input value="{{$product->icon}}" id="thumbnail" class="form-control" type="text" name="icon">
                            </div>
                            <img src="{{$product->icon}}" id="holder" style="margin-top:15px;max-height:100px;">
                        </div> 
                        
                        <div class="form-group">
                            <label>Фотограции или ссылки на видео:</label>
                            <div id="product-photos" class="row">
                                @foreach($product->photos as $key => $photo)
                                <div id="photocol-{{$key}}" class="col-xs-4">
                                    <div class="input-group">
                                       
                                            <a data-input="photo-{{$key}}" data-preview="photoholder-{{$key}}" class="btn btn-primary img-upload">
                                                <i class="fa fa-picture-o"></i> Загрузить
                                            </a>
                                        <button type="button" class="btn btn-danger" onclick="deletePhoto({{$key}})"><i class="fa fa-trash"></i></button>
                                      
                                        <input value="{{$photo->url}}" id="photo-{{$key}}" class="form-control photo-input" type="text" name="photos[{{$key}}][url]">
                                        <input class="form-control" value="{{$photo->order_id}}" name="photos[{{$key}}][order_id]">
                                        
                                        <input class="form-control" value="{{$photo->title}}" name="photos[{{$key}}][title]">
                                    </div>
                                     @if(starts_with($photo->url, 'https://www.youtube.com/'))
                                     <img style="display: none;" id="photoholder-{{$key}}" style="margin-top:15px;max-height:100px;">
                                     <iframe id="videoholder-{{$key}}" src="https://www.youtube.com/embed/{{str_replace('https://www.youtube.com/watch?v=', '',$photo->url)}}"></iframe>
                                    
                                    @else
                                    <img src="{{$photo->url}}" id="photoholder-{{$key}}" style="margin-top:15px;max-height:100px;">
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div> 
                        <div style="padding-top: 40px; padding-bottom: 40px;" class="col-xs-12">
                            <button id="product-photos-add" type="button" class="btn btn-block btn-success">Добавить новую</button>
                        </div>
   
<!--

                        <div class="form-group">

                            <div style="text-align: center;" class="col-xs-12">
                                <label>Характеристики</label>
                            </div>

                            <div class="col-xs-6">
                                <label>Название:</label>
                            </div>
                            <div class="col-xs-6">
                                <label>Значение:</label>
                            </div>
                            <div id="product-specifications" class="row">
                                @foreach($product->specifications as $key => $spec)
                                <div id="spec-{{$key}}">
                                <div class="col-xs-5">
                                    <input class="form-control" type="text" value="{{$spec->name}}" name="specifications[{{$key}}][name]">
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="text" value="{{$spec->value}}" name="specifications[{{$key}}][value]">
                                </div>
                                <div class="col-xs-1">
                                    <input class="form-control" type="text" value="{{$spec->order_id}}" name="specifications[{{$key}}][order_id]">
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" class="btn btn-danger" onclick="deleteSpec({{$key}})"><i class="fa fa-trash"></i></button>
                                </div>
                                </div>
                                    
                                @endforeach
                            </div>
                            <div style="padding-top: 40px;" class="col-xs-12">
                                <button id="product-specifications-add" type="button" class="btn btn-block btn-success">Добавить новую</button>
                            </div>

                        </div>
                       --> 
                        
                        <div class="form-group">
                            <label>Краткое описание(для SEO):</label>
                            <textarea  rows="10" class="form-control" name="description">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="content">{{$product->content}}</textarea>
                        </div>


                        <div class="form-group">
                            <label>Keywords(для SEO):</label>
                            <textarea  rows="10" class="form-control" name="keywords">{{$product->keywords}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Название в хлебных крошках (для SEO):</label>
                            <input class="form-control" type="text" value="{{$product->name_breadcrumb}}" name="name_breadcrumb">
                        </div>
                        <div class="form-group">
                            <label>Н1 (для SEO):</label>
                            <input class="form-control" type="text" value="{{$product->h1}}" name="h1">
                        </div>

                                        <div class="form-group">
                            <label>Slug (для SEO):</label>
                            <input class="form-control" type="text" value="{{$product->slug}}" name="slug">
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