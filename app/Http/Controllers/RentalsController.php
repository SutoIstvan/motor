<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class RentalsController extends Controller
{
    public function index()
    {
        $menu = Menu::where('url', 'rentals')->first();
        return view('admin.rentals', compact('menu'));
    }

    public function updateVisibility(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // Update is_visible
        $menu->update(['is_visible' => $request->input('is_visible')]);

        return redirect()->route('admin.rentals')->with('success', 'Статус видимости обновлен');
    }

}
