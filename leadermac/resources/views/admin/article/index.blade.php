@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/articles/create" class="btn btn-success">Создать</a>

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
                    <div style="    padding-top: 23px;" class="col-md-4">
                        
                        <button type="submit" class="btn btn-success">Фильтр</button>
                        <a href="/admin/articles" class="btn btn-warning">Очистить</a>
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
                    <h3 class="box-title">Статьи и новости</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                            <tr> 
                                <th>Фото</th>
                                <th>Заголовок</th>
                                <th>Категория</th>
                                <th>Ссылка</th>
                                <th>Теги</th>
                                <th style="width: 40px">Действие</th>
                            </tr>
                            @foreach($articles as $article)
                            <tr>
                                <td><img style="height: 40px;" src="{{$article->img}}"></td>
                                <td><a href="/admin/articles/{{$article->id}}/edit">{{$article->title}}</a></td>
                                <td>{{$article->category->name}}</td>
                                <td><a href="{{$article->url}}">{{$article->url}}</a></td>
                                <td>{{$article->tags->implode('name', ', ')}}</td>
                                <td>
                                    <a href="/admin/articles/{{$article->id}}/edit" class="btn btn-warning">Изменить</a>
                                     <a href="/admin/articles/{{$article->id}}/delete" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection