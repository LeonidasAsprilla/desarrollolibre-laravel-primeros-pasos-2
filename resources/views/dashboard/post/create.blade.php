<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crear Post</title>
</head>
<body>
  <h1>Crear Post</h1>

  <form action="{{ route('post.store') }}" method="POST">
    @csrf

    <label for="title">Título</label>
    <input type="text" name="title">

    <label for="slug">Slug</label>
    <input type="text" name="slug">

    <label for="category_id">Categoría</label>
    <select name="category_id">
      <option value=""></option>
      {{-- @foreach ($categories as $c)
        <option value="{{ $c->id }}">{{ $c->title }}</option>          
      @endforeach --}}
      @foreach ($categories as $title => $id)
        <option value="{{ $id }}">{{ $title }}</option>          
      @endforeach
    </select>

    <label for="posted">Posteado</label>
    <select name="posted">
      <option value="yes">Si</option>
      <option value="not" selected>No</option>
    </select>
    
    <label for="content">Contenido</label>
    <textarea name="content"></textarea>
    
    <label for="description">Descripción</label>
    <textarea name="description"></textarea>

    <button type="submit">Enviar</button>
  </form>

</body>
</html>