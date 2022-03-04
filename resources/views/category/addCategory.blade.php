<html>
<head>
    <title>カテゴリ作成</title>
</head>
<body>
    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/add" method="post">
        @csrf
        <label>タスク名<input type="text" name="name" value="{{old('name')}}"></label>
            <label>期日<input type="date" name="deadline" value="{{old('date')}}"></label>
                <input type="submit" value="作成">
    </form>
</body>
</html>