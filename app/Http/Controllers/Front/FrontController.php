<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(): view
    {
        return view('front.index');
    }

    public function create():void
    {
    }

    public function store(Request $request):void
    {
    }

    public function edit(Request $request):void
    {
        //edit logic here
    }

    public function update(Request $request):void
    {
        //update logic here
    }

    public function destroy(Request $request):void
    {
        //destroy logic here
    }
}
