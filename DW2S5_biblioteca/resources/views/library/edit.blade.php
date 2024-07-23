@extends('layouts.main')
@section('title', 'Editar livro')
@section('content')


<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <div id="event-create-container" class="col-md-6 offset-md-3">
                    <h1>Editar Livro</h1>
                    <form action="/book/update/{{ $book->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')  
                        <div class="form-group text-start mb-3">
                            <label for="image">Capa:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <img src="/img/books/{{ $book->image }}" alt="{{ $book->title }}" class="img-preview">
                        </div>
                        <div class="form-group text-start mb-3">
                            <label for="title">Título:</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Título" value="{{ $book->title }}">
                        </div>
                        <div class="form-group text-start mb-3">
                            <label for="author">Autor:</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Autor" value="{{ $book->author }}">
                        </div>
                        <div class="form-group text-start mb-3">
                            <label for="date">Data de publicação:</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{  $book->date->format('Y-m-d')  }}">
                        </div>
                        <div class="form-group text-start mb-3">
                            <label for="genre">Gênero literário:</label>
                            <input type="text" class="form-control" id="genre" name="genre" placeholder="Gênero" value="{{ $book->genre }}">
                        </div>
                        <input type="submit" class="btn btn-primary btn-cadastrar" value="Salvar alterações">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection