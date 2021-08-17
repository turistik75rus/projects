@extends('frontend.layout')
@section('meta')
<title>Наши клиенты - Завод абразивного инструмента «Корунд»</title>
@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="Наши клиенты">
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
                    <li>Наши клиенты</li>
                </ul>
            </nav>
            <article>
                <div style="text-align: center;" class="col-xs-12">
                <img src="/img/userimg/nashi_zakazchiki/map_big.jpg">
                </div>
                <div style="padding-top: 50px;" class="col-xs-12">
                    @foreach($customers->chunk(3) as $customers_chunk)
                    <div class="col-lg-4 col-xs-12">
                    @foreach($customers_chunk as $l => $customers2)
                    <p style="text-align: center; font-size: 24px;">{{$l}}</p>
                    @foreach($customers2 as $cust)
                    <a href="/customers/{{$cust->slug}}">{{$cust->name}}</a>
                    @endforeach
                    @endforeach
                    </div>
                    @endforeach
                    
                </div>
       
            </article>
        </div>
    </div>
</main>

@endsection