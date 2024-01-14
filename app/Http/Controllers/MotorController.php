<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $motors = Motor::paginate($perPage);

        return view('admin.motor.index' , compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.motor.create', compact('brands' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        $price = $request->input('price');
        $cleanedPrice = str_replace(' ', '', $price);
        $request->merge(['price' => $cleanedPrice]);

        $discountPrice = $request->input('discount_price');

        if (!empty($discountPrice)) {
            $cleanedDiscountPrice = str_replace(' ', '', $discountPrice);
            $request->merge(['discount_price' => $cleanedDiscountPrice]);
        } else {
            $request->merge(['discount_price' => null]);
        }

        $km = $request->input('km');
        $cleanedkm = str_replace(' ', '', $km);
        $request->merge(['km' => $cleanedkm]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'price' => 'required|numeric|min:3|max:50000000',
            'discount_price' => 'nullable|numeric|min:0|max:50000000',
            'description' => 'required|min:3|max:55000',
            'short_description' => 'required|min:3|max:250',
            'cylinders' => 'required|numeric|min:1|max:250000',
            'cylinders_cm3' => 'required|numeric|min:1|max:250000',
            'year' => 'required|date_format:Y|after:1899|before:2101|min:1|max:250',
            'km' => 'required|numeric|min:1|max:2500000',
            'performance' => 'required|min:1|max:250',
            'condition' => 'required|min:1|max:250',
            'top' => 'nullable|min:1|max:250',
            'driver_license' => 'nullable|min:1|max:250',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable|max:9999',
            'video' => 'nullable|min:0|max:250',
            'images_id' => 'nullable|min:1|max:250',
            'category' => 'required|min:0|max:250',
            'brand' => 'required|min:0|max:250',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mainImage = $request->file('main_image');

        // Проверка наличия файла
        if ($mainImage) {

            $filename = uniqid('main_image_') . '.' . $mainImage->getClientOriginalExtension();

            $mainImage->move(public_path('storage/motors'), $filename);

            $mainImagePath = 'storage/motors/' . $filename;

        } else {
            $mainImagePath = 'default.png';
        }

        $motor = Motor::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'discount_price' => $request->input('discount_price'),
            'description' => $request->input('description'),
            'short_description' => $request->input('short_description'),
            'cylinders' => $request->input('cylinders'),
            'cylinders_cm3' => $request->input('cylinders_cm3'),
            'year' => $request->input('year'),
            'km' => $request->input('km'),
            'performance' => $request->input('performance'),
            'condition' => $request->input('condition'),
            'top' => $request->input('top') == 'on' ? 1 : 0,
            'driver_license' => $request->input('driver_license') == 'yes' ? 1 : 0,
            'main_image' => $mainImagePath,
            'video' => $request->input('video'),
            'images_id' => $request->input('images_id'),
            'category_id' => $request->input('category'),
            'brand_id' => $request->input('brand'),
        ]);

        // motor images upload

        $images = $request->file('images_id');
        $motorId = $motor->id;

        //dd($images);
        // if ($images) {
        //     $motor->update(['images_id' => $motorId]);

        //     foreach ($images as $image) {

        //         $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();

        //         $image->move(public_path('storage/motors'), $filename);

        //         $motor->images()->create([
        //             'url' => 'storage/motors/' . $filename,
        //         ]);
        //     }
        // }

        if ($images) {
            // Получаем идентификатор созданного мотоцикла
            $motorId = $motor->id;

            // Создаем папку для картинок с использованием идентификатора мотоцикла
            $folderPath = public_path('storage/motors/' . $motorId);

            // Проверяем, существует ли папка, и если нет, создаем ее
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            // Обновляем поле images_id этим идентификатором
            $motor->update(['images_id' => $motorId]);

            foreach ($images as $image) {
                $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();

                $image->move($folderPath, $filename);

                $motor->images()->create([
                    'url' => 'storage/motors/' . $motorId . '/' . $filename,
                ]);
            }
        }

        return redirect()->route('admin.motor.index')->with('success', 'A motor sikeresen hozzáadva.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Motor $motor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motor $motor)
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.motor.edit', compact('motor', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motor $motor)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'price' => 'required|numeric|min:3|max:50000000',
            'discount_price' => 'nullable|numeric|min:0|max:50000000',
            'description' => 'required|min:3|max:55000',
            'short_description' => 'required|min:3|max:250',
            'cylinders' => 'required|numeric|min:1|max:250000',
            'cylinders_cm3' => 'required|numeric|min:1|max:250000',
            'year' => 'required|date_format:Y|after:1899|before:2101|min:1|max:250',
            'km' => 'required|numeric|min:1|max:2500000',
            'performance' => 'required|min:1|max:250',
            'condition' => 'required|min:1|max:250',
            'top' => 'nullable|min:1|max:250',
            'driver_license' => 'nullable|min:1|max:250',
            'main_image' => 'image|mimes:jpeg,png,jpg|nullable|max:9999',
            'video' => 'nullable|min:0|max:250',
            'images_id' => 'nullable|min:1|max:250',
            'category' => 'required|min:0|max:250',
            'brand' => 'required|min:0|max:250',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $topValue = $request->input('top') == 'on' ? 1 : 0;
        $driver_yes = $request->input('driver_license') == 'yes' ? 1 : 0;

        $validatedData = $validator->validated();


        $motor->name = $validatedData['name'];
        $motor->price = $validatedData['price'];
        $motor->discount_price = $validatedData['discount_price'];
        $motor->description = $validatedData['description'];
        $motor->short_description = $validatedData['short_description'];
        $motor->cylinders = $validatedData['cylinders'];
        $motor->cylinders_cm3 = $validatedData['cylinders_cm3'];
        $motor->year = $validatedData['year'];
        $motor->km = $validatedData['km'];
        $motor->performance = $validatedData['performance'];
        $motor->condition = $validatedData['condition'];
        $motor->top = $topValue;
        $motor->driver_license = $driver_yes;
        $motor->video = $validatedData['video'];
        $motor->category_id = $validatedData['category'];
        $motor->brand_id = $validatedData['brand'];

        if ($request->hasFile('main_image')) {
            if ($motor->main_image && Storage::exists($motor->main_image)) {
                Storage::delete($motor->main_image);
            }

            $mainImage = $request->file('main_image');
            $filename = uniqid('main_image_') . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->move(public_path('storage/motors'), $filename);
            $motor->main_image = 'storage/motors/' . $filename;
        }

        $newImages = $request->file('images_id');
        $motorId = $motor->id;

        if ($newImages) {
            $folderPath = public_path('storage/motors/' . $motorId);

            // Удаление старых изображений
            $currentImages = $motor->images;

            foreach ($currentImages as $currentImage) {
                if (!in_array($currentImage->url, $newImages)) {
                    Storage::delete($currentImage->url);
                    $currentImage->delete();
                }
            }

            // Добавление новых изображений
            foreach ($newImages as $newImage) {
                $filename = uniqid('image_') . '.' . $newImage->getClientOriginalExtension();
                $newImage->move($folderPath, $filename);

                $motor->images()->create([
                    'url' => 'storage/motors/' . $motorId . '/' . $filename,
                ]);
            }
        }

        $motor->images_id = $motorId;

        $motor->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motor $motor)
    {
        // Storage::deleteDirectory('public/storage/motors/' . $motor->id);

        $directory = public_path('storage/motors/' . $motor->id);
        // $directory = 'public/storage/motors/' . $motor->id;
        if (Storage::exists($directory)) {
            // Выводим отладочное сообщение, чтобы убедиться в правильности пути
            info('Directory exists: ' . $directory);

            // Удаляем изображения и папку
            Storage::deleteDirectory($directory);
        } else {
            // Выводим отладочное сообщение, если папка не найдена
            info('Directory not found: ' . $directory);
        }

        $motor->images()->delete();

        $motor->delete();
        return redirect()->back()->with('success', 'Motor törölve');
    }

    // public function destroy(Motor $motor)
    // {
    //     // Вывод информации о директории перед удалением
    //     // $motorId = $motor->id;
    //     // $folderPath = public_path('storage\motors\\' . $motorId);
    //     // dd($folderPath);

    //     Storage::deleteDirectory('public\storage\motors\\' . $motor->id);


    //     // Удаляем изображения, связанные с мотоциклом
    //     $motor->images()->delete();

    //     // Удаляем сам мотоцикл
    //     $motor->delete();

    //     return redirect()->back()->with('success', 'Motor törölve');
    // }


}
