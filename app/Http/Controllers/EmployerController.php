<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        return  view('employers.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Employer $employer)
    {
        //
    }

    public function edit(Employer $employer)
    {
        //
    }

    public function update(Request $request, Employer $employer)
    {
        //
    }

    public function destroy(Employer $employer)
    {
        //
    }
}
