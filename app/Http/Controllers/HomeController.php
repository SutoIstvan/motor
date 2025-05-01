<?php

namespace App\Http\Controllers;

use App\Filters\MotorFilter;
use App\Mail\NewBuyingOffer;
use App\Models\About;
use App\Models\Brand;
use App\Models\Buying;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\Help;
use App\Models\Index;
use App\Models\Menu;
use App\Models\Motor;
use App\Models\ExchangeRate;
use App\Models\Felvasarlas;
use App\Models\User;
use App\Models\Visits;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;



use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use SimpleXMLElement;

class HomeController extends Controller
{
    public function index()
    {
        $index = Index::find(1);

        $visit = Menu::find(1);
        $visit->visit()->withIp();

        $visits = Visits::find(1);
        $visits->visit()->withIp();

        $menus = Menu::all();
        $brands = Brand::all();
        $categories = Category::all();
        $index = Index::find(1);
        $topmotors = Motor::where('top', 1)->latest()->take(3)->get();

        return view('index', compact('menus', 'brands', 'categories', 'index', 'topmotors'));
    }

    // public function motors(MotorFilter $request)
    // {
    //     $euro = 0.00244;

    //     $motors = Motor::filter($request)->paginate(3);

    //     $menus = Menu::all();
    //     $brands = Brand::all();
    //     $categories = Category::all();
    //     $selectedCategories = [];
    //     $selectedBrands =  [];

    //     return view('motors', compact('motors', 'menus', 'euro', 'brands', 'categories', 'selectedCategories', 'selectedBrands'));
    // }

    public function motors(MotorFilter $request, Request $perPage)
    {
        $view = $perPage->input('view', 'grid');

        $query = Motor::filter($request);

        $order = $request->get('order');

        switch ($order) {
            case 'asc':
                $query->orderBy('price');
                break;
            case 'desc':
                $query->orderByDesc('price');
                break;
            case 'name_asc':
                $query->orderBy('name');
                break;
            case 'name_desc':
                $query->orderByDesc('name');
                break;
            case 'year_asc':
                $query->orderBy('year');
                break;
            case 'year_desc':
                $query->orderByDesc('year');
                break;
            case 'cylinders_cm3_asc':
                $query->orderBy('cylinders_cm3');
                break;
            case 'cylinders_cm3_desc':
                $query->orderByDesc('cylinders_cm3');
                break;
            default:
                $query->orderBy('updated_at', 'desc');
                break;
        }

        $perPage = $perPage->input('perPage', 24);

        $motors = $query->paginate($perPage);

        $menus = Menu::all();
        $brands = Brand::all();
        $categories = Category::all();

        $motorcount = Motor::count();

        $yearFrom = Motor::whereNotNull('year')->min('year');
        $yearTo = Motor::whereNotNull('year')->max('year');
        $cm3From = Motor::whereNotNull('cylinders_cm3')->min('cylinders_cm3');
        $cm3To = Motor::whereNotNull('cylinders_cm3')->max('cylinders_cm3');
        $priceFrom = Motor::whereNotNull('price')->min('price');
        $priceTo = Motor::whereNotNull('price')->max('price');

        $visit = Menu::find(2);
        $visit->visit()->withIp();

        $visits = Visits::find(1);
        $visits->visit()->withIp();

        return view('motors', compact('motors', 'menus', 'brands', 'categories', 'yearFrom', 'yearTo', 'cm3From', 'cm3To', 'priceFrom', 'priceTo', 'motorcount', 'view'));
    }



    // public function motors(Request $request)
    // {
    //     $euro = 0.00244;

    //     $orderBy = $request->input('orderBy', 'desc');
    //     $motors = Motor::orderBy('created_at', $orderBy)->paginate(6);

    //     //$motors = Motor::latest()->paginate(6);

    //     // $orderDir = $request->input('orderDir', 'asc');
    //     // $motors = Motor::orderBy('price', $orderDir)
    //     //                ->paginate(6);

