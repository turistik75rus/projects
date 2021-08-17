@extends('admin.layout')

@section('content')



<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Общие настройки</h3>
                </div>
                <form class="form-inline" method="POST" action="/admin/settings/user">
                    {{ csrf_field() }} 
                    <div class="box-body">
                         <div class="form-group">
                            <label>Email для входа</label>
                            <input class="form-control" name="email" value="{{$user->email}}">
                         </div>
                        <div class="form-group">
                            <label>Новый пароль</label>
                            <input class="form-control" name="password" placeholder="Новый пароль">
                        </div>
                        <div class="form-group">
                            <label>Email для уведомлений</label>
                            <input class="form-control" name="notify_email" value="{{$user->notify_email}}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
</section>
@endsection