<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        if (auth()->user()->role != 1) {
            return redirect()->route('dashboard');
        }

        return view('admin', [
            'users' => User::where('role', '!=', 1)->get()
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        return redirect()->route('admin');
    }

    public function edit($id)
    {
        return view('edit', [
            'data' => User::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = [
            'name' => $request->name,
            'email' => $request->username,
            'role' => 2,
        ];

        if ($request->password) {
            $input['password'] = Hash::make($request->password);
        }

        $data = User::findOrFail($id);
        $data->update($input);

        return redirect()->route('admin');
    }

    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }
}
