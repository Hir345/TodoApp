<!doctype html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">        <title>Board</title>
    </head>
    <body>
        <h1>タスク一覧</h1>

        <table class="table">
            @foreach($items as $item)
                <tr>
                    <th><a href="/board/{{$item->getId()}}">{{$item->getName()}}</a></th>
                    <td>{{$item->getDl()}}まで</td>
                    <td><a href="/board/{{$item->getId()}}/edit">編集</a></td>
                    <td><a href="/board/{{$item->getId()}}/del">削除</a></td>
                </tr>
            @endforeach
            <tr><th><a href="/add">+</a></th></tr>
        </table>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    <footer>
        {{$user->name}}としてログイン中
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="ログアウト" class="btn btn-outline-primary btn-block">
        </form>
        
    </footer>
</html>