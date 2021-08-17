@extends('admin.layout')

@section('content')



<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Сортировка слайдов</h3>
                </div>
                <div class="box-body">
                    <a href="/admin/slides" class="btn btn-success">Назад</a>
                    <button id="category-update-button" class="btn btn-success">Обновить</button>

       

                    <div class="dd">
                        <ol class="dd-list">
                            @foreach($slides as $slide)
                            <li class="dd-item" data-id="{{$slide->id}}">
                                <div class="dd-handle"><img class="img-responsive" src="{{$slide->img}}"></div>
                            </li>
                            @endforeach
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<style>
    .dd-handle {
        height: 100px;
    }
    .dd-handle > img {
        max-height: 90px;
    }
</style>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $('.dd').nestable({
        maxDepth: 1
    });
    $('#category-update-button').on('click', function () {


        var data = {order: JSON.stringify($('.dd').nestable('toArray'))};

        $.ajax({
            type: "POST",
            url: '/admin/slides/order',
            data: data,
            success: function () {
                swal('Сортировка успешно обновлена', '', 'success');
            }
        });


    });



</script>
@endsection