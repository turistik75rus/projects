@extends('admin.layout')

@section('content')



<section class="content">
    <form method="POST" action="/admin/home">
         {{ csrf_field() }} 
        <button class="btn btn-success" type="submit">Обновить</button>
    <h3>Деревообрабатывающие станки и оборудование</h3>
    <div class="row">
        <div class="col-sm-3 col-xs-6">
            @include('admin.home.block',['id' => 1, 'image'=>true])
            @include('admin.home.block',['id' => 2, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 3, 'image'=>false])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 4, 'image'=>true])
            
        </div>
    </div>	

    <h3>Инжиниринг и проектирование промышленных объектов</h3>
    <div class="row bmarg">
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 5, 'image'=>true])
             @include('admin.home.block',['id' => 6, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
                    @include('admin.home.block',['id' => 7, 'image'=>false])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 8, 'image'=>true])
              @include('admin.home.block',['id' => 9, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 10, 'image'=>true])
        </div>
    </div>	
    <h3>Реализованные проекты деревообрабатывающих производств</h3>
    <div class="row bmarg">
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 11, 'image'=>true])
             @include('admin.home.block',['id' => 12, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 13, 'image'=>false])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 14, 'image'=>true])
             @include('admin.home.block',['id' => 15, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 16, 'image'=>true])
        </div>
    </div>	
    <h3>Проектирование и строительство объектов гражданского назначения</h3>
    <div class="row bmarg">
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 17, 'image'=>true])
             @include('admin.home.block',['id' => 18, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 19, 'image'=>false])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 20, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
              @include('admin.home.block',['id' => 21, 'image'=>true])
        </div>
    </div>	
    <h3>О группе компаний</h3>
        <div class="row bmarg">
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 22, 'image'=>true])
             @include('admin.home.block',['id' => 23, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 24, 'image'=>false])
        </div>
        <div class="col-sm-3 col-xs-6">
             @include('admin.home.block',['id' => 25, 'image'=>true])
             @include('admin.home.block',['id' => 26, 'image'=>true])
        </div>
        <div class="col-sm-3 col-xs-6">
              @include('admin.home.block',['id' => 27, 'image'=>true])
               @include('admin.home.block',['id' => 28, 'image'=>true])
        </div>
    </div>
        </form>
</section>
@endsection