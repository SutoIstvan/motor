<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        $about = About::find(1);

        return view('admin.about.edit' , compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        //dd($request);
        $request->validate([
            'title' => 'string',
            'content1' => 'required|string',
            'content2' => 'required|string',
            'content3' => 'required|string',

        ]);

            $about->update([
                'title' => $request->input('title'),
                'content1' => $request->input('content1'),
                'content2' => $request->input('content2'),
                'content3' => $request->input('content3'),
            ]);

            return redirect()->route('admin.about.edit')->with('success', 'A frissítése sikeresen megtörtént.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
