@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h2>Nuovo Operatore</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <div class="row">
        <form action="{{ route('admin.operators.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="mb-3 row">
                <div class="col">
                    <label for="name" class="form-label">Inserisci Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="phone" class="form-label">Inserisci Recapito telefonico</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="file_upload" class="form-label">Inserisci Immagine</label>
                <input type="file" class="form-control @error('file_upload') is-invalid @enderror" id="file_upload" name="file_upload"
                    value="{{ old('file_upload') }}">
                @error('file_upload')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="address" class="form-label">Inserisci Indirizzo</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    value="{{ old('address') }}">
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Inserisci Descrizione</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Seleziona una o più specializzazioni</label>
                <div class="row">
                    @foreach ($specializzations as $index => $specialization)
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="specializations[]" id="specialization_{{ $specialization->id }}" value="{{ $specialization->id }}">
                                <label class="form-check-label" for="specialization_{{ $specialization->id }}">
                                    {{ $specialization->name }}
                                </label>
                            </div>
                        </div>
                        @if (($index + 1) % 5 == 0)
                            </div><div class="row">
                        @endif
                    @endforeach
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="col">
                    <label for="engagement_price" class="form-label">Inserisci prezzo dell'ingaggio</label>
                    <input type="decimal" class="form-control @error('engagement_price') is-invalid @enderror" id="engagement_price" name="engagement_price"
                        value="{{ old('engagement_price') }}">
                    @error('engagement_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="foundation_year" class="form-label">Inserisci data di nascita</label>
                    <input type="date" class="form-control @error('foundation_year') is-invalid @enderror" id="foundation_year"
                        name="foundation_year" value="{{ old('foundation_year') }}">
                    @error('foundation_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Inserisci</button>
        </form>
    </div>
</div>
@endsection



{{-- ID
 nome
 PK
 VARCHAR (20)
 Prezzo Ingaggio DECIMAL
 DESCRIZIONE VARCHAR 
TELEFONO
 IMMAGINE
 VARCHAR (50)
 (255)
 VARCHAR (20)
 VARCHAR
 INDIRIZZO 
VARCHAR (50)
 Data di nascita Date --}}