@extends('frontend.layout')


@section('meta')

@if($product->title == '')
<title>{{$product->h1}} - Завод абразивного инструмента «Корунд»</title>
@else
<title>{{$product->title}}</title>
@endif

<meta name="description" content="{{ $product->description }}">
<meta name="keywords" content="{{ $product->keywords }}">
@endsection
@section('contact')
<input type="text" hidden="hidden" name="url" value="{{url()->full()}}">
<input type="text" hidden="hidden" name="title" value="{!! $product->title !!}">
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
                        <a  itemprop="item"  href="/{{$category->slug}}">{{$category->title}}</a>
                        <meta  itemprop="name" content="{{$category->title}}">
                        <meta itemprop="position" content="2" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        {{$product->name_breadcrumb}}
                        <meta itemprop="item" content="{{url()->full()}}">
                        <meta  itemprop="name" content="{{$product->name_breadcrumb}}">
                        <meta itemprop="position" content="3" />
                    </li>
                </ul>
            </nav>
            <article itemscope itemtype="http://schema.org/Product">
                                <meta itemprop="name" content="{{$product->h1}}">
                    <meta itemprop="description" content="{{$product->description}}">
                                                      <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="price" content="Звоните для уточнения цены">
                        <meta itemprop="priceCurrency" content="RUB">
                      
                    </div>
                <h1 >{{$product->h1}}</h1>
                
                        <div class="owl-carousel fullwidth">
            
            @foreach($product->photos as $photo)
            <div class="product-photo">
            <div class="product-photo-a">
            @if(starts_with($photo->url, 'https://www.youtube.com/'))
            
            <a class="colorbox" href="{{$photo->url}}" title="{{$photo->description}}" alt="{{$photo->description}}">
                 <img itemprop="image" src="http://img.youtube.com/vi/{{str_replace('https://www.youtube.com/watch?v=', '',$photo->url)}}/0.jpg"  class="js-pphoto">
                  <div class="youtube-icon">
                 
                  </div>
             </a>
             
            <!--<iframe width="100%" height="200"  src="https://www.youtube.com/embed/{{str_replace('https://www.youtube.com/watch?v=', '',$photo->url)}}" frameborder="0" allowfullscreen></iframe>-->
            @else
            <a class="colorbox" href="{{$photo->url}}"  title="{{$photo->title}}"  alt="{{$photo->title}}"><img itemprop="image" src="{{Croppa::url($photo->url, null, 270)}}"  class="js-pphoto"></a>
            @endif
            </div>
                <div class="product-photo-description">
            {{$photo->title}}
                </div>
              </div>
            @endforeach
        </div>
                <div class="description">
                  {!! blocks_replace($product->content, $blocks) !!}
                </div>
                <section class="primary fine vrezka">
                    <div class="row">				
                        <div class="col-md-6 col-xs-12">
                            <h4>Хотите разместить заказ?</h4>
<? //                             <h5>{{$product->title}}?</h5> ?>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <p class="with-phone"><span class="cz_zvonok-phone"><a href="tel:+74957390770" onclick="yaCounter46295076.reachGoal('tel-block-zakazat-zvonok'); return true;">+7 (495) 739-07-70</a></span></p>
                        </div>
                        <div class="col-md-3 col-xs-6">						
                            <a href="#" class="btn btn-default btn-lg contactmodalshow" onclick="yaCounter46295076.reachGoal('otpravit-clicks'); return true;">Заказать звонок</a>
                        </div>
                    </div>			
                </section>
                <noindex>
                <div>
                    <img src="/bimage.jpg" style="width: 100%;">
                </div>
                </noindex>
            </article>
        </div>
    </div>
</main>

@endsection