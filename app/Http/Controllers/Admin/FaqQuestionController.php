<?php

namespace App\Http\Controllers\Admin;

use App\Models\FaqQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqQuestionController extends Controller
{

    public function getDataTable(){
        $faqQuestions = FaqQuestion::all();
        return datatables()->of($faqQuestions)
        ->addIndexColumn()
            ->addColumn('action', function ($faqQuestion) {
                return view('admin.faq-questions.datatables.action', compact('faqQuestion'));
            })
            ->addColumn('created_at', function ($faqQuestion) {
                return $faqQuestion->created_at->format('Y-m-d H:i:s');
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function index()
    {
        return view('admin.faq-questions.index');
    }




    public function destroy(FaqQuestion $faqQuestion)
    {
        //delete faq question
        $faqQuestion->delete();
        return redirect()->route('admin.faq-questions.index')->with('success', 'FAQ question deleted successfully.');
    }
}
