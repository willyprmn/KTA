<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;
use App\Models\ListBank;
// use Illuminate\Support\Facades;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login KTA'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ], [
            'username.required' => 'Username wajib di isi',
            'password.required' => 'Password wajib di isi'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Username atau Password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register KTA',
            'bank' => ListBank::all()
        ]);
    }

    public function customer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'min:8'],
            'ktp' => ['required', 'regex:/[0-9]{9}/', 'unique:customers', 'min:16', 'max:16'],
            'npwp' => ['required', 'regex:/[0-9]{9}/', 'min:15', 'max:15'],
            'jenis_kelamin' => ['required'],
            'status' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required', 'regex:/[0-9]{9}/', 'unique:customers', 'min:10', 'max:13'],
            'rekening' => ['required'],
            'no_cc' => ['required', 'regex:/[0-9]{9}/', 'min:16', 'max:16'],
            'limit_cc' => ['required']
        ], [
            'name.required' => 'Nama wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email telah terdaftar',
            'username.required' => 'Username wajib di isi',
            'username.unique' => 'Username telah terdaftar',
            'password.required' => 'Password wajib di isi',
            'password.regex' => 'Password harus terdiri dari angka, huruf besar dan kecil serta karakter simbol',
            'password.min' => 'Password minimum 8 karakter',
            'ktp.required' => 'Nomor KTP wajib di isi',
            'ktp.regex' => 'Nomor KTP wajib di isi dengan angka',
            'ktp.unique' => 'Nomor KTP telah terdaftar',
            'ktp.min' => 'Nomor KTP minimal 16 angka',
            'ktp.max' => 'Nomor KTP maksimal 16 angka',
            'npwp.required' => 'NPWP wajib di isi',
            'npwp.regex' => 'NPWP wajib di isi dengan angka',
            'npwp.min' => 'NPWP minimal 15 angka',
            'npwp.max' => 'NPWP maksimal 15 angka',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di pilih',
            'status.required' => 'Status wajib di pilih',
            'alamat.required' => 'Alamat wajib di isi',
            'no_hp.required' => 'Nomor HP wajib di isi',
            'no_hp.regex' => 'Nomor HP wajib di isi dengan angka',
            'no_hp.unique' => 'Nomor HP telah terdaftar',
            'no_hp.min' => 'Nomor HP minimal 10 angka',
            'no_hp.max' => 'Nomor HP maksimal 13 angka',
            'rekening.required' => 'Rekening Bank wajib di pilih',
            'no_cc.required' => 'Nomor Kartu Kredit wajib di isi',
            'no_cc.regex' => 'Nomor Kartu Kredit wajib di isi dengan angka',
            'no_cc.min' => 'Nomor Kartu Kredit minimal 16 angka',
            'no_cc.max' => 'Nomor Kartu Kredit maksimal 16 angka',
            'limit_cc.required' => 'Limit Kartu Kredit wajib di isi',
        ]);

        $dataUser = [
            'name' => $validatedData['name'],     
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'role' => 1
        ];
        User::create($dataUser);

        $user_id = User::latest('id')->first();
        $limit = str_replace(",", "", $validatedData['limit_cc']);
        $dataCustomer = [
            'ktp' => $validatedData['ktp'],     
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'status' => $validatedData['status'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
            'rekening' => $validatedData['rekening'],
            'no_cc' => $validatedData['no_cc'],
            'limit_cc' => (float)$limit,
            'npwp' => $validatedData['npwp'],
            'user_id' => $user_id['id']
        ];
        Customer::create($dataCustomer);

        return redirect('/')->with('registerSuccess', 'Data Tersimpan, Silahkan Login!');
    }

    public function profil()
    {
        return view('profile', [
            'title' => 'Profil',
            'profil' => User::join('customers', 'customers.user_id', '=', 'users.id')
            ->select('users.id', 'customers.id as customers_id', 'users.name', 'users.email', 'users.username', 'customers.ktp', 'customers.jenis_kelamin', 'customers.status', 'customers.alamat', 'customers.no_hp', 'customers.npwp', 'customers.no_cc', 'customers.limit_cc')
            ->where('users.id', auth()->user()->id)
            ->first()
        ]);
    }

    public function updateProfil(Request $request)
    {
        $auth = auth()->user()->id;
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', Rule::unique('users')->ignore($auth)],
            'username' => ['required', Rule::unique('users')->ignore($auth)],
            'password' => ['nullable', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'min:8'],
            'ktp' => ['required', 'regex:/[0-9]{9}/', 'unique:customers,user_id,' . auth()->user()->id, 'min:16', 'max:16'],
            'npwp' => ['required', 'regex:/[0-9]{9}/', 'unique:customers,user_id,' . auth()->user()->id, 'min:15', 'max:15'],
            'jenis_kelamin' => ['required'],
            'status' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required', 'regex:/[0-9]{9}/', 'unique:customers,user_id,' . auth()->user()->id, 'min:10', 'max:13'],
            // 'rekening' => ['required'],
            'no_cc' => ['required', 'regex:/[0-9]{9}/', 'min:16', 'max:16'],
            'limit_cc' => ['required']
        ], [
            'name.required' => 'Nama wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email telah terdaftar',
            'username.required' => 'Username wajib di isi',
            'username.unique' => 'Username telah terdaftar',
            'password.regex' => 'Password harus terdiri dari angka, huruf besar dan kecil serta karakter simbol',
            'password.min' => 'Password minimum 8 karakter',
            'ktp.required' => 'Nomor KTP wajib di isi',
            'ktp.regex' => 'Nomor KTP wajib di isi dengan angka',
            'ktp.unique' => 'Nomor KTP telah terdaftar',
            'ktp.min' => 'Nomor KTP minimal 16 angka',
            'ktp.max' => 'Nomor KTP maksimal 16 angka',
            'npwp.required' => 'NPWP wajib di isi',
            'npwp.regex' => 'NPWP wajib di isi dengan angka',
            'npwp.unique' => 'NPWP telah terdaftar',
            'npwp.min' => 'NPWP minimal 15 angka',
            'npwp.max' => 'NPWP maksimal 15 angka',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib di pilih',
            'status.required' => 'Status wajib di pilih',
            'alamat.required' => 'Alamat wajib di isi',
            'no_hp.required' => 'Nomor HP wajib di isi',
            'no_hp.regex' => 'Nomor HP wajib di isi dengan angka',
            'no_hp.unique' => 'Nomor HP telah terdaftar',
            'no_hp.min' => 'Nomor HP minimal 10 angka',
            'no_hp.max' => 'Nomor HP maksimal 13 angka',
            // 'rekening.required' => 'Rekening Bank wajib di pilih',
            'no_cc.required' => 'Nomor Kartu Kredit wajib di isi',
            'no_cc.regex' => 'Nomor Kartu Kredit wajib di isi dengan angka',
            'no_cc.min' => 'Nomor Kartu Kredit minimal 16 angka',
            'no_cc.max' => 'Nomor Kartu Kredit maksimal 16 angka',
            'limit_cc.required' => 'Limit Kartu Kredit wajib di isi',
        ]);

        $dataUser = [
            'name' => $validatedData['name'],     
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'role' => 1
        ];
        User::where('id', auth()->user()->id)->update($dataUser);

        $user_id = User::latest('id')->first();
        $limit = str_replace(",", "", $validatedData['limit_cc']);
        $dataCustomer = [
            'ktp' => $validatedData['ktp'],     
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'status' => $validatedData['status'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
            // 'rekening' => $validatedData['rekening'],
            'no_cc' => $validatedData['no_cc'],
            'limit_cc' => (float)$limit,
            'npwp' => $validatedData['npwp'],
            'user_id' => $user_id['id']
        ];
        Customer::where('user_id', auth()->user()->id)->update($dataCustomer);

        return redirect('/profil')->with('success', 'Data diri berhasil diperbaruhi!');
    }
}
