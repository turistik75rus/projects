@extends('frontend.layout')
@section('meta')
<title>Завод абразивного инструмента «Корунд»</title>
<meta name="description" content="">
@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="Главная">
<input type="text" hidden="hidden" name="url" value="{{url()->full()}}">
@endsection
@section('content')

<main class="homepage">
	<section class="container carousel slide hidden-xs" data-ride="carousel" id="mainslider">
		<div class="carousel-inner">
		
                        @foreach($slides->sortBy('order_id') as $key=> $slide)
			<div class="item @if($key == 0) active @endif">
				<div class="slider-image" style="background-image: url('{{Croppa::url($slide->img, null, 260)}}');">
					<div class="container">
						 @if($slide->title)
						 <div class="slider-text">
							<span>{{$slide->title}}</span>
						</div>
						@endif
						@if($slide->title)
						<h3><a href="{{$slide->url}}"><span>{{$slide->title2}}</span></a></h3>
						@endif
						@if ($slide->url)
						 <a href="{{$slide->url}}"><div class="podr">подробнее</div></a>
						@endif
					</div>
                                </div>
                                    
                        </div>
                        @endforeach
		</div>
		<div class="container">
			<ol class="carousel-indicators">
                            @foreach($slides as $key => $slide)
                            @if($key == 0)
				<li data-target="#mainslider" data-slide-to="{{$key}}" class="active"></li>
                                @else
                                <li data-target="#mainslider" data-slide-to="{{$key}}"></li>
                                @endif
                            @endforeach
				
			</ol>
		</div>
	</section>
	<section class="container vpadded">
		<div class="row">
                        @foreach($products->whereLoose('category_id', '1') as $product)
			<div class="col-md-3 col-sm-4 col-xs-6">
                            <a href="{{$product->url}}" class="usluga" style="background-image: url({{Croppa::url($product->icon, null, 200)}})">
					<div>{{$product->name_menu}}</div>
				</a>
			</div>
                        @endforeach
			
		</div>
	</section>
	<section class="lighter catalog">
		<div class="container">
			<h2>Наша продукция</h2>
			<div class="row">
                            @foreach($products->whereLoose('category_id','2') as $product)
				<div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
					<a href="{{$product->url}}" class="catentry">
						<img src="{{$product->icon}}" alt="{{$product->title}}">
						<div>{{$product->name_menu}}</div>
					</a>
				</div>
                            @endforeach
			</div>
		</div>
	</section>
	<section class="primary vrezka">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">
					<h3>Компания Корунд предлагает своим клиентам очень широкий ассортимент шлифовальной продукции для стационарных и ручных шлифовальных машин</h3>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
					<p class="with-phone"><span class="cz_katalog-phone"><a href="tel:+74957390770" onclick="yaCounter46295076.reachGoal('tel-block-katalog'); return true;">+7 (495) 739-07-70</a></span></p>
					<a href="{{$catalog_link->url}}" class="btn btn-default" onclick="yaCounter46295076.reachGoal('skachat-katalog'); return true;">СКАЧАТЬ КАТАЛОГ</a>
				</div>
			</div>
		</div>
	</section>
	<section class="vpadded container">
		<h2>Преимущества работы с нами</h2>
		<p>Выбирая компанию, с которой вы хотите работать, первое, что следует сделать, оценить ее преимущества перед конкурентами. Компания «Лайнер-Белт» обладает целым рядом плюсов по сравнению с другими предприятиями, представленными в этом сегменте рынка, среди них стоит отметить:</p>
		<div class="row tm24">
			<div class="col-md-4 col-xs-6 advp adv1"><strong>Мы знаем, как правильно</strong> клеить шлифовальные ленты. К нам поступает большое количество шлифовального материала в рулонах, мы же изготавливаем из него инструмент такого размера, который нужен вам.</div>			
			<div class="col-md-4 col-xs-6 advp adv2"><strong>Индивидуальный подход</strong><br>
				к решению задач. Так, для каждого инструмента может быть рекомендован определенный тип материала. Также, в зависимости от особенностей вашего производства, мы посоветуем самые подходящие зернистости абразивного материала.
				</div>
			<div class="col-md-4 col-xs-6 advp adv3"><strong>Справляемся со своей работой быстро</strong> – срок изготовления шлифовальных лент составляет до пяти дней, а материал для их производства есть всегда за счет больших его запасов на складе, а также четкой работы системы доставки.</div>
			<div class="col-md-4 col-xs-6 advp adv4 md-clr">Мы работаем не только по определенным схемам, но и <strong>готовы искать новые пути решения</strong> поставленных задач, чтобы максимально удовлетворить запросы своих клиентов.
			</div>
			<div class="col-md-4 col-xs-6 advp adv5">Наш транспортный отдел в силах обеспечить доставку товара практически <strong>в любую точку страны</strong>, при этом она сможет быть выполнена в самый короткий срок.</div>
			<div class="col-md-4 col-xs-6 advp adv6">Перед доставкой шлифовальные материалы упаковываются в картон и полиэтилен, что обеспечивает их <strong>сохранность при транспортировке</strong> и гарантирует получение вами товара высокого качества. </div>
		</div>
	</section>
	<section class="vpadded lighter">
		<div class="container">
			<h2>Пресс-центр <a class="btn btn-default pull-right btn-blk" href="/press/">Читать все</a></h2>
			<div class="row">
                                @foreach($last_articles as $article)
				<div class="col-md-3 col-xs-6 news-preview"  itemscope itemtype="http://schema.org/Article">
					<a itemprop="url" href="{{$article->url}}">
						<div>
                                                      <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
     
      <meta itemprop="url" content="http://www.zavodkorund.ru/images/logo2.jpg">
      <meta itemprop="width" content="168">
      <meta itemprop="height" content="63">
    </div>
    <meta itemprop="name" content="Завод абразивного инструмента «Корунд»">
  </div>
                                                    
                                                    <meta itemprop="author" content="Завод абразивного инструмента «Корунд»"/>
                                             
							<time datetime="{{date('c',strtotime($article->date))}}"  itemprop="datePublished">{{$article->date_dmy}}</time>
                                                        <meta itemprop="image"  content="http://www.zavodkorund.ru/{{$article->img}}">
                                                        
                                                        <img class="img-responsive news-preview"  src="{{Croppa::url($article->img, 270, 180)}}">
							<h4 itemprop="headline" itemprop="name">{{$article->title}}</h4>
							<div class="preview-text" itemprop="description">
								{{$article->description}}							
							</div>
						</div>
					</a>
				</div>
                                @endforeach
	

			</div>
		</div>
	</section>
</main>
@endsection