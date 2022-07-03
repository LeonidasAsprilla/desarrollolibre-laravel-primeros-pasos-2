@extends('dashboard.layout')

@section('content')

  <h1>Ver Categoría: {{ $category->title }}</h1>

  <p>Slug: {{ $category->slug }}</p>  

  <p>Creado: {{ $category->created_at}}</p>

  <p>Modificado: {{ $category->updated_at}}</p>

@endsection