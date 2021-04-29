<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AskQuestionRequest;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);

        return view('questions.index', compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();

        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title','body'));


        return redirect()->route('questions.index')->with('success',"Votre question a bien été ajoutée ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $this->id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        if (Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        }
        return view("questions.edit", compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        if (Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        }
        $question->update($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success',"Votre question a bien été modifiée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if (Gate::denies('update-question', $question)) {
            abort(403, "Access denied");
        }
        $question->delete();

        return redirect()->route('questions.index')->with('success',"Votre question a bien été Supprimer");
    }
}
