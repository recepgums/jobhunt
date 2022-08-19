<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = Faq::all();

        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $faq = Faq::create($request->all());

        return redirect()->route('admin.faq.show', 'faq');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function show(Faq $faq)
    {
        return view('admin.faq.show', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
       $faq->update($request->all());

        return redirect()->route('admin.faq.show', compact('faq'));
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->back();
    }
}
