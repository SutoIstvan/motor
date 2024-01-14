<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $brands = Brand::paginate($perPage);

        return view('admin.brand.index' , compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required|min:3|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        try {
            Brand::create([
                'name' => $request->input('brand'),
            ]);

        } catch (QueryException $e) {
            // Обработка ошибки уникальности
            if ($e->errorInfo[1] == 1062) {
                // Запись уже существует
                return back()->withInput()->with('error', 'Már létezik azonos nevű márka.');
            }
        }

        $brands = Brand::all();

        return redirect()->route('admin.brand.index')->with('success', 'A márka sikeresen hozzáadva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand' => 'required|string|max:50',
        ]);

        try {
            $brand->update([
                'name' => $request->input('brand'),
            ]);

            return redirect()->route('admin.brand.index')->with('success', 'A márka frissítése sikeresen megtörtént.');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(['error' => 'Már létezik azonos nevű márka.']);
            } else {
                return redirect()->back()->withErrors(['error' => 'Hiba történt a márka frissítése közben.']);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back()->with('success', 'Marka törölve');
    }
}
