<?php

namespace App\Http\Controllers;

use App\Models\WebSite;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webSites = WebSite::latest()->paginate(5);

        return view('web-sites.index', compact('webSites'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web-sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'title' => 'required'
        ]);

        $request['user_id'] = auth()->id();

        WebSite::create($request->all());

        return redirect()->route('websites.index')
            ->with('success', 'WebSite created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebSite  $webSite
     * @return \Illuminate\Http\Response
     */
    public function show(WebSite $webSite)
    {
        return view('web-sites.show', compact('website'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebSite  $website
     * @return \Illuminate\Http\Response
     */
    public function edit(WebSite $website)
    {
        return view('web-sites.edit', compact('website'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebSite  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebSite $website)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'title' => 'required'
        ]);

        $website->update($request->all());

        return redirect()->route('websites.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebSite  $webSite
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebSite $webSite)
    {
        $webSite->delete();

        return redirect()->route('web-sites.index')
            ->with('success', 'WebSite deleted successfully');
    }
}
