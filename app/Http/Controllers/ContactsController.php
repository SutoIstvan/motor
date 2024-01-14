<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacts $contacts)
    {
        $contacts = Contacts::find(1);

        return view('admin.contacts.edit' , compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacts $contacts)
    {
        //dd($request);
        $request->validate([
            'title' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'address1' => 'string',
            'address2' => 'string',
            'content1' => 'required|string',
            'content2' => 'required|string',
            'content3' => 'required|string',
            'content4' => 'required|string',
        ]);

            $contacts->update([
                'title' => $request->input('title'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address1' => $request->input('address1'),
                'address2' => $request->input('address2'),
                'content1' => $request->input('content1'),
                'content2' => $request->input('content2'),
                'content3' => $request->input('content3'),
                'content4' => $request->input('content4'),
            ]);

            return redirect()->route('admin.contacts.edit')->with('success', 'A frissítése sikeresen megtörtént.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
