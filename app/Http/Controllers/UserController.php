<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $users = User::paginate($perPage);

        return view('admin.user.index' , compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

        } catch (QueryException $e) {
            // Обработка ошибки уникальности
            if ($e->errorInfo[1] == 1062) {
                // Запись уже существует
                return back()->withInput()->with('error', 'Már létezik azonos nevű felhasználó.');
            }
        }

        $users = User::all();

        return redirect()->route('admin.user.index')->with('success', 'Az új felhasználó sikeresen hozzáadva.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Felhasználó törölve');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        try {
            $user->update([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('admin.user.index')->with('success', 'A user frissítése sikeresen megtörtént.');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(['error' => 'Már létezik azonos nevű user.']);
            } else {
                return redirect()->back()->withErrors(['error' => 'Hiba történt a user frissítése közben.']);
            }
        }
    }
}
