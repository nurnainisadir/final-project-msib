<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function ubahpassword(){
        $user = auth()->user();
        return view('ubah-password');
    }

    public function ubahpasswordproses()
    {
        request()->validate([
            'password_lama' => ['required'],
            'password' => ['required','min:5','confirmed'],
            'password_confirmation' => ['required','min:5'] 
        ]);

        // cek password apakah sama dengan yang di db
        if(Hash::check(request('password_lama'),auth()->user()->password)){
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
    
            return redirect()->back()->with('success','Password berhasil diubah');
        }else{
            // jikia salah
            
            return redirect()->back()->with('error','Password Lama Salah');
        }

    }
}
