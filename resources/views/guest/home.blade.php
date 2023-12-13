@extends('layouts.app')

@section('content')
    <h1>Treni giornalieri</h1>
    <div class="container">
        <div class="row">
            @foreach ($trains as $train)
                <div class="col-4">
                    <ul>
                        <li>{{ $train->agency }}</li>
                        <li>{{ $train->departure_station }}</li>
                        <li>{{ $train->arrival_station }}</li>
                        <li>{{ $train->departure_time }}</li>
                        <li>{{ $train->arrival_time }}</li>
                        <li>{{ $train->train_code }}</li>
                        <li>{{ $train->number_of_carriages }}</li>
                        <li>
                            @if ($train->in_time === 1)
                                <p>Il treno è in orario</p>
                            @else
                                <p>Il treno è in ritardo</p>   
                            @endif
                        </li>
                        <li>
                            @if ($train->deleted === 1)
                                <p>disponibile</p>
                            @else
                                <p>cancellato</p>
                            @endif
                        </li>
                    </ul>
                </div>

                
                
            @endforeach
            
        </div>    
    </div>
    
    {{-- <div class="col-4">
        <h3>{{ $train->agency }}</h3>
        <p>{{ $train->departure_station }}</p>
        <p>{{ $train->arrival_station }}</p>
        <p>{{ $train->departure_time }}</p>
        <p>{{ $train->arrival_time }}</p>
        <p>{{ $train->train_code }}</p>
        <p>{{ $train->number_of_carriages }}</p>
        <p>{{ $train->in_time }}</p>
        <p>{{ $train->deleted }}</p>
    </div> --}}
@endsection