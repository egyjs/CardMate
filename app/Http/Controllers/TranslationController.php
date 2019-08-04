<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TranslationController
{
    /**
     * Locale switcher
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function switchLocale(Request $request)
    {

        if (!empty($request->userLocale)) {
            Session::put('locale', $request->userLocale);
        }
        return redirect($request->header("referer"));
    }

}