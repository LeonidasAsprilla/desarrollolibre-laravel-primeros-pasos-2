@extends('dashboard.layout')

@section('content')
  <h1>Editar Categoría: {{ $category->title }}</h1>

  @include('dashboard.fragment._errors-form')

  <form action="{{ route('category.update', $category) }}" method="POST">
    @method('PATCH')
    @include('dashboard.category._form')
  </form>
@endsection