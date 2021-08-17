@extends('frontend.layout')
@section('meta')

@if($sel_tag->title == '')
<title>{{$sel_tag->h1}} - Завод абразивного инструмента «Корунд»</title>
@else
<title>{{$sel_tag->title}}</title>
@endif

<title>Завод абразивного инструмента «Корунд» - {{$sel_tag->title}}</title>
<meta name="description" content="{{$sel_tag->description}}">
<meta name="keywords" content="{{$sel_tag->keywords}}">

@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="{{$sel_tag->h1}}">
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
                       {{$sel_tag->name_breadcrumb}}
                        <meta itemprop="item" content="{{url()->full()}}">
                        <meta  itemprop="name" content="{{$sel_tag->name_breadcrumb}}">
                        <meta itemprop="position" content="2" />
                    </li>
                </ul>

            </nav>
            <article>
                <h1>{{$sel_tag->h1}}</h1>
                <div class="col-sm-12">
                    {!! $sel_tag->text1 !!}
                </div>
                <ul class="tagline">

                </ul>
                @foreach($articles as $article)
                <div class="row newslist" itemscope itemtype="http://schema.org/Article">
                    <div class="col-sm-4">
                        <a itemprop="url" href="{{$article->url}}"><img class="artimg" src="{{Croppa::url($article->img, 270, null)}}" alt=""></a>
                         <meta itemprop="image"  content="http://www.zavodkorund.ru/{{$article->img}}">
                    </div>
                    <div class="col-sm-8">
                        <time>{{$article->date_day_month_year}}</time>
                        <h3 itemprop="name"><a href="{{$article->url}}">{{$article->h1}}</a></h3>
                        <div class="newstagline lighter">
                            @foreach($article->tags->unique() as $tag)
                            <a href="/{{$tag->slug}}">{{$tag->name}}</a>
                            @endforeach

                        </div>	
                        <div class="preview-text" itemprop="description">
                            {{$article->description}}
                        </div>
                        <a href="{{$article->url}}" class="podr btn">Подробнее</a>
                    </div>
                </div>
                @endforeach


                {!! $sel_tag->text2 !!}
            </article>
        </div>
    </div>
</main>

@endsection