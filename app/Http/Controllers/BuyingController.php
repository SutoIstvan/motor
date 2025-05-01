<?php

namespace App\Http\Controllers;

use App\Models\Buying;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuyingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 25);
        $motors = Buying::orderBy('created_at', 'desc')->paginate($perPage);

        return view('admin.buying.index', compact('motors'));
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
    public function show(string $id)
    {
        //dd($id);
        $buying = Buying::find($id);

        return view('admin.buying.show', compact('buying'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Buying $buying)
    // {
    //     // $directory = public_path('storage/buy/' . $buying->id);
    //     $directory = 'buy/' . $buying->id;

    //     // $directory = 'public/storage/motors/' . $motor->id;
    //     if (Storage::exists($directory)) {
    //         // Выводим отладочное сообщение, чтобы убедиться в правильности пути
    //         info('Directory exists: ' . $directory);

    //         // Удаляем изображения и папку
    //         // Storage::deleteDirectory($directory);
    //         Storage::disk('public')->deleteDirectory($directory);
    //     } else {
    //         // Выводим отладочное сообщение, если папка не найдена
    //         info('Directory not found: ' . $directory);
    //     }
    //     $buying->delete();
    //     return redirect()->back()->with('success', 'Felvásárlás törölve');
    // }
    public function destroy(Buying $buying)
    {
        $directory = 'buy/' . $buying->id;

        if (Storage::disk('public')->exists($directory)) {
            info('Directory exists: ' . $directory);

            try {
                Storage::disk('public')->deleteDirectory($directory);
                info('Directory deleted: ' . $directory);
            } catch (\Exception $e) {
                info('Error deleting directory: ' . $e->getMessage());
            }
        } else {
            info('Directory not found: ' . $directory);
        }

        $buying->delete();

        return redirect()->back()->with('success', 'Felvásárlás törölve');
    }
}
