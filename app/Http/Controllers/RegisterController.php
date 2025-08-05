<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|min:3|unique:users', // Memastikan username unik
    //         'email' => 'required|email|unique:users', // Memastikan email unik
    //         'phone' => 'nullable|string', // No HP opsional
    //         'password' => 'required|min:4|confirmed', // Memastikan password terkonfirmasi
    //         // Tambahkan validasi untuk captcha jika perlu
    //         // 'captcha' => 'required|captcha'
    //     ]);

    //     // Buat pengguna baru dengan role "pelanggan"
    //     User::create([
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'phone' => $validated['phone'], // No HP jika ada
    //         'password' => Hash::make($validated['password']), // Hash password
    //         'role' => 'pelanggan', // Set role sebagai pelanggan
    //     ]);

    //     // Redirect ke halaman login dengan pesan sukses
    //     return redirect('/login')->with('pesan', 'Berhasil Registrasi! Silakan login.');
    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string',
            'password' => 'required|min:4|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'pelanggan',
        ]);

        return redirect('/')->with('success_register', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}