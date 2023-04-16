<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Quiz_section;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        $quizSection = Quiz_section::all();
        return view('quiz.index' , compact('quizSection'));
    }
    public function showQuestion($id)
    {
        $quizzes = Quiz::where('quiz_section_id', $id)->get();
        return view('quiz.show', compact('quizzes'));
    }
}
