<div>
    <h1>Título: {{ $post->title }}</h1>
    <p>Categoría: {{ $post->category->title }}</p>
    <p>Slug: {{ $post->slug }}</p>
    <p>Descripción: {{ $post->description }}</p>
    <p>Contenido: {{ $post->content }}</p>
    <p>Posteado: {{ $post->posted }}</p>
    <p>Creado: {{ $post->created_at }}</p>
</div>