<div class="col-sm-4 col-md-3">
    <nav class="lighter sidebar">
        <dl class="rolling @if(isset($category) && $category->id == 1) open @endif">
            <dt><h5>Шлифование</h5></dt> <!-- <h5> нужно для вертикального выравнивания -->
            <dd>
                <ul>
                    @foreach($products->whereLoose('category_id', '1') as $p)
                    @if(isset($product) && $product->id == $p->id)
                    <li><a class="active" href="{{$p->url}}">{{$p->title_menu}}</a></li>
                    @else
                    <li><a href="{{$p->url}}">{{$p->title_menu}}</a></li>
                    @endif
                    @endforeach
                </ul>
            </dd>
        </dl>
        <dl class="rolling @if(isset($category) && $category->id == 2) open @endif">
            <dt><h5>Продукция</h5></dt>
            <dd>
                <ul>
                    @foreach($products->whereLoose('category_id', '2') as $p)
                    @if(isset($product) && $product->id == $p->id)
                    <li><a class="active" href="{{$p->url}}">{{$p->title_menu}}</a></li>
                    @else
                    <li><a href="{{$p->url}}">{{$p->title_menu}}</a></li>
                    @endif
                    @endforeach
                </ul>
            </dd>
        </dl>
        <dl class="rolling @if(!isset($category)) open @endif">
            <dt><h5>Полезные ссылки</h5></dt>
           
            <dd>
                <ul>
                    @foreach($pages as $p)  
                    @if(isset($page) && $page->id == $p->id)
                    <li><a class="active" href="{{$p->url}}">{{$p->h1}}</a></li>
                    @else
                    <li><a href="{{$p->url}}">{{$p->h1}}</a></li>
                    @endif
                    @endforeach
                </ul>
            </dd>
        </dl>

    </nav>
</div>