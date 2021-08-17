<html>
    <body>
        <h1>Cora - контакт</h1>
        <div class="order">

            <b>Имя:</b> {{ $contact['name'] or '' }} <br />
            <b>Компания:</b> {{ $contact['company'] or '' }} <br />
            <b>Телефон:</b> {{ $contact['phone'] or '' }} <br />
            <b>Email:</b> {{ $contact['email'] or '' }}<br />
            <b>Сообщение:</b> {{$contact['message'] or '' }} <br>
            <b>Страница:</b> <a href="{{$contact['url']}}">{{$contact['title']}}</a>
        </div>
    </body>
</html>