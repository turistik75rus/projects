<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cora - Admin</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="/admin/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

       <script src="https://unpkg.com/sweetalert2@7.13.3/dist/sweetalert2.all.js"></script>

        <link rel="stylesheet" href="/admin/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/admin/css/skins/_all-skins.min.css">

        <link rel="stylesheet" href="/admin/css/select2.css">

        <link href="/admin/css/datepicker.css" rel="stylesheet" type="text/css"/>

                <script src="/admin/js/jquery-2.2.3.min.js"></script>
        <script src="/admin/js/bootstrap.min.js"></script>
        <script src="/admin/js/app.min.js"></script>
        <script src="/admin/js/select2.full.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="/admin/js/datepicker.js" type="text/javascript"></script>
        <script src="/ckeditor/ckeditor.js"></script>
        <script src="/ckeditor/adapters/jquery.js"></script>

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.js"></script>
        <style>
            td:last-child {
                width: 180px;
            }
            td > .btn {
                display: inline-block;
                width: 80px;
            }

            .new-catalog-table{width:100%;table-layout:fixed;border-collapse:collapse}.new-catalog-table .color-w{color:#fff}.new-catalog-table .bg-black{background-image:url("/photos/new_catalog/black.jpg")}.new-catalog-table .bg-black-large{background-image:url("/photos/new_catalog/black-large.jpg")}.new-catalog-table .bg-petal-black{background-image:url("/photos/new_catalog/petal-black.jpg")}.new-catalog-table .bg-brown{background-image:url("/photos/new_catalog/brown.jpg")}.new-catalog-table .bg-dark-brown{background-image:url("/photos/new_catalog/dark-brown.jpg")}.new-catalog-table .bg-gray{background-image:url("/photos/new_catalog/gray.jpg")}.new-catalog-table .bg-light-grey{background-image:url("/photos/new_catalog/light-grey.jpg")}.new-catalog-table .bg-green{background-image:url("/photos/new_catalog/green.jpg")}.new-catalog-table .bg-dark-green{background-image:url("/photos/new_catalog/dark-green.jpg")}.new-catalog-table .bg-pink{background-image:url("/photos/new_catalog/pink.jpg")}.new-catalog-table .bg-red{background-image:url("/photos/new_catalog/red.jpg")}.new-catalog-table .bg-petal-red{background-image:url("/photos/new_catalog/petal-red.jpg")}.new-catalog-table .bg-dark-red{background-image:url("/photos/new_catalog/dark-red.jpg")}.new-catalog-table .bg-grid{background-image:url("/photos/new_catalog/grid.jpg")}.new-catalog-table .bg-white{background-image:url("/photos/new_catalog/white.jpg")}.new-catalog-table .bg-purple{background-image:url("/photos/new_catalog/purple.jpg")}.new-catalog-table .bg-blue{background-image:url("/photos/new_catalog/blue.jpg")}.new-catalog-table .bg-dark-blue{background-image:url("/photos/new_catalog/dark-blue.jpg")}.new-catalog-table .bg-beige{background-image:url("/photos/new_catalog/beige.jpg")}.new-catalog-table .bg-vinous{background-image:url("/photos/new_catalog/vinous.jpg")}.new-catalog-table tr,.new-catalog-table td{border:2px solid #fff}.new-catalog-table tr.smaller-fz>td:not(:first-of-type){font-size:13px}.new-catalog-table td{padding:8px}.new-catalog-table td img{max-width:100%}.new-catalog-table td:first-of-type{background-color:#d6dcdc;width:100px;max-width:100px}.new-catalog-table td:not(:first-child),.new-catalog-table th{font-weight:normal;text-align:center;background-color:#e9eaec}

        </style>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>Cora</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Cora</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-gears"></i>
                                </a>
                                <ul class="dropdown-menu">

                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Настройки</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Выход</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <ul class="sidebar-menu">
                        <!--
                        <li class="active treeview">
                          <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                          </ul>
                        </li>
                        -->
<!--
                        <li {{ (Request::is('admin/home*') ? 'class=active' : '') }}><a href="/admin/home"><i class="fa fa-home "></i> <span>Главная страница</span></a></li>
   -->
                        <li {{ (Request::is('admin/settings*') ? 'class=active' : '') }}><a href="/admin/settings"><i class="fa fa-cog"></i> <span>Общие настройки</span></a></li>

                        <li {{ ((Request::is('admin/articles/*') || Request::is('admin/articles')) ? 'class=active' : '') }}><a href="/admin/articles"><i class="fa fa-newspaper-o"></i> <span>Статьи</span></a></li>

                        <li {{ ((Request::is('admin/articles_categories/*') || Request::is('admin/articles_categories')) ? 'class=active' : '') }}><a href="/admin/articles_categories"><i class="fa fa-newspaper-o"></i> <span>Разделы статей</span></a></li>


                        <li {{ (Request::is('admin/products*') ? 'class=active' : '') }}><a href="/admin/products"><i class="fa fa-shopping-cart"></i> <span>Каталог</span></a></li>

                        <li {{ (Request::is('admin/slides*') ? 'class=active' : '') }}><a href="/admin/slides"><i class="fa fa-slideshare"></i> <span>Слайдер</span></a></li>

                        <li {{ (Request::is('admin/pages*') ? 'class=active' : '') }}><a href="/admin/pages"><i class="fa fa-file"></i> <span>Страницы</span></a></li>



                      <!--  <li {{ (Request::is('admin/documents*') ? 'class=active' : '') }}><a href="/admin/documents"><i class="fa fa-folder"></i> <span>Документы</span></a></li>-->


                        <li {{ (Request::is('admin/blocks*') ? 'class=active' : '') }}><a href="/admin/blocks"><i class="fa fa-folder"></i> <span>Блоки текста</span></a></li>

                        <li {{ (Request::is('admin/menu*') ? 'class=active' : '') }}><a href="/admin/menu"><i class="fa fa-folder"></i> <span>Меню</span></a></li>

                         <li {{ (Request::is('admin/customers*') ? 'class=active' : '') }}><a href="/admin/customers"><i class="fa fa-folder"></i> <span>Клиенты</span></a></li>

                      <!--  <li {{ (Request::is('admin/services*') ? 'class=active' : '') }}><a href="/admin/services"><i class="fa fa-folder"></i> <span>Услуги</span></a></li> -->

                                <li {{ (Request::is('admin/tags*') ? 'class=active' : '') }}><a href="/admin/tags"><i class="fa fa-folder"></i> <span>Теги</span></a></li>




                    </ul>
                </section>

            </aside>

            <div class="content-wrapper">
                @include('flash::message')

                @yield('content')
            </div>

            <footer class="main-footer">
                <strong>Cora</strong>
            </footer>

        </div>


        <script>
            var options = {
                allowedContent: true,
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                contentsCss: ['/assets/css/template_styles.min.css','/assets/css/bootstrap.min.css'],
                height: 530
            };
            $(document).ready(function () {
                $('.ck-ed').ckeditor(options);
            });
        </script>

        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
        <script>
            $('.img-upload').filemanager('image');
            $('.file-upload').filemanager('file');

            $(".tagabble").select2({
                tags: true
            });

            $(".select-search").select2();

            $('#product-specifications-add').on('click', function () {
                var count = $('#product-specifications > div').length;
                var number = count;

                $('#product-specifications').append('<div id="spec-'+number+'">'
                                +'<div class="col-xs-5">'
                                    +'<input class="form-control" type="text"  name="specifications['+number+'][name]">'
                                +'</div>'
                                +'<div class="col-xs-5">'
                                    +'<input class="form-control" type="text" name="specifications['+number+'][value]">'
                                +'</div>'
                                +'<div class="col-xs-1">'
                                    +'<input class="form-control" type="text" value="'+(number+1)+'" name="specifications['+number+'][order_id]">'
                                +'</div>'
                                +'<div class="col-xs-1">'
                                    +'<button type="button" class="btn btn-danger" onclick="deleteSpec('+number+')"><i class="fa fa-trash"></i></button>'
                                +'</div>'
                        +'</div>'
                        );

            });

    $('#product-photos-add').on('click', function () {

                var count = $('#product-photos > div').length;
                var number = count;
                $('#product-photos').append('<div id="photocol-' + number + '" class="col-xs-4">'
                        + '<div class="input-group">'

                        + '<a data-input="photo-' + number + '" data-preview="photoholder-' + number + '" class="btn btn-primary img-upload">'
                        + '<i class="fa fa-picture-o"></i> Загрузить'
                        + '</a>'
                        +'<button type="button" class="btn btn-danger" onclick="deletePhoto(' + number + ')"><i class="fa fa-trash"></i></button>'

                        + '<input id="photo-' + number + '" class="form-control photo-input" type="text" name="photos[' + number + '][url]">'
                        + '<input class="form-control" value="' + (number + 1) + '" name="photos[' + number + '][order_id]">'
                        + '<input class="form-control" value="" name="photos[' + number + '][title]">'
                        + '</div>'
                        + '<img id="photoholder-' + number + '" style="margin-top:15px;max-height:100px;">'
                        + '</div>');
                $('.img-upload').filemanager('image');
            });

            function deleteSpec(id) {
                $('#spec-'+id).remove();
            }

            function deletePhoto(id) {
                $('#photocol-'+id).remove();
            }

            $('#product-photos').on('change', '.photo-input', function () {


                var number = $(this).attr('id').replace('photo-', '');
                var video_id = matchYoutubeUrl($(this).val());

                if (video_id != false) {
                    $(this).val('https://www.youtube.com/watch?v='+video_id);
                    $('#photoholder-' + number).hide();

                    $('#photoholder-' + number).after('<iframe id="videoholder-' + number + '" src="http://www.youtube.com/embed/' +video_id + '">')
                } else {
                    $('#videoholder-' + number).remove();
                    $('#photoholder-' + number).show();
                }


            });

            function matchYoutubeUrl(url) {
                var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                return (url.match(p)) ? RegExp.$1 : false;
            }


            $('.btn-danger').on('click', function(event) {
                event.preventDefault();
              var href =  $(this).attr('href');
                        swal({
            title: 'Точно удалить?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Удалить',
            cancelButtonText: 'Отменить'
        }).then(function () {


        window.location.href = href;

        });
            });

        </script>

         @yield('script')

    </body>
</html>
