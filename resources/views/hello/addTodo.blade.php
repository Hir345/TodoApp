<html>
<head>
    <title>todo作成</title>
</head>
<body>
    <h1>{{$category->getData()}}にtodoを追加</h1>
    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <ul>
        @foreach ($category->todo as $item)
            <li>{{$item->getName()}}</li>
        @endforeach
        
        <li>
        <form action="/board/{{$category->getId()}}/addTodo" method="post">
            @csrf
            <label>todo名<input type="text" name="name"></label>
            <input type="hidden" name="category_id" value="{{$category->getId()}}">
            <input type="submit" value="作成">
        </form>
        </li>
    </ul>
</body>
</html>