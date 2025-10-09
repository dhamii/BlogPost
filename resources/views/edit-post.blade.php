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
            background-color: #f5f7fa;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        button {
            background-color: green;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #cfffc5;
        }

        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            input[type="text"],
            textarea {
                font-size: 15px;
            }

            button {
                width: 100%;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <form action="/edit-post/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value={{$post['title']}} />
        <textarea name="body">{{$post['body']}}</textarea>
        @if ($post->image)
            <img src="{{ asset('storage/'. $post->image) }}" alt="Post Image" style="max-width: 30%; height: 10%; margin-bottom: 15px; display:block;" />
        @endif
        <input type="file" name="image" value="{{ $post->image }}" accept="image/*" style="display: block; margin-bottom: 10px"/>
        <button>Save Changes</button>
    </form>
</body>
</html>