<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class ExchangeRateController extends Controller
{
    public function index()
    {
        $exchangeRate = ExchangeRate::find(1);

        return view('admin.exchangerate.index' , compact('exchangeRate'));
    }

    public function update(Request $request, ExchangeRate $exchangeRate) {
        $exchangeRate->update([
            'rate' => $request->input('rate'),
            'manual_rate' => $request->input('manual_rate'),
            'manual_divider' => $request->input('manual_divider'),
        ]);

        return redirect()->route('admin.exchangerate.index')->with('success', 'Az euro árfolyam frissítése sikeresen megtörtént.');
    }
}