    //     // $orderBy = $request->input('orderBy', 'desc');
    //     // $orderDir = $request->input('orderDir', 'desc');

    //     // $motorsQuery = Motor::query();

    //     // if ($orderBy == 'price') {
    //     //     $motorsQuery->orderBy('price', $orderDir);
    //     // } else {
    //     //     $motorsQuery->orderBy('created_at', $orderBy);
    //     // }

    //     // $motors = $motorsQuery->paginate(6);


    //     $menus = Menu::all();
    //     $brands = Brand::all();
    //     $categories = Category::all();
    //     $selectedCategories = [];
    //     $selectedBrands =  [];

    //     return view('motors', compact('motors', 'menus', 'euro', 'brands', 'categories', 'selectedCategories', 'selectedBrands'));
    // }

    public function show(Motor $motor)
    {
        $exchangeRate = ExchangeRate::find(1);
        $today = Carbon::today();

        $motor->visit()->withIp();

        $visits = Visits::find(1);
        $visits->visit()->withIp();

        if (!is_null($exchangeRate->manual_rate) && $exchangeRate->manual_rate > 0) {
            $euro = $exchangeRate->manual_rate / $exchangeRate->manual_divider;
        } else {
            if ($exchangeRate->updated_at->lt($today)) {
                // Если запись не обновлялась сегодня, получаем новый курс из API
                try {
                    $response = Http::get('http://api.napiarfolyam.hu/?bank=mnb&valuta=eur');

                    if ($response->successful()) {
                        $xml = new SimpleXMLElement($response->body());
                        $currencyRate = (float)$xml->deviza->item[0]->kozep;
                        $euro = $currencyRate;
                    } else {
                        // Если запрос неудачен, устанавливаем курс по умолчанию
                        $euro = $exchangeRate->currency;
                    }

                    // Обновляем запись в базе данных новым курсом
                    $exchangeRate->rate = $euro;
                    $exchangeRate->save();
                } catch (\Exception $e) {
                    // Если возникла ошибка при выполнении запроса, устанавливаем курс по умолчанию
                    $euro = $exchangeRate->currency;
                }

            }

            $euro = $exchangeRate->rate / $exchangeRate->manual_divider;
        }

        // $response = Http::get('http://api.napiarfolyam.hu/?bank=mnb&valuta=eur');

        // if ($response->successful()) {
        //     $xml = new SimpleXMLElement($response->body());
        //     $currencyRate = (float)$xml->deviza->item[0]->kozep;
        //     $euro = $currencyRate / 0.92;
        // } else {
        //     $euro = 368.1200;
        // }

        $contacts = Contacts::find(1);
        $menus = Menu::all();
        $motor = Motor::find($motor->id);

        $motor->images = $motor->images->sortBy('position');


        return view('show', compact('motor', 'menus', 'euro', 'contacts'));
    }

    // public function search(Request $request)
    // {
    //     //dd($request);

    //     $selectedCategories = $request->input('categories', []);
    //     $selectedBrands = $request->input('brands', []);
    //     $selectedKw = $request->input('kw');

    //     //$motors = Motor::whereIn('category_id', $selectedCategories)->get();

    //     // $motors = Motor::whereIn('category_id', $selectedCategories)
    //     //     ->orWhereIn('brand_id', $selectedBrands)
    //     //     ->paginate(6);

    //     $motors = Motor::whereIn('category_id', $selectedCategories)
    //     ->orWhereIn('brand_id', $selectedBrands)
    //     // ->where('performance', '<=', $selectedKw)
    //     // ->whereRaw("CAST(performance AS UNSIGNED) <= ?", [$selectedKw])

    //     ->paginate(9);

    //     $brands = Brand::all();
    //     $categories = Category::all();
    //     $menus = Menu::all();
    //     $euro = 0.00244;

    //     return view('motors', compact('motors', 'menus', 'euro', 'brands', 'categories', 'selectedCategories', 'selectedBrands'));
    // }

