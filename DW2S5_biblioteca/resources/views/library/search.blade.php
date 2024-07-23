@extends('layouts.main')
@section('title', 'Busca')

@section('content')

<div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center search-black">
    <div class="d-flex justify-content-center">
        <div class="text-center">
            <form class="form-signup" id="contactForm" action="{{ route('book.search') }}" method="GET">
                <div class="row input-group mb-3">
                    <div class="col">
                        <input class="form-control" id="search" type="text" placeholder="Nome do livro" name="search" />
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" id="submitButton" type="submit">Buscar Livro</button>
                    </div>
                </div>
            </form>

            @if($search)
                <h2 style="margin: 32px;">Buscando por: "{{ $search }}"</h2>
            @endif

            @if(count($books) > 0)
                <div id="cards-container" class="row">
                    @foreach($books as $book)
                        <div class="card col-md-3 mb-4 d-flex flex-column" id="card">
                            <img src="/img/books/{{ $book->image }}" class="card-img-top" alt="{{ $book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">Autor: {{ $book->author }}</p>
                                <a href="/book/{{ $book->id }}" class="btn btn-primary">Ver info</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Não foi possível encontrar nenhum livro com "{{ $search }}".</p>
            @endif

        </div>
    </div>
</div>

@endsection