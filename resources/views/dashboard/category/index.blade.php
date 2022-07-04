@extends('dashboard.layout')

@section('content')

  <a class="btn btn-success my-3" href="{{ route('category.create') }}">Crear</a>

  <table class="table mb-3">
    <thead>
      <tr>
        <th>Título</th>
        <th>Slug</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $c)
        <tr>
          <td>{{ $c->title }}</td> 
          <td>{{ $c->slug }}</td> 
          <td>
            <a class="btn btn-primary mt-1" href="{{ route('category.edit', $c) }}">Editar</a>
            <a class="btn btn-primary mt-1" href="{{ route('category.show', $c) }}">Ver</a>
            <form action="{{ route('category.destroy', $c) }}" method="post">
              @method("delete")
              @csrf
              <button class="btn btn-danger mt-1" type="submit">Eliminar</button>
            </form>
          </td> 
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $categories->links() }}

@endsection