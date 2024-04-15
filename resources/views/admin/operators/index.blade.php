@extends('layouts.admin')

@section('content')
<div id="container" class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h2>Elenco Operatori</h2>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
        @foreach ($operators as $operator)
        <div class="col">
            <div class="card">
                <div class="card-header">{{ $operator->name }}</div>
                <div class="card-body">
                    <p class="card-text">Telefono: {{ $operator->phone }}</p>
                    <p class="card-text">Indirizzo: {{ $operator->address }}</p>
                    <p class="card-text">Descrizione: {{ $operator->description }}</p>
                    <p class="card-text">Prezzo Ingaggio: {{ $operator->engagement_price }}</p>
                    <p class="card-text">Data di nascita: {{ $operator->foundation_year }}</p>
                    <p>Specialità :</p>
                    <div class="row">
                        @if ($operator->specializations->isNotEmpty())
                            @foreach ($operator->specializations as $specialization)
                                <div class="col">
                                    <p>{{ $specialization->name }}</p>
                                    <img class="img" src="../img/specializzazioni/{{ $specialization->background_image }}" alt="img">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
