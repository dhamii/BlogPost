<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Congrat you are Logged In</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>
    
    <br>

    <br>


    <h1>Blog Post</h1>

    <form action="/create_post" method="POST">
        @csrf
        <input type="text" name="title">
        <textarea name="body"></textarea>
        <button>Create</button>
    </form>

    <div>
        <div>
            @foreach($posts as $post)
            <h1>{{$post['title']}}</h1>
            <h3>{{$post['body']}}</h3>
            @endforeach
        </div>
    </div>
    @else
    <div>
        <form action="/register" method="POST">
            @csrf
            <p>Register</p>
            <input type="text" placeholder="Input name" name="name"><br>
            <input type="text" name="email" placeholder="Enter email"><br>
            <input type="text" name="password" placeholder="Enter password">
            <button>Register</button><br><br>
        </form>
    </div>
    <div>
        <form action="/login" method="POST">
        @csrf
        <p>Login</p>
        <input type="text" name="loginname" placeholder="Enter Name">
        <input type="text" name="loginpassword" placeholder="Enter password">
        <button>Login</button>
        </form>
    </div>
    @endauth
</body>
</html>