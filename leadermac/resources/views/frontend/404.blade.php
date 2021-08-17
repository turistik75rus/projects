@extends('frontend.layout')
@section('meta')
<title>Завод абразивного инструмента «Корунд» - 404</title>

@endsection

@section('content')


<main class="container">
    <div class="row">

        <div class="col-sm-12">

            <article>
                <h1>Ошибка 404. Нет такой страницы</h1>
                <form action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="utf-8">
                    <input type="hidden" name="searchid" value="2313672">
                    <input type="hidden" name="l10n" value="ru">
                    <input type="hidden" name="reqenc" value="">
                    <div class="form-group">
                        <input type="text" name="text" placeholder="Поиск..." class="form-control " id="mainsearchinput">
                    </div>
                    <button type="submit" class="btn btn-default" id="mainsearchbtn">Поиск</button>
                </form>
            </article>
        </div>
    </div>
</main>

@endsection