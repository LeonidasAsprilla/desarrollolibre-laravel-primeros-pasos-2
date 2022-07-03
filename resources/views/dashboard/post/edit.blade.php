@extends('dashboard.layout')

@section('content')
  <h1>Editar Post: {{ $post->title }}</h1>

  @include('dashboard.fragment._errors-form')

  <form action="{{ route('post.update', $post) }}" method="POST">
    @method('PATCH')
    @include('dashboard.post._form')
  </form>
@endsection