@if(isset($catalog_categories[$id]))
<div class="halfcard">
    <a href="{{catalog_url($current_lang,$catalog_categories[$id])}}">
        <img src="{{$catalog_categories[$id]->img}}" alt="" class="halfcard-image">
        <div class="cattitle caprimary">{{$catalog_categories[$id]->title}}</div>
    </a>
</div>
@endif