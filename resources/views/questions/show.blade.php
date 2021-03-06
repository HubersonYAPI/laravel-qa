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
                        <h2>Poser une Question </h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Retour aux Questions</a>
                        </div>                        
                    </div>
                </div>

                <div class="card-body">
                    {!! $question->body_html !!}
                    <div class="float-right">
                        <span class="text-muted">Answered {{ $question->created_date }}</span>
                        <div class="media mt-2">
                            <a href="{{ $question->user->url }}" class="pr-2">
                                <img src="{{ $question->user->avatar }}" alt="">
                            </a>
                            <div class="media-body">
                                <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2> {{ $question->answers_count ." ".str::plural('Reponse', $question->answers_count) }}</h2>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer )
                    <div class="media">
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
