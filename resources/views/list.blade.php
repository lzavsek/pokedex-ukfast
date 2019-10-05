@extends('layout')
@section('content')
            <div class="content">
                
                <div class="row">
                 
                @foreach ($pokemons->results as $pokemon)
                    @if ($loop->index % 4 == 0 && !$loop->first)
                    </div>
                    <div class="row">
                    @endif
                    @php
                        $number = explode('/', $pokemon->url)[6]
                    @endphp
                    @if ($number < 10000)
                        <div class="col">
                        <div class="card m-2">
                            <div class="card-body">
                              <h5 class="card-title">{{ ucfirst($pokemon->name) }}</h5>
                              <h6 class="card-subtitle mb-2 text-muted">#{{ $number }}</h6>
                              <a href="{{ url('/pokemon/') . '/' . $number }}" class="card-link">Details</a>
                            </div>
                          </div>
                        </div>
                    @endif
                @endforeach
                
                </div>
                
                @php
                    $next = $pokemons->next;
                    $pos = strpos($next, '?');
                    if ($pos > -1)
                        //$next = substr ($next, $pos + 8, strlen($next) - strpos($next, '&')-7);
                        $next = substr ($next, $pos + 8, -9);
                    
                    $prev = $pokemons->previous;
                    $pos = strpos($prev, '?');
                    if ($pos > -1)
                        $prev = substr ($prev, $pos + 8, -9);
                @endphp
                    
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $prev == null ? "disabled" : "" }}">
                          <a class="page-link" href="{{ url('/') . '/' . $prev}}" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item {{ $next > 800 ? "disabled" : "" }}">
                          <a class="page-link" href="{{ url('/') . '/' . $next}}">Next</a>
                        </li>
                    </ul>
                </nav>
    
    
            </div>
@endsection