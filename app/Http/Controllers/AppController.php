<?php

namespace App\Http\Controllers;

use App\Extra\Theme;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AppController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }

    public function theme(Request $request)
    {
        $request->validate([
            'theme' => Rule::in(Theme::SUPPORTED_THEMES)
        ]);

        Theme::store($request->theme);

        return response()->json(['message' => 'Theme saved.']);
    }

}
