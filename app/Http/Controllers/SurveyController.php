<?php

namespace App\Http\Controllers;

use App\Events\SurveyRespond;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\Questionnaire;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Questionnaire $questionnaire)
    {
        $data = $this->validateRequest();

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        event(new SurveyRespond($survey));

        return redirect('/thankyou');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }

    public function finishSurvey()
    {
        return view('thankyou');
    }

    /**
     * Request validate
     *
     * @return void
     */
    private function validateRequest()
    {
        return request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);
    }
}
