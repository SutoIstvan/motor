<?php

namespace App\Http\Controllers;

use App\Models\Felvasarlas;
use Illuminate\Http\Request;

class FelvasarlasController extends Controller
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
    public function show(Felvasarlas $felvasarlas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Felvasarlas $felvasarlas)
    {
        $felvasarlas = Felvasarlas::find(1);

        return view('admin.felvasarlas.edit' , compact('felvasarlas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Felvasarlas $felvasarlas)
    {
        $request->validate([
            'name' => 'string',
            'title' => 'string',
            'content1' => 'required|string',
            'content2' => 'required|string',
            'content3' => 'required|string',

        ]);

            $felvasarlas->update([
                'name' => $request->input('name'),
                'title' => $request->input('title'),
                'content1' => $request->input('content1'),
                'content2' => $request->input('content2'),
                'content3' => $request->input('content3'),
            ]);

            return redirect()->route('admin.felvasarlas.edit')->with('success', 'A frissítése sikeresen megtörtént.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Felvasarlas $felvasarlas)
    {
        //
    }
}
