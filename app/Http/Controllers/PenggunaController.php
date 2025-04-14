<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = DB::table('users')
        ->leftjoin('tb_outlet','users.id_outlet','=','tb_outlet.id_outlet')
        ->select('users.*','tb_outlet.nama_outlet')
        ->get();
        $outlet = DB::table('tb_outlet')->where('status','=','1')->get();
        return view('halaman.halaman_dataPengguna', compact('pengguna', 'outlet'));
    }

    public function post(Request $request){
      
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
            'id_outlet' => $request->id_outlet,
            'nama_user' => $request->nama_pengguna,
            'email' => $request->email,
            'foto_user' => $requestData["foto_user"],
            'role' => $request->role,
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

        if ($request -> id_user) {
            $message = 'Data Berhasil Diedit!';
        } else {
            $message = 'Data Berhasil Disimpan!';
        }

        return redirect('dataPengguna')->with('success', $message);
    }

    public function destroy(Request $request)
    {
        // Ambil pengguna yang sedang login
        $nama_user = session('nama_user');
        $requestData['updated_by'] = $nama_user;
        $pengguna = User::findorfail($request->id_user);
        $pengguna->update($request->all());

        // Tandai pengguna yang menghapus data
        $pengguna->updated_by = $requestData['updated_by'];
        $pengguna->save();
        $message = 'Data Berhasil Diedit!';
        return redirect('dataPengguna')->with('success', $message);
    }


}
