@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <h2>Modifica Operatore</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row">
        <form action="{{ route('admin.operators.update', $operator->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
            <div class="mb-3 row">
                <div class="col">
                    <label for="name" class="form-label">Inserisci Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $operator->name) }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="phone" class="form-label">Inserisci Recapito telefonico</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                        value="{{ old('phone', $operator->phone) }}">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                @if($operator->file_path == "")
                    <label for="file_upload" class="form-label">Inserisci Immagine</label>
                @else
                    <label for="file_upload" class="form-label">Modifica immagine</label>
                    <img id="preview" class="mb-3" src="http://127.0.0.1:8000/storage/{{ $operator->file_path }}" alt="">
                @endif
                <input type="file" class="form-control @error('file_upload') is-invalid @enderror" id="file_upload" name="file_upload"
                    value="{{ old('file_upload', $operator->file_upload) }}">
                @error('file_upload')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input type="checkbox" id="not_file" name="not_file">
                <label for="not_file">Nessuna immagine</label><br>
            </div>
            
            <div class="mb-3">
                <label for="address" class="form-label">Inserisci Indirizzo</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                    value="{{ old('address', $operator->address) }}">
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Inserisci Descrizione</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    value="{{ old('description', $operator->description) }}">
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
                                <input class="form-check-input" type="checkbox" name="specializations[]" id="specialization_{{ $specialization->id }}" value="{{ $specialization->id }}" {{ $operator->specializations->contains($specialization->id) ? 'checked' : '' }}>
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
                        value="{{ old('engagement_price', $operator->engagement_price) }}">
                    @error('engagement_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="foundation_year" class="form-label">Inserisci data di nascita</label>
                    <input type="date" class="form-control @error('foundation_year') is-invalid @enderror" id="foundation_year"
                        name="foundation_year" value="{{ old('foundation_year', $operator->foundation_year) }}">
                    @error('foundation_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </form>
    </div>
</div>
@endsection