    public function adminindex()
    {
        $popularmotor = Motor::popularAllTime()->get()->take(5);

        //$visitday = Visits::popularBetween(Carbon::now()->subDays(1)->startOfDay(1), Carbon::now()->endOfDay())->get();
        $visitday = Visits::popularBetween(Carbon::now()->startOfDay(), Carbon::now()->endOfDay())->get();

        $visitweek = Visits::popularBetween(Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay())->get();
        $visitmonth = Visits::popularBetween(Carbon::now()->subDays(30)->startOfDay(), Carbon::now()->endOfDay())->get();
        $visityear = Visits::popularBetween(Carbon::now()->subDays(365)->startOfDay(), Carbon::now()->endOfDay())->get();
        // $visityear = Visits::popularBetween(Carbon::now()->startOfYear(), Carbon::now()->endOfDay())->get();

        $motors = Motor::count();
        $buying = Buying::count();
        $users = User::count();
        $euro = ExchangeRate::find(1);

        return view('admin.index', compact('motors', 'buying', 'users', 'euro', 'popularmotor', 'visitday', 'visitweek', 'visitmonth', 'visityear'));

        // return redirect()->route('admin.motor.index');
    }

    // public function visit()
    // {
    //     $popularmotor = Motor::popularAllTime()->get();

    //     $visit = Menu::withTotalVisitCount()->first()->visit_count_total;
    //     $test = Menu::withTotalVisitCount()->get();

    //     return view('admin.visit.index', compact('popularmotor', 'visit' , 'test'));
    // }

    public function visit(Request $request, $period = 'all')
    {
        switch ($period) {
            case 'week':
                $startOfWeek = now()->startOfWeek();
                $endOfWeek = now()->endOfWeek();
                $popularmotor = Motor::popularBetween($startOfWeek, $endOfWeek)
                    ->orderBy('visit_count_total', 'desc')
                    ->get();
                break;

            case 'month':
                $popularmotor = Motor::popularThisMonth()->orderBy('visit_count_total', 'desc')->get();
                break;

            case 'last-month':
                $popularmotor = Motor::popularLastMonth()->orderBy('visit_count_total', 'desc')->get();
                break;

            case 'year':
                $popularmotor = Motor::popularThisYear()->orderBy('visit_count_total', 'desc')->get();
                break;

            default:
                $popularmotor = Motor::popularAllTime()->orderBy('visit_count_total', 'desc')->get();
                break;
        }

        $visit = Menu::withTotalVisitCount()->first()->visit_count_total;
        $test = Menu::withTotalVisitCount()->get();

        return view('admin.visit.index', compact('popularmotor', 'visit', 'test', 'period'));
    }

    public function visitCustom(Request $request)
    {
        $request->validate([
            'date_range' => 'required|string',
        ]);
    
        [$from, $to] = explode(' - ', $request->input('date_range'));
    
        // Устанавливаем время для захвата полного дня
        $from = Carbon::parse($from)->startOfDay(); // 2025-01-08 00:00:00
        $to = Carbon::parse($to)->endOfDay();       // 2025-01-08 23:59:59
    
        $popularmotor = Motor::popularBetween($from, $to)->orderBy('visit_count_total', 'desc')->get();
    
        $period = $from->format('Y-m-d') . ' - ' . $to->format('Y-m-d');
    
        return view('admin.visit.index', compact('popularmotor', 'from', 'to', 'period'));
    }

    public function about()
    {
        $menus = Menu::all();

        $about = About::find(1);

        $visit = Menu::find(3);
        $visit->visit()->withIp();

        $visits = Visits::find(1);
        $visits->visit()->withIp();

        return view('about', compact('menus', 'about'));
    }

    public function gdpr()
    {
        $menus = Menu::all();

        // $gdpr = gdpr::find(1);

        return view('gdpr', compact('menus'));
    }

