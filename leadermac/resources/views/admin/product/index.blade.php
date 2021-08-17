@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/products/create" class="btn btn-success">Создать</a>

</section>


<section class="content">

        <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Фильтр</h3>
                </div>
           
            <div class="box-body">
                <form method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <label>Категория</label>
                                 <select name="ct_id"  class="form-control">
                                     <option value="0">Все</option>
                                    @foreach($categories as $category)
                                    @if(Request::get('ct_id') == $category->id)
                                    <option selected="selected" value="{{$category->id}}">{{$category->title}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                   
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-4">
                        <label>Заголовок</label>
                        <input name="title" class="form-control" value="{{Request::get('title')}}">
                    </div>
                    <div style="padding-top: 23px;" class="col-md-4">
                        
                        <button type="submit" class="btn btn-success">Фильтр</button>
                        <a href="/admin/products" class="btn btn-warning">Очистить</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Каталог</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>  
                                <th>Фото</th>
                                <th>№</th>
                                <th>Заголовок</th>
                                <th>Категория</th>
                                <th>Ссылка</th>
                                <th>Действие</th>
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <td><img style="height: 50px;" src="{{$product->icon}}"></td>
                                <td>{{$product->order_id}}</td>
                                <td><a href="/admin/products/{{$product->id}}/edit">{{$product->title}}</a></td>
                                <td>{{$product->category->title}}</td>
<th>{{$product->url}}</th>
                                <td>
                                            <a href="/admin/products/{{$product->id}}/edit" class="btn btn-warning">Изменить</a>
                                                  <a href="/admin/products/{{$product->id}}/delete" class="btn btn-danger">Удалить</a>
                                        </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                     {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection