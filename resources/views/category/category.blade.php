<html>
<head>
    <title>Category</title>
</head>
<body>
    <h1>タスク詳細</h1>
    <h2>{{$category->getData()}}<a href="/board/{{$category->getId()}}/edit">編集</a> <a href="/board/{{$category->getId()}}/del">削除</a></h2>
    Todo
    <ul>
        {{--<form action="/board/{{$category->getId()}}" method="post">--}}
        @csrf
        @foreach ($category->todo as $item)
        <li>
            {{$item->getName()}}
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="submit" value="削除">
        </li>
        @endforeach
        <li><a href="/board/{{$category->getId()}}/addTodo">+</a></li>
        {{--</form>--}}
    </ul>
    <a href="/board">カテゴリ一覧へ戻る</a>
</body>
</html>