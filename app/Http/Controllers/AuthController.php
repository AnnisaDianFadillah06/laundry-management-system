<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('halaman.halaman_signIn');
    }
    public function signUp()
    {
        return view('halaman.halaman_signUp');
    }
    public function dashboard()
    {
        $totalpengguna = DB::table('users')->where('status', '1')->count();
        $totaltransaksi = DB::table('tb_transaksi')
        ->where(function($query) {
            $query->where('status', 'baru')
                ->orWhere('status', 'proses');
        })
        ->whereNotIn('status', ['selesai', 'diambil'])
        ->count();
        $totalpaket = DB::table('tb_paket')->where('status', '1')->count();
        $totaloutlet = DB::table('tb_outlet')->where('status', '1')->count();
        $outlet = DB::table('tb_outlet')->where('status','=','1')->get();
        $paket = DB::table('tb_paket')->where('status','=','1')->get();
        $transaksi = DB::table('tb_transaksi')
        ->leftjoin('tb_outlet','tb_transaksi.id_outlet','=','tb_outlet.id_outlet')
        ->leftjoin('users','tb_transaksi.id_user','=','users.id_user')
        ->leftjoin('tb_member','tb_transaksi.id_member','=','tb_member.id_member')
        ->leftjoin('tb_paket','tb_transaksi.id_paket','=','tb_paket.id_paket')
        ->select('tb_transaksi.*','tb_outlet.nama_outlet', 'users.nama_user', 'tb_member.nama_member', 'tb_paket.nama_paket')
        ->get();
        return view('halaman.halaman_dashboard', compact('transaksi','paket', 'outlet', 'totalpengguna', 'totalpaket', 'totaloutlet', 'totaltransaksi'));
    }

    public function profile()
    {
        $user = auth()->user();
        $id_user = $user->id_user;
        $transaksi = DB::table('tb_transaksi')
        ->leftjoin('tb_outlet','tb_transaksi.id_outlet','=','tb_outlet.id_outlet')
        ->leftjoin('users','tb_transaksi.id_user','=','users.id_user')
        ->leftjoin('tb_member','tb_transaksi.id_member','=','tb_member.id_member')
        ->leftjoin('tb_paket','tb_transaksi.id_paket','=','tb_paket.id_paket')
        ->where('tb_transaksi.id_user', '=', $id_user)
        ->select('tb_transaksi.*','tb_outlet.nama_outlet', 'users.nama_user', 'tb_member.nama_member', 'tb_paket.nama_paket')
        ->get();
        $pengguna = DB::table('users')
        ->leftjoin('tb_outlet','users.id_outlet','=','tb_outlet.id_outlet')
        ->select('users.*','tb_outlet.nama_outlet')
        ->get();
        return view('halaman.halaman_profile', compact('transaksi', 'pengguna'));
    }

    public function loginPost(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $email = User::where('email',$request->email)->first();
            if (!$email) {
                $validator->errors()->add('email', 'Email address not found');
                return back()->withInput()->withErrors($validator);
            }
            if (!Hash::check($request->password, $email->password)) {
                $validator->errors()->add('password', 'The password is incorrect');
                return back()->withInput()->withErrors($validator);
            }            
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (auth()->check()) {
                // $nama_user = auth()->user()->nama_user;
                //  // Store nama_user in session
                // session()->put('nama_user', $nama_user);
                // $urlFotoProfil = '/storage/foto_user/' . $user->foto_user;
                // session(['urlFotoProfil' => $urlFotoProfil]);
                // $urlFotoProfil = session('urlFotoProfil');
                $user = auth()->user();
                $nama_user = $user->nama_user;
                $id_user = $user->id_user;
                $role = $user->role;
                $email = $user->email;
                $id_outlet = $user->id_outlet;
                $nama_outlet = DB::table('tb_outlet')->where('id_outlet', $id_outlet)->value('nama_outlet');
                // Store nama_user in session
                session()->put('id_user', $id_user);
                session()->put('nama_user', $nama_user);
                session()->put('role', $role);
                session()->put('email', $email);
                session()->put('nama_outlet', $nama_outlet);
                session()->put('id_outlet', $id_outlet);
            
                // Set urlFotoProfil in session
                $urlFotoProfil = $user->foto_user;
                // dd($urlFotoProfil);
                session()->put('urlFotoProfil', $urlFotoProfil);
                return redirect()->intended('dashboard') ->withSuccess('Login Sukses!');
            } else {
            dd('Gagal login!');
            }
        }
    }

    public function postprofile(Request $request){
      
        $nama_user = session('nama_user');
        if ($request -> filled('id_user')) {
            $requestUpdate['updated_by'] = $nama_user;
        }
        // Tambahkan nilai created_by dan updated_by dalam request
        $request -> merge([
            'created_by' => $nama_user,
        ]);
        // dd($request);
        if($request->hasFile('foto_user')){
            $image = $request->file('foto_user');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = public_path('foto_user/'.$filename);
            $image->move(public_path('foto_user'), $filename);
            $requestData["foto_user"] = '/foto_user/'.$filename;
        }
        // $fileName = time().$request->file('foto_user')->getClientOriginalName();
        // $path = $request->file('foto_user')->storeAs('foto_user', $fileName, 'public');
        // $requestData["foto_user"] = '/storage/'.$path;
        $data = [
            'nama_user' => $request->nama_pengguna,
            'email' => $request->email,
            'foto_user' => $requestData["foto_user"],
            'created_by' => $request -> created_by,
        
            // tambahkan nilai 'updated_by' jika dalam mode update
            'updated_by' => $requestUpdate['updated_by'] ?? null,
        ];
        
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }
        
        User::updateOrCreate([
            'id_user' => $request->id_user
        ], $data);

        $message = 'Data Berhasil Diedit!, Silahkan logout terlebih dahulu untuk melihat perubahan.';
        return redirect('/profile')->with('success', $message);
    }

    public function logout(){
        // Session::flush();
        Auth::logout();
        return redirect('signIn')->withSuccess('alert','Kamu sudah logout');
    }

    public function registerPost(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirpassword' => 'required|same:password',
        ]);
    
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $user = new User([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        return redirect('signIn')->with('alert-success','Kamu berhasil Register');
    }

    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view(dashboard);
    //     }
  
    //     return redirect("signIn")->withSuccess('Anda gagal Login, Coba lagi!');
    // }
}
?>