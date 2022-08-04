<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getApi()
    {
        return response()->json(
            [
                'Good morning' => 'おはよう',
                'Hello' => 'こんにちは',
            ]
        );
    }
}
