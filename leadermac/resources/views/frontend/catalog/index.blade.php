@extends('frontend.layout')

@section('meta')
<title>Продукция - Завод абразивного инструмента «Корунд»</title>
@endsection
@section('contact')
<input type="text" hidden="hidden" name="title" value="Продукция">
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
                        Продукция
                        <meta itemprop="item" content="{{url()->full()}}">
                        <meta  itemprop="name" content="Продукция">
                        <meta itemprop="position" content="2" />
                    </li>
                </ul>
			</nav>
			<article>
				<h1>Наша продукция</h1>
				<div  itemscope itemtype="http://schema.org/ItemList" class="row whitecatalog">
                                        @foreach($products->whereLoose('category_id', '2') as $product)
					<div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"  class="col-md-4 col-sm-6 col-xs-6">
						<meta itemprop="position" content="{{$product->id}}">
                                                  <link itemprop="url" href="{{$product->url}}" />
                                                <a itemscope itemtype="http://schema.org/Product" href="{{$product->url}}" class="catentry">
							<link itemprop="url" href="{{$product->url}}" />
                                                        <img  itemprop="image" src="{{$product->icon}}" alt="{{$product->title}}">
							<div  itemprop="name">{{$product->name_menu}}</div>
                                                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="price" content="Звоните для уточнения цены">
                        <meta itemprop="priceCurrency" content="RUB">
                      
                    </div>
                                                          <meta itemprop="description" content="{{$product->description}}">
						</a>
					</div>
                                        @endforeach
					
				</div>

				<section class="primary nice vrezka">
					<div class="row">				
						<div class="col-md-8 col-sm-7 col-xs-7">
							<h5 style="text-transform: none; font-size: 18px;">Компания Корунд предлагает своим клиентам очень широкий ассортимент шлифовальной продукции для стационарных и ручных шлифовальных машин</h5>
						</div>
						<div class="col-md-4 col-sm-5 col-xs-5">
							<p class="with-phone"><a href="tel:+74957390770" onclick="yaCounter46295076.reachGoal('tel-block-katalog'); return true;">+7 (495) 739-07-70</a></p>
							<a href="/files/59c3824dbd984.pdf" class="btn btn-default btn-lg" onclick="yaCounter46295076.reachGoal('skachat-katalog-vnutr'); return true;">СКАЧАТЬ КАТАЛОГ</a>
						</div>
					</div>			
				</section>
<? /* 				<section>
					<h2>Новинки</h2>
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<a href="#" class="novinka">
								<div class="novimg"><div>
									<img src="images/new1.jpg" alt="">
								</div></div>
								<h4>Шевронные ленты</h4>
								<div class="preview-text">
									Узкие и широкие шефровнные ленты применяются в калибровально-шлифовальных станках в качестве опорных лент
								</div>
							</a>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-6">
							<a href="#" class="novinka">
								<div class="novimg"><div>
									<img src="images/new2.jpg" alt="">
								</div></div>
								<h4>Отрезные круги КРАТОН</h4>
								<div class="preview-text">
									Высококачественные отрезные круги КРАТОН обладают высокой прочностью и износостойкостью при сравнительно низкой цене
								</div>
							</a>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-6">
							<a href="#" class="novinka">
								<div class="novimg"><div>
									<img src="images/new3.jpg" alt="">
								</div></div>
								<h4>Синтетические круги и пады</h4>
								<div class="preview-text">
								Синтетические круги используются на паркетно-шлифовальных машинах Columbus и применяются при производстве широкого круга работ
								</div>
							</a>
						</div>
					</div>
				</section> */ ?>
			</article>
		</div>
	</div>
</main>
@endsection