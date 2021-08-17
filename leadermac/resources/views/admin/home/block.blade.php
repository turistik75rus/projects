<div class="halfcard">
    @if($image)
    <div class="form-group">
        <label>Картинка:</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a data-input="thumbnail{{$id}}" data-preview="holder{{$id}}" class="btn btn-primary img-upload">
                    <i class="fa fa-picture-o"></i> Загрузить
                </a>
            </span>
            <input value="{{$home_blocks[$id]->img}}" name="block[{{$id}}][img]" id="thumbnail{{$id}}" class="form-control" type="text">
        </div>
        <img src="{{$home_blocks[$id]->img}}" id="holder{{$id}}" style="margin-top:15px;max-height:100px;">
    </div>
    @endif
    <div style="border: 1px solid rgb(210, 214, 222)">
    <div class="form-group">
        <label>Заголовок RU:</label>
        <input name="block[{{$id}}][title_ru]" value="{{$home_blocks[$id]->title_ru}}" class="form-control" type="text">
    </div>
    <div class="form-group">
        <label>URL RU:</label>
        <input name="block[{{$id}}][url_ru]" value="{{$home_blocks[$id]->url_ru}}" class="form-control" type="text">
    </div>
    </div>
    <div style="border: 1px solid rgb(210, 214, 222)">
    <div class="form-group">
        <label>Заголовок EN:</label>
        <input name="block[{{$id}}][title_en]" value="{{$home_blocks[$id]->title_en}}" class="form-control" type="text">
    </div>
    <div class="form-group">
        <label>URL EN:</label>
        <input name="block[{{$id}}][url_en]" value="{{$home_blocks[$id]->url_en}}" class="form-control" type="text">
    </div>
    </div>
</div>