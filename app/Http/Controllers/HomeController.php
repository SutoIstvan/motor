<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\Help;
use App\Models\Index;
use App\Models\Menu;
use App\Models\Motor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $brands = Brand::all();
        $categories = Category::all();
        $index = Index::find(1);
        $topmotors = Motor::where('top', 1)->latest()->take(3)->get();

        return view('index', compact('menus', 'brands', 'categories', 'index', 'topmotors'));
    }

    public function motors(Request $request)
    {
        $euro = 0.00244;

        $orderBy = $request->input('orderBy', 'desc');
        $motors = Motor::orderBy('created_at', $orderBy)->paginate(6);

        //$motors = Motor::latest()->paginate(6);

        // $orderDir = $request->input('orderDir', 'asc');
        // $motors = Motor::orderBy('price', $orderDir)
        //                ->paginate(6);

        // $orderBy = $request->input('orderBy', 'desc');
        // $orderDir = $request->input('orderDir', 'desc');

        // $motorsQuery = Motor::query();

        // if ($orderBy == 'price') {
        //     $motorsQuery->orderBy('price', $orderDir);
        // } else {
        //     $motorsQuery->orderBy('created_at', $orderBy);
        // }

        // $motors = $motorsQuery->paginate(6);


        $menus = Menu::all();
        $brands = Brand::all();
        $categories = Category::all();
        $selectedCategories = [];
        $selectedBrands =  [];

        return view('motors', compact('motors', 'menus', 'euro', 'brands', 'categories', 'selectedCategories', 'selectedBrands'));
    }

    public function show(Motor $motor)
    {

        $response = Http::get('http://api.napiarfolyam.hu/?bank=mnb&valuta=eur');

        if ($response->successful()) {
            $xml = new SimpleXMLElement($response->body());
            $currencyRate = (float)$xml->deviza->item[0]->kozep;
            $euro = $currencyRate / 0.92;
        } else {
            $euro = 368.1200;
        }

        $contacts = Contacts::find(1);
        $menus = Menu::all();
        $motor = Motor::find($motor->id);

        return view('show', compact('motor', 'menus', 'euro', 'contacts'));
    }

    public function search(Request $request)
    {
        //dd($request);

        $selectedCategories = $request->input('categories', []);
        $selectedBrands = $request->input('brands', []);

        //$motors = Motor::whereIn('category_id', $selectedCategories)->get();

        $motors = Motor::whereIn('category_id', $selectedCategories)
            ->orWhereIn('brand_id', $selectedBrands)
            ->paginate(6);

        $brands = Brand::all();
        $categories = Category::all();
        $menus = Menu::all();
        $euro = 0.00244;

        return view('motors', compact('motors', 'menus', 'euro', 'brands', 'categories', 'selectedCategories', 'selectedBrands'));
    }

    public function adminindex()
    {
        //return view('admin.index');

        return redirect()->route('admin.motor.index');
    }

    public function about()
    {
        $menus = Menu::all();

        $about = About::find(1);

        return view('about', compact('menus', 'about'));
    }

    public function help()
    {
        $menus = Menu::all();

        $helps = Help::all();

        return view('help', compact('menus', 'helps'));
    }

    public function contacts()
    {
        $menus = Menu::all();

        $contacts = Contacts::find(1);

        return view('contacts', compact('menus', 'contacts'));
    }

    public function buying()
    {
        $menus = Menu::all();

        $helps = Help::all();

        return view('buying', compact('menus', 'helps'));
    }
}
