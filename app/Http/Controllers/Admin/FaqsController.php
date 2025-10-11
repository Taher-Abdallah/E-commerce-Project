<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;

class FaqsController extends Controller
{

    public function index()
    {
        $faqs=Faq::latest()->paginate(10);
        return view('admin.faqs.index',compact('faqs'));
    }


    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(FaqRequest $request)
    {
        Faq::create($request->validated());
        return redirect()->route('admin.faqs.index');
    }

    public function edit(string $id)
    {
        $faq=Faq::findOrFail($id);
        return view('admin.faqs.edit',compact('faq'));
    }


    public function update(FaqRequest $request, string $id)
    {
        $faq=Faq::findOrFail($id);
        $faq->update($request->validated());
        return redirect()->route('admin.faqs.index');
    }

    public function destroy(string $id)
    {
        $faq=Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('admin.faqs.index');
    }
}
