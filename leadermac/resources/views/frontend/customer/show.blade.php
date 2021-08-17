@extends('frontend.layout')
@section('meta')

@if($customer->title == '')
<title>Абразивные инструменты в городе {{$customer->name}} - Завод абразивного инструмента «Корунд»</title>
@else
<title>{{$customer->title}}</title>
@endif


@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="Абразивные инструменты в городе {{$customer->name}}">
<input type="text" hidden="hidden" name="url" value="{{url()->full()}}">
@endsection
@section('content')


<main class="container">
    <div class="row">
        @include('frontend.catalog.left-menu')
        <div class="col-sm-8 col-md-9">
            <nav>
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/customers">Наши клиенты</a></li>
                    <li>Абразивные инструменты в городе {{$customer->name}}</li>
                </ul>
            </nav>
            <article>
                <h1>Абразивные инструменты в городе {{$customer->name}}</h1>
                <div>
                     {!! blocks_replace($customer->text1, $blocks) !!}
                </div>
                <h2>Наши клиенты</h2>
                <div class="description">
                  {!! blocks_replace($customer->content, $blocks) !!}
                </div>
                
                <div>
                     {!! blocks_replace($customer->text2, $blocks) !!}
                </div>
            </article>
        </div>
    </div>
</main>

@endsection