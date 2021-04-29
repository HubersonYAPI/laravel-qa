@extends('layouts.app')
@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Modifier la Question </h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Retour aux Questions</a>
                        </div>                        
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.update', $question->id) }}" method="post">
                        {{ method_field('PUT') }}
                        @include("questions._form", ['buttonText' => "Modifier la question"])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
