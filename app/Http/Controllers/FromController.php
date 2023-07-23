<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Jobs\SendMaliJob;
use App\Mail\sendMail;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FromController extends Controller
{
    public function create(){
        return view('formView.index');
    }
    public function store(TestRequest $request)
    {
        $test = Test::create($request->validated());

       dispatch(new SendMaliJob((object)$test));

        return redirect('/create')->with('success', 'Form submitted successfully!');
    }
}
