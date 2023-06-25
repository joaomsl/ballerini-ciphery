<?php

namespace App\Http\Controllers;

use App\Extra\Theme;
use App\Http\Requests\ChangeThemeRequest;

class AppController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * @param ChangeThemeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeTheme(ChangeThemeRequest $request)
    {
        Theme::storeClass($request->theme_class);
        return response()->json(['message' => 'Theme saved.']);
    }

}
