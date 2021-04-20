<?php

namespace App\Http\Controllers;

use App\Models\WebSite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $request['body'] = '<div class="txt-red">Hello CCxC!</div>';
        $request['styles'] = '.txt-red{color: red}';

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebSite  $website
     * @return \Illuminate\Http\Response
     */
    public function editWeb(WebSite $website)
    {
        return view('web-sites.edit-web', compact('website'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebSite  $website
     * @return \Illuminate\Http\JsonResponse
     */
    public function editWebUpdate(WebSite $website)
    {
        $website->update([
            'body' => request()->get('data')['gjs-html'],
            'styles' => request()->get('data')['gjs-css'],
        ]);

        return response()->json(['success' => true], Response::HTTP_OK);
    }

    public function showWebsite($slug)
    {
        $website = WebSite::where('slug', '=', $slug)->firstOrFail();;

        return view('web-sites.show', compact('website'));
    }
}
