<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This are every ones post</h1>
    <div>
        @foreach ($posts as $post)
            <h2>{{$post->title}}</h2>
            <h4>{{$post->body}}</h4>
        @endforeach
    </div>
</body>
</html>