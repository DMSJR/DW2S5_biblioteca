@extends('layouts.main')
@section('title', 'Detalhes do Livro')
@section('content')

<section class="signup-section" id="signup" style="color:white">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <div id="event-create-container" class="col-md-6 offset-md-3">
                    <h1>{{ $book->title }}</h1>
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('img/books/' . $book->image) }}" class="img-fluid" alt="{{ $book->title }}">
                        </div>
                        <div class="col-6 text-start">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-user"></i> <strong>Autor:</strong> <br>{{ $book->author }}</li>
                                <li><i class="fas fa-calendar-alt"></i> <strong>Data de publicação:</strong><br> {{ \Carbon\Carbon::parse($book->date)->format('d/m/Y') }}</li>
                                <li><i class="fas fa-book"></i> <strong>Gênero literário:</strong> <br>{{ $book->genre }}</li>
                            </ul>
                            @auth
                            <a href="/book/edit/{{ $book->id }}" class="btn btn-info edit-btn">Editar</a>


                            <form action="/book/{{ $book->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
                            </form>
                            
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection