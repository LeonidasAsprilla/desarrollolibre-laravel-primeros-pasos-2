@extends('dashboard.layout')

@section('content')

  <h1>Ver Post: {{ $post->title }}</h1>

  <p>Posteado: {{ $post->posted }}</p>  

  <p>Descripción: {{ $post->description }}</p>  

  <div>Contenido: {{ $post->content }}</div>

@endsection