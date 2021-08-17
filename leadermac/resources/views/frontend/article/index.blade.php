@extends('frontend.layout')
@section('meta')

<!--<title>Завод абразивного инструмента «Корунд»<?php /* - {{$category->title}} - Страница {{$page_num}} */ ?></title>-->
<title>Завод абразивного инструмента «Корунд» {{$category->title}} - Страница {{$page_num}}</title>
<meta name="description" content="{{$category->description}}">
<meta name="keywords" content="{{$category->keywords}}">

@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="{{$category->h1}}">
<input type="text" hidden="hidden" name="url" value="{{url()->full()}}">
@endsection
@section('content')


<main class="container">
    <div class="row">
        @if($category->id == 1)
        <div class="col-sm-4 col-md-3">
            <nav class="lighter sidebar">				
                <dl class="rolling open">
                    <dt><h5>Архив новостей</h5></dt>
                    <dd>
                        <ul>
                            @foreach($dates->groupBy('dd') as $date)
                            <?php $date = $date->first(); ?>
                            <li><a href="/press?year={{date('Y', strtotime($date->date)) }}&month={{date('m', strtotime($date->date)) }}">{{$date->date_month_year}}</a></li>
                            @endforeach
                        </ul>
                    </dd>
                </dl>
                <dl class="rolling open">
                    <dt><h5>Полезные ссылки</h5></dt>
                    <dd>
                        <ul>
                            @foreach($pages as $p)
                            <li><a href="{{$p->url}}">{{ $p->title }}</a></li>
                            @endforeach
                        </ul>
                    </dd>
                </dl>

            </nav>
        </div>
        @else
         @include('frontend.catalog.left-menu')
        @endif
        <div class="col-sm-8 col-md-9">
            <nav>
    
                <ul itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="/">Главная</a>
                        <meta  itemprop="name" content="Главная">
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        {{$category->name}}
                        <meta itemprop="item" content="{{url()->full()}}">
                        <meta  itemprop="name" content="{{$category->name}}">
                        <meta itemprop="position" content="2" />
                    </li>
                </ul>
            </nav>
            <article>
                <h1>{{$category->h1}}<?php /* - Страница {{$page_num}} */?></h1>
                {{--
                <!--
              <ul class="tagline">
                    @if(Request::has('tag'))
                    <li><a href="/{{$category->slug}}">все</a></li>
                    @else
                    <li class="selected"><a href="/{{$category->slug}}">все</a></li>
                    @endif
                    @foreach($tags as $tag)
                    @if($tag->name == Request::get('tag'))
                    <li class="selected"><a href="/{{$tag->slug}}">{{$tag->name}}</a></li>
                    @else
                    <li><a href="/{{$tag->slug}}">{{$tag->name}}</a></li>
                    @endif
                    @endforeach
                </ul> 
                -->
                --}}
                @foreach($articles as $article)
                <div class="row newslist" itemscope itemtype="http://schema.org/Article">
                                                                         <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
     
      <meta itemprop="url" content="http://www.zavodkorund.ru/images/logo2.jpg">
      <meta itemprop="width" content="168">
      <meta itemprop="height" content="63">
    </div>
    <meta itemprop="name" content="Завод абразивного инструмента «Корунд»">
  </div>
                      <meta itemprop="author" content="Завод абразивного инструмента «Корунд»"/>
                    <div class="col-sm-4">
                        <a itemprop="url" href="{{$article->url}}"><img   class="artimg" src="{{Croppa::url($article->img, 270, null)}}" alt=""></a>
                         <meta itemprop="image"  content="http://www.zavodkorund.ru/{{$article->img}}">
                    </div>
                    <div class="col-sm-8">
                        <time datetime="{{date('c',strtotime($article->date))}}"  itemprop="datePublished">{{$article->date_day_month_year}}</time>
                        <h3><a itemprop="headline" itemprop="name" href="{{$article->url}}">{{$article->h1}}</a></h3>
                       @if($category->id != 1 && $article->tags->unique()->count() > 0)
                        <div class="newstagline lighter">
                            @foreach($article->tags->unique() as $tag)
                            <a href="/{{$tag->slug}}">{{$tag->name}}</a>
                            @endforeach

                        </div>
                       @endif
                        <div class="preview-text" itemprop="description">
                            {{$article->description}}
                        </div>
                        <a href="{{$article->url}}" class="podr btn">Подробнее</a>
                    </div>
                </div>
                @endforeach

                <nav class="paging">
                     @include('frontend.paginator', ['category' => $category, 'paginator' => $articles])
                      
                </nav>
            </article>
        </div>
    </div>
</main>

@endsection