@foreach ($users as $user)
    <p>{{$user->name}} -- {{$user->email}}</p>
    <form action="{{route('admin.deleteuser', ['id'=>$user->id])}}" method="POST">
        @method('DELETE')
        @csrf
        <button>
            Delete User
        </button>
    </form>
@endforeach
<hr>
@foreach($posts as $post)

<p>{{$post->body}}</p>
<form action="{{route('admin.deletepost', ['id'=>$post->id])}}" method="POST">
        @method('DELETE')
        @csrf
        <button>
            Delete Post
        </button>
    </form>
@endforeach
@if (session('result'))
    {{session('result')}}
@endif



<form action="{{route('admin.logout.post')}}" method="POST">
    @csrf
    <button>Logout</button>
</form>