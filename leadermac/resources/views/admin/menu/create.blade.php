@extends('admin.layout')

@section('content')

<section class="content-header">

    <a href="/admin/menu" class="btn btn-success">Назад</a>

</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменить блок</h3>
                </div>
                <form method="POST" action="/admin/menu/create">
                    {{ csrf_field() }} 
                    <div class="box-body">

                       <div class="form-group">
                            <label>Родитель:</label>
                            <select name="menu[parent_id]"  class="form-control select-search">
                                 <option value="0">Главная</option>
                                @foreach($parents as $parent)
        
                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                               
                                @endforeach
                            </select>
                        </div>
             
                        <div class="form-group">
                            <label>Название:</label>
                            <input required="requered" class="form-control" type="text" name="menu[name]">
                        </div>

                  
                        <div class="form-group">
                            <label>Ссылка:</label>
                             <input class="form-control" type="text" name="menu[link]">
                        </div>
                        
                        <div class="form-group">
                            <label>Номер сортировки:</label>
                            <input required="requered" class="form-control" type="text" name="menu[order_id]">
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