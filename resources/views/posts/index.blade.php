@extends("layouts.app")

@section('title', 'Posts')

@section('content')
<h1>Posts</h1>

<ul>
    @foreach($posts as $post)
    <li>
        <a href="/posts/{{$post->id}}">
            {{$post->title}}
        </a>
        -
        <a href="{{route('user_posts', ['user' => $post->author->id] )}}">
            {{$post->author->name}}
        </a>
    </li>
    @endforeach
</ul>
@endsection