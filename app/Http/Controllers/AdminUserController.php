<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Validation\Rules;  

class AdminUserController extends Controller
{
    /**
     * Menampilkan daftar semua user.
     */
    public function index()
    {
        // Ambil semua user, kecuali admin yang sedang login
        $users = User::where('id', '!=', Auth::id())->paginate(15);
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Menampilkan form untuk mengedit user.
     */
    public function edit(User $user) // Menggunakan Route Model Binding
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update data user di database.
     */
    public function update(Request $request, User $user)
    {
        // 1. Validasi
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Update Nama & Email
        $user->name = $request->name;
        $user->email = $request->email;

        // 3. Update Level Akun (Role)
        // Checkbox 'is_admin' akan mengirimkan '1' jika dicentang, dan tidak mengirimkan apa-apa jika tidak.
        $user->is_admin = $request->has('is_admin');

        // 4. Update Password (HANYA JIKA DIISI)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 5. Simpan perubahan
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Hapus user dari database.
     */
    public function destroy(User $user)
    {
        // Keamanan: Pastikan admin tidak menghapus akunnya sendiri
        if ($user->id == Auth::id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}