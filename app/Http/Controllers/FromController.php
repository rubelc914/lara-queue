<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Jobs\SendMaliJob;
use App\Jobs\SendOtpJob;
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

        for($i=0; $i<50; $i++){

            dispatch(new SendMaliJob((object)$test));

        }

        return redirect('/create')->with('success', 'Form submitted successfully!');
    }
    //send otp for performance
    public function sendOtp(){
        dispatch(new SendOtpJob())->onQueue('high');
        return redirect('/create')->with('success', 'Send OTP! check mail');
    }
}
