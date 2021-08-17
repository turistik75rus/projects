@extends('admin.layout')

@section('content')
<section class="content-header">

    <a href="/admin/customers" class="btn btn-success">Назад</a>

</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменение клиентов</h3>
                </div>
                <form method="POST" action="/admin/customers/{{$customer->id}}/edit">
                    {{ csrf_field() }} 
                   
                    <div class="box-body">


                        <div class="form-group">
                            <label>Название города:</label>
                            <input required="requered"  class="form-control" type="text" value="{{$customer->name}}" name="customer[name]">
                        </div>
                        
                                         <div class="form-group">
                            <label>Title:</label>
                            <input class="form-control ck-ed" value="{{$customer->title}}" name="customer[title]">
                        </div>
           
        
                        <div class="form-group">
                            <label>Slug:</label>
                            <input required="requered"  class="form-control" type="text" value="{{$customer->slug}}" name="customer[slug]">
                        </div>
                        

                        <div class="form-group">
                            <label>Текст:</label>
                            <textarea class="form-control ck-ed" name="customer[content]">{{$customer->content}}</textarea>
                        </div>
                        
                    
                                  <div class="form-group">
                            <label>Дополнительный текст сверху:</label>
                            <textarea class="form-control ck-ed" name="customer[text1]">{{$customer->text1}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Дополнительный текст снизу:</label>
                            <textarea class="form-control ck-ed" name="customer[text2]">{{$customer->text2}}</textarea>
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