    public function help()
    {
        $menus = Menu::all();

        $helps = Help::all();

        $visit = Menu::find(4);
        $visit->visit()->withIp();

        $visits = Visits::find(1);
        $visits->visit()->withIp();

        return view('help', compact('menus', 'helps'));
    }

    public function contacts()
    {
        $menus = Menu::all();

        $contacts = Contacts::find(1);

        $visit = Menu::find(6);
        $visit->visit()->withIp();

        $visits = Visits::find(1);
        $visits->visit()->withIp();

        return view('contacts', compact('menus', 'contacts'));
    }

    public function buying()
    {
        $menus = Menu::all();

        $felvasarlas = Felvasarlas::find(1);

        $visit = Menu::find(5);
        $visit->visit()->withIp();

        $visits = Visits::find(1);
        $visits->visit()->withIp();

        return view('buying', compact('menus', 'felvasarlas'));
    }

    public function buyingstore(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gyartmany' => 'required|string|max:255',
            'tipus' => 'required|string|max:255',
            'km' => 'required|string|max:255',
            'allapot' => 'required|string|max:255',
            'ev' => 'required|string|max:255',
            'ar' => 'required|string|max:255',
            'link' => 'max:555',
            'leiras' => 'required|string|max:1500',
            'inlineRadioOptions' => 'required|string|max:255',
            'rendszam' => 'max:255',
        ]);

        $buying = new Buying();
        $buying->name = $request->input('name');
        $buying->tel = $request->input('tel');
        $buying->email = $request->input('email');
        $buying->gyartmany = $request->input('gyartmany');
        $buying->tipus = $request->input('tipus');
        $buying->km = $request->input('km');
        $buying->allapot = $request->input('allapot');
        $buying->ev = $request->input('ev');
        $buying->ar = $request->input('ar');
        $buying->link = $request->input('link');
        $buying->leiras = $request->input('leiras');
        $buying->okmany = $request->input('inlineRadioOptions');
        $buying->rendszam = $request->input('rendszam');
        $buying->save();

        $images = $request->file('images_id');
        $motorId = 'buy' . $buying->id;

        if ($images) {
            // Получаем идентификатор созданного мотоцикла
            $motorId = $buying->id;

            // Создаем папку для картинок с использованием идентификатора мотоцикла
            $folderPath = public_path('storage/buy/' . $motorId);

            // Проверяем, существует ли папка, и если нет, создаем ее
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $imagesArray = [];

            foreach ($images as $image) {
                $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();
                $image->move($folderPath, $filename);
                $imagesArray[] = 'storage/buy/' . $motorId . '/' . $filename;
            }

            $buying->images_id = implode(',', $imagesArray);
            $buying->save();

            // Обновляем поле images_id этим идентификатором
            // $buying->update(['images_id' => $motorId]);

            // foreach ($images as $image) {
            //     $filename = uniqid('image_') . '.' . $image->getClientOriginalExtension();

            //     $image->move($folderPath, $filename);

            //     $buying->images()->create([
            //         'url' => 'storage/buy/' . $motorId . '/' . $filename,
            //     ]);
            // }
        }

        $menus = Menu::all();

        // Email send

        $data = [
            'name' => $request->input('name'),
            'tel' => $request->input('tel'),
            'email' => $request->input('email'),
            'gyartmany' => $request->input('gyartmany'),
            'tipus' => $request->input('tipus'),
            'km' => $request->input('km'),
            'allapot' => $request->input('allapot'),
            'ev' => $request->input('ev'),
            'ar' => $request->input('ar'),
            'link' => $request->input('link'),
            'leiras' => $request->input('leiras'),
            'url' => 'https://www.markamotor.hu/admin/buying/' . $buying->id
        ];

        Mail::to('info@markamotor.hu')->send(new NewBuyingOffer($data));

        // $helps = Help::all();

        // return view('buying', compact('menus'));
        return redirect()->back()->withErrors(['message' => 'Köszönöm! Ajánlatát elfogadtuk, képviselőnk hamarosan felveszi Önnel a kapcsolatot']);

    }

}
