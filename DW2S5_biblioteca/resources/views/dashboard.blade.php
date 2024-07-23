@extends('layouts.main')

@section('content')
<div class="masthead">
<div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
<h1 style="font-size: 36px;">Você será redirecionado automaticamente para outra página.</h1>


<script>
    // Redireciona após 3 segundos
    setTimeout(function() {
        window.location.href = "{{ url('/') }}";
    }, 3000);
</script>
</div></div>
@endsection