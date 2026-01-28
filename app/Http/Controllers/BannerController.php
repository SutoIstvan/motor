<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $banner = Banner::first();

        return view('admin.banner.edit', compact('banner'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $banner = Banner::first() ?? Banner::create([
            'is_active' => true,
        ]);

        $mainImage = $request->file('image');

        // удаляем старый файл, если был
        if ($banner->image_path && file_exists(public_path($banner->image_path))) {
            unlink(public_path($banner->image_path));
        }

        // === ТВОЙ СТИЛЬ ===
        $filename = uniqid('banner_') . '.' . $mainImage->getClientOriginalExtension();
        $mainImage->move(public_path('storage/banner'), $filename);
        $mainImagePath = '/storage/banner/' . $filename;

        $banner->update([
            'image_path' => $mainImagePath,
            'is_active' => true,
        ]);

        return back();
    }

    public function destroy()
    {
        $banner = Banner::first();

        if ($banner) {
            if ($banner->image_path && file_exists(public_path($banner->image_path))) {
                unlink(public_path($banner->image_path));
            }

            $banner->update([
                'image_path' => null,
                'is_active' => false,
            ]);
        }

        return back();
    }
}
