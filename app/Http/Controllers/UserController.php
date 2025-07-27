<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::where('role', 'pelanggan')->paginate(10);
    //     return view('users.index', compact('users'));
    // }
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create',['users' =>User::all()]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required|min:3',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:4|confirmed',
           'phone' => 'required|digits_between:12,16',
           'role' => 'required|in:admin,pelanggan',
        ]);

        //dd($validated);

        User::create($validated);
        return redirect('/dashboard-pengguna')->with('pesan', 'Data berhasil disimpan');
    }
    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('users.show', compact('user'));
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.update', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|digits_between:12,16',
            'role' => 'required|in:admin,pelanggan',
            'password' => 'nullable|min:4|confirmed',
            'old_password' => 'required_with:password', // kalau mau ubah password, wajib isi old_password
        ]);

        // Jika password baru diisi, cek old_password dulu
        if ($request->filled('password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
            }

            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect('/dashboard-pengguna')->with('pesan', 'Data pengguna berhasil diperbarui');
    }
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/dashboard-pengguna')->with('pesan', 'Data berhasil dihapus');
    }

}