<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        h3 {
            color: #555;
            margin-top: 0;
        }

        .elseform {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .create-log {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .create-log:hover {
            background-color: #45a049;
        }

        div>div {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            max-width: 500px;
        }

        p {
            font-size: 16px;
            color: #444;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            form,
            div>div {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    {{-- @auth --}}
    <br>

    <br>

    <p>Congrat you are Logged In</p>
    <h1>Blog Post</h1>

    <form class="elseform" action="/create_post" method="POST">
        @csrf
        <input type="text" name="title">
        <textarea name="body"></textarea>
        <button class="create-log">Create</button>
    </form>

    <div>
        <div>
            @foreach($posts as $post)
                <h1>{{$post['title']}} by {{$post->owner->name}}</h1>
                <h3>{{$post['body']}}</h3>
                <a href="edit-post/{{$post->id}}">Edit</a>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>
            @endforeach
        </div>
    </div>


    <form action="/logout" class="elseform" method="POST">
        @csrf
        <button class="create-log">Log Out</button>
    </form>

    {{-- @else
    {{-- <div>
        <form action="/register" method="POST">
            @csrf
            <p>Register</p>
            <input type="text" placeholder="Input name" name="name"><br>
            <input type="text" name="email" placeholder="Enter email"><br>
            <input type="text" name="password" placeholder="Enter password">
            <button>Register</button><br><br>
        </form>
    </div> --}}
    {{-- <div>
        <form action="/login" method="POST">
            @csrf
            <p>Login</p>
            <input type="text" name="loginname" placeholder="Enter Name">
            <input type="text" name="loginpassword" placeholder="Enter password">
            <button>Login</button>
        </form>
    </div> --}}
    {{-- @endauth --}}
</body>

</html>