<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Motor;
use Carbon\Carbon;
use App\Models\Contacts;
use Illuminate\Support\Facades\Http;
use SimpleXMLElement;

class RentalsController extends Controller
{
    public function index()
    {
        $events = Event::all();

        $menu = Menu::where('url', 'rentals')->first();

        $visit = Menu::find(7);
        $visit->visit()->withIp();

        return view('admin.rentals', compact('menu', 'events'));
    }

    public function updateVisibility(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // Update is_visible
        $menu->update(['is_visible' => $request->input('is_visible')]);

        return redirect()->route('admin.rentals')->with('success', 'Статус видимости обновлен');
    }

    public function show(Motor $motor)
    {
        $events = Event::all();

        $exchangeRate = ExchangeRate::find(1);
        $today = Carbon::today();

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

        return view('showrent', compact('motor', 'menus', 'euro', 'contacts', 'events'));
    }


}
