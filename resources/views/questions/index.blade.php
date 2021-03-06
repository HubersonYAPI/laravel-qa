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
                        <h2>Toutes les Questions </h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Poser une question</a>
                        </div>                        
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong> {{ str::plural('vote', $question->votes) }}
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers_count }}</strong> {{ str::plural('answer', $question->answers_count) }}
                                </div>
                                <div class="view">
                                    {{ $question->views ." ". str::plural('view', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                    {{-- <h3 class="mt-O"><a href="{{ route('questions.show', $question->id)}} ">{{ $question->title }}</a></h3> --}}
                                    <div class="ml-auto">
                                        @if (Auth::user()->can('update-question', $question))    
                                        <a href="{{ route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info">Editer</a>
                                        @endif

                                        @if (Auth::user()->can('delete-question', $question)) 
                                        <form class="form-delete" action="{{ route('questions.destroy', $question->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Voulez vous vraiment supprimer?')">Supprimer</button>
                                        </form>
                                        @endif
                                    </div>
                                </div> 
                                <p class="lead">
                                    Pos??e par
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ Str::limit($question->body, 250) }}
                                {{-- {{ $question->body, 250 }} --}}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
