@extends('layout')
@section('content')
    <div class="content">
        <div class="card mx-auto" style="width: 18rem;">
            <img src="{{ $pokemon->sprites->front_default }}" alt="front default" width=96 height=96 />
            <div class="card-body">
                <h3 class="card-title">{{ ucfirst($pokemon->name) }}</h3>
                <p class="card-text">Height: {{ $pokemon->height / 10 }} m</p>
                <p class="card-text">Weight: {{ $pokemon->weight / 10 }} kg</p>
                <p class="card-text">Abilities:
                    <ul>
                    @foreach ($pokemon->abilities as $ability)
                        <li>{{ $ability->ability->name }}</li>
                    @endforeach
                    </ul>
                </p>
            </div>
        </div>
    </div>
@endsection