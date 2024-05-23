<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\SearchRequest;

use App\Models\Property;
use App\Services\Front\SearchService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(SearchRequest $request): view|RedirectResponse
    {
        $search = new SearchService($request->validated());

        try {
            $query = $search->propertySearch();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return view('front.results')->with('properties', $query);
    }


    public function show(Property $property):view
    {
        return view('front.show', ['property' => $property]);
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
