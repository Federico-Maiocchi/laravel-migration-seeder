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
                                <p class="m-0">Il treno è in ritardo</p>   
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
@endsection