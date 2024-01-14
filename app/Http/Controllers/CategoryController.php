<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $categories = Category::paginate($perPage);

        return view('admin.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category' => 'required|min:3|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Category::create([
                'name' => $request->input('category'),
            ]);

        } catch (QueryException $e) {
            // Обработка ошибки уникальности
            if ($e->errorInfo[1] == 1062) {
                // Запись уже существует
                return back()->withInput()->with('error', 'Már létezik azonos nevű kivitel.');
            }
        }

        $categories = Category::all();

        return redirect()->route('admin.category.index')->with('success', 'A kivitel sikeresen hozzáadva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        {
            $request->validate([
                'category' => 'required|string|max:50',
            ]);

            try {
                $category->update([
                    'name' => $request->input('category'),
                ]);

                return redirect()->route('admin.category.index')->with('success', 'A kivitel frissítése sikeresen megtörtént.');
            } catch (QueryException $e) {
                if ($e->errorInfo[1] == 1062) {
                    return redirect()->back()->withErrors(['error' => 'Már létezik azonos nevű kivitel.']);
                } else {
                    return redirect()->back()->withErrors(['error' => 'Hiba történt a kivitel frissítése közben.']);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Kivitel törölve');
    }
}
