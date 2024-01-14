<?php

namespace App\Http\Controllers;

use App\Models\Index;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{

    public function edit(Index $index)
    {
        $index = Index::find(1);

        return view('admin.index.edit' , compact('index'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Index $index)
    {
        //dd($request);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'service_title' => 'required|string',
            'service1' => 'required|string',
            'service2' => 'required|string',
            'service3' => 'required|string',
            'service4' => 'required|string',
            'feedback_title' => 'required|string',
            'feedback1_name' => 'required|string',
            'feedback1' => 'required|string',
            'feedback2_name' => 'required|string',
            'feedback2' => 'required|string',
            'feedback3_name' => 'required|string',
            'feedback3' => 'required|string',
            'about_title' => 'required|string',
            'about1' => 'required|string',
            'about2' => 'required|string',
        ]);

            $index->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'service_title' => $request->input('service_title'),
                'service1' => $request->input('service1'),
                'service2' => $request->input('service2'),
                'service3' => $request->input('service3'),
                'service4' => $request->input('service4'),
                'feedback_title' => $request->input('feedback_title'),
                'feedback1_name' => $request->input('feedback1_name'),
                'feedback1' => $request->input('feedback1'),
                'feedback2_name' => $request->input('feedback2_name'),
                'feedback2' => $request->input('feedback2'),
                'feedback3_name' => $request->input('feedback3_name'),
                'feedback3' => $request->input('feedback3'),
                'about_title' => $request->input('about_title'),
                'about1' => $request->input('about1'),
                'about2' => $request->input('about2'),
            ]);

            return redirect()->route('admin.index.edit')->with('success', 'A frissítése sikeresen megtörtént.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Index $index)
    {
        //
    }
}
