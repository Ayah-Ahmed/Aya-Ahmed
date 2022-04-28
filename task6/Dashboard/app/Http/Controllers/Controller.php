<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectAccordingToRequest($request, $message)
    {
        if ($request->has('redirect') && $request->redirect == 'index') {
            // return to_route('dashboard.products.index')->with('success', $message);


            //static => refers to child class
            return redirect()->action([static::class, 'index'])->with('success', $message);
        } else {
            return redirect()->back()->with('success', $message);
        }
    }
}