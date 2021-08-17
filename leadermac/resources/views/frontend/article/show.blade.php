@extends('frontend.layout')
@section('meta')
@if($article->title == '')
<title>{{$article->h1}} - Завод абразивного инструмента «Корунд»</title>
@else
<title>{{$article->title}}</title>
@endif

<meta name="description" content="{{ $article->desc }}">
<meta name="keywords" content="{{ $article->keywords }}">
@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="{{ $article->h1 }}">
<input type="text" hidden="hidden" name="url" value="{{url()->full()}}">
@endsection
@section('content')

<main class="container">
    <div class="row">
         @if($article->category->id == 1)
        <div class="col-sm-4 col-md-3">
            <nav class="lighter sidebar">
                <div class="lastnews hidden-xs">
                    <h5>Последние новости</h5>
                    @foreach($last_articles as $a)
                    <div>
                        <time datetime="">{{ $a->date_dmy }}</time>
                        <a href="{{$a->url}}">{{$a->h1}}</a>
                    </div>
                    @endforeach

                </div>

                <dl class="rolling open">
                    <dt><h5>Архив новостей</h5></dt>
                    <dd>
                        <ul>
                            @foreach($dates as $date)
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
                        <a  itemprop="item"  href="/{{$article->category->slug}}">{{$article->category->name}}</a>
                        <meta  itemprop="name" content="{{$article->category->name}}">
                        <meta itemprop="position" content="2" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        {{$article->name}}
                        <meta itemprop="item" content="{{url()->full()}}">
                        <meta  itemprop="name" content="{{$article->name}}">
                        <meta itemprop="position" content="3" />
                    </li>
                </ul>
            </nav>
            <article itemscope itemtype="http://schema.org/Article">
                
                                                                                         <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
     
      <meta itemprop="url" content="http://www.zavodkorund.ru/images/logo2.jpg">
      <meta itemprop="width" content="168">
      <meta itemprop="height" content="63">
    </div>
    <meta itemprop="name" content="Завод абразивного инструмента «Корунд»">
  </div>
                      <meta itemprop="author" content="Завод абразивного инструмента «Корунд»"/>
                      <meta itemprop="image" content="http://www.zavodkorund.ru{{$article->img}}"/>
                      <meta  content="{{date('c',strtotime($article->date))}}"  itemprop="datePublished"/>
                      
                      <meta  content="{{$article->title}}"  itemprop="headline"/>
                      
                <h1>{{$article->h1}}</h1>
                <div class="lighter line">
                    @if($article->category->id == 1)
                    <span class="primary date">{{$article->date_day_month_year}}</span>
                    @endif
                    @foreach($article->tags->unique() as $tag)
                    <a href="/{{$article->category->slug}}/{{$tag->slug}}">{{$tag->name}}</a>
                    @endforeach

                </div>

                <div>
                     {{--
                    <!--<img class="mainpic"   src="{{$article->img}}" alt="">-->				
--}}

                {!!blocks_replace($article->content, $blocks)!!}
                </div>
 {{--
                <hr>
                       @if($article->category->id != 1)
                    <span class=" date">{{$article->date_day_month_year}}</span>
                    @endif
                   <hr>
                <div class="share">Поделиться:-->
                     Здесь блок "поделиться" от Яндекса
                </div>
            </article>
            --}}
        </div>
    </div>
</main>

@endsection