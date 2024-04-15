@extends('layouts.app')
@section('content')

{{-- <div>@foreach ($operators as $operator)
        <h2>{{$operator ->name}}</h2>
        @if ($operator->specializations->isNotEmpty())
                            <p>Specializzazioni:</p>
        @foreach ($operator->specializations as $specialization)
        <p>{{ $specialization->name }}</p>
        @endforeach
        @endif
     @endforeach
</div> --}}

{{-- <div class="containerHome" >
    @foreach ($operators as $operator)
        @if ($operator->sponsorships->some(function ($sponsorship) {
            return now()->gte($sponsorship->operatorSponsorship->start_date) && now()->lt($sponsorship->operatorSponsorship->end_date);
        }))
            <h2>{{ $operator->name }}</h2>

            @if ($operator->specializations->isNotEmpty())
                <p>Specializzazioni:</p>
                @foreach ($operator->specializations as $specialization)
                    <p>{{ $specialization->name }}</p>
                @endforeach
            @endif
        @endif
    @endforeach
</div> --}}
