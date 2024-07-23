@extends('layouts.main')
@section('title', 'Biblioteca')

@section('content')
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">Biblioteca</h1>
                <h2 class="msg text-white-50 mx-auto mt-2 mb-5">Forma milenar de armazenar conhecimento</h2>
                @if(session('msg'))
                    <p class="msg text-white-50 mx-auto mt-2 mb-5">{{ session('msg') }}</p>
                @endif
                <form class="form-signup" id="contactForm" action="{{ route('book.search') }}" method="GET">
                    <div class="row input-group mb-3">
                        <div class="col">
                            <input class="form-control" id="search" type="text" placeholder="Nome do livro"
                                name="search" />
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="submitButton" type="submit">Buscar Livro</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</header>

<!-- About-->
<section class="about-section text-center" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
                <p class="text-white-50">
                    Aplicação Laravel desenvolvida por Dorivaldo Marques da Silva Junior como parte da disciplina
                    Desenvolvimento Web 2 do curso de
                    Bacharelado em Sistemas de Informação do Instituto Federal de São Paulo, campus Votuporanga.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact-->
<section class="contact-section bg-black">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50"><a href="marques.dsjr@gmail.com">marques.dsjr@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fab fa-github text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Github</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50"><a
                                href="https://github.com/DMSJR/">https://github.com/DMSJR/</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection