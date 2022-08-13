<?php

namespace App\Http\Controllers;

use App\Models\UserVerify;
use Illuminate\Http\Request;

class UserVerifyController extends Controller
{
    public function verify(Request $request)
    {
        $userVerify = UserVerify::where('code',$request->get('code'))->where('token',$request->get('token'))->firstOrFail();
    }
}
