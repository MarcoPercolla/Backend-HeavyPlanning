@extends('layouts.admin')

@section('content')
<div id="container" class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h2>Dettagli Operatore</h2>
    </div>
    <div class="row row-cols-2 row-cols-md-2 g-4 py-4">
        <div class="col-3">
            <div class="card">
                @if (strlen($operator->file_path) > 0)
                    <img src="http://127.0.0.1:8000/storage/{{ $operator->file_path }}" alt="">
                @endif
                <div class="card-header">{{ $operator->name }}</div>
                <div class="card-body">
                    <p class="card-text">Telefono: {{ $operator->phone }}</p>
                    <p class="card-text">Indirizzo: {{ $operator->address }}</p>
                    <p class="card-text">Descrizione: {{ $operator->description }}</p>
                    <p class="card-text">Prezzo Ingaggio: {{ $operator->engagement_price }}</p>
                    <p class="card-text">Data di nascita: {{ $operator->foundation_year }}</p>
                    <p>Specialità :</p>
                    @if ($operator->specializations->isNotEmpty())
                        @foreach ($operator->specializations as $specialization)
                            <p>{{ $specialization->name }}</p>
                            <img class="img" src="../../img/specializzazioni/{{ $specialization->background_image }}" alt="img">
                        @endforeach
                    @endif
                    @if($add_sponsorship == false)
                        <p>Hai acquistato una sponsorizzazione di {{ $sponsorship[0]->duration }};</p>
                        <p>La tua sponsorizzazione scadrà il {{ $end_sponsorship[0]->end_date }}</p>
                    @endif
                    <div>
                        <a href="{{ route('admin.my-messages', $operator->id) }}">I miei messaggi</a>
                    </div>
                    <div>
                        <a href="{{ route('admin.my-reviews', $operator->id) }}">Le mie recensioni</a>
                    </div>
                    <div>
                        @if($add_sponsorship == true)
                            <a href="{{ route('admin.operator-sponsorship.create', $operator->id) }}">Aggiungi sponsorizzazione</a>
                        @else
                            <p>La tua sponsorizzazione terminerà il: {{ $end_sponsorship[0]->end_date }}</p>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('admin.my-statistics', $operator->id) }}">Statistiche</a>
                    </div>
                </div>
                <div class="card-footer">
                   
                    <a href="{{ route('admin.operators.edit', $operator->id) }}" class="btn btn-primary">Modifica</a>
                    
                    
                    <form action="{{ route('admin.operators.destroy', $operator->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
