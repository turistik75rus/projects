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
                    <h3 class="box-title">Изменить блок</h3>
                </div>
                <form method="POST" action="/admin/blocks/{{$block->id}}/edit">
                    {{ csrf_field() }} 
                    <div class="box-body">
       
                        <div class="form-group">
                            <label>Название:</label>
                            <input required="requered" value="{{$block->name}}" class="form-control" type="text" name="block[name]">
                        </div>

                  
                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="block[content]">{{$block->content}}</textarea>
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