@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Dashboard</h1>

        <div class="row">
            @foreach ($buttons as $button)
                <div class="col-md-4 mb-3">
                    <a href="{{ $button->link ?? route('configure', $button->id) }}"
                       class="btn btn-lg btn-block text-white"
                       style="background-color: {{ $button->color ?? '#007bff' }};">
                        {{ $button->title ?? 'Configure' }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
