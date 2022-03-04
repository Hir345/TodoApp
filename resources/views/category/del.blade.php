<html>
<head>
    <title>Category.Delete</title>
</head>
<body>
    <h1>カテゴリ削除</h1>

    <form action="/board/{id}/del" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    {{$category->getData()}}
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