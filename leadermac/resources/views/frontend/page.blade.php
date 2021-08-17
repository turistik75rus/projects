@extends('frontend.layout')
@section('meta')

@if($page->title == '')
<title>{{$page->h1}} - Завод абразивного инструмента «Корунд»</title>
@else
<title>{{$page->title}}</title>
@endif

<meta name="description" content="{{ $page->description }}">
<meta name="keywords" content="{{ $page->keywords }}">
@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="{{ $page->title }}">
<input type="text" hidden="hidden" name="url" value="{{url()->full()}}">
@endsection
@section('content')


<main class="container">
    <div class="row">
        @include('frontend.catalog.left-menu')
        <div class="col-sm-8 col-md-9">
            <nav>
                <ul itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="/">Главная</a>
                        <meta  itemprop="name" content="Главная">
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        {{$page->name}}
                        <meta itemprop="item" content="{{url()->full()}}">
                        <meta  itemprop="name" content="{{$page->name}}">
                        <meta itemprop="position" content="2" />
                    </li>
                </ul>
            </nav>
            <article>
                <h1>{{$page->h1}}</h1>
                <div class="description">
                  {!! blocks_replace($page->content, $blocks) !!}
                </div>
            </article>
        </div>
    </div>
</main>

@endsection