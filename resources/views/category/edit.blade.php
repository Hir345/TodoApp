<html>
<head>
    <title>Category.Edit</title>
</head>
<body>
    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h1>カテゴリ編集</h1>

    <form action="/board/{id}/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <input type="text" name="name" value="{{$category->name}}">
    <input type="date" name="deadline" value="{{$category->deadline}}">
    <input type="submit" value="確定">
    </form>

    <ul>
        @foreach ($category->todo as $item)
            <li>{{$item->getName()}}</li>
        @endforeach
    </ul>
    <a href="/board">カテゴリ一覧へ戻る</a>
</body>
</html>