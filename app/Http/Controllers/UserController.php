<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Alert;
use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin',['only'=>['destroy','edit','update']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'karyawan'){
            return abort(403);
        }

        $user=user::orderBy('id', 'ASC')->get();
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required:users|max:25',
            'email' => 'required|unique:users|max:50',
            'password' => 'required:users|min:8',
            'role'=> 'required|in:admin,karyawan',
            'isactive' => 'required:users',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ],

        //costum pesan errornya
        [
            'name.required'=>'Nama Wajib Diisi',
            'name.max'=>'Nama Maksimal 25 karakter',
            'email.required'=>'Email Wajib Diisi',
            'email.unique'=>'Email Sudah Ada',
            'email.min'=>'Email Maksimal 50 karakter',
            'password.required'=>'Password Wajib Diisi',
            'password.min'=>'Password Minimal 8 karakter',
            'role.required'=>'Role Wajib Diisi',
            'isactive.required'=>'Isactive Wajib Diisi',
        ]
        );
      
        if(!empty($request->foto)){
            $fileName = 'foto-'.$request->users.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('user'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form
        DB::table('users')->insert(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'role'=>$request->role,
                'isactive'=>$request->isactive,
                'foto'=>$fileName,
                'created_at'=>now(),
            ]);
       
        return redirect()->route('users.index')
                        ->with('success','Data User Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = User::where('id',$id)->first();
        return view('users.detail',compact('row'));
    }

    public function profil()
    {
        $row = Auth::user();
        return view('users.profil',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = User::where('id',$id)->first();
        return view('users.form_edit',compact('row'));
    }


    public function editprofil()
    {
        $row = Auth::user();
        return view('users.edit-profil',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateprofil(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'email' => 'required|max:45',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $row = DB::table('users')->where('id',$id)->first();

        if(!empty($request->foto)){
            if(!empty($row->foto)) unlink('user/'.$row->foto);
            $fileName = 'foto-'.$request->name.'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('user'),$fileName);
        }
        else{
            $fileName = $row->foto;
        }

        DB::table('users')->where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'foto' => $fileName,
            ]
        );

        return redirect()->route('profil')
                        ->with('success','Profil User Berhasil Diubah');
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required:users|max:25',
            'email' => 'required:users|max:50',
            'role'=> 'required|in:admin,karyawan',
            'isactive' => 'required:users',
        ]);
        
         DB::table('users')->where('id',$id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'role'=>$request->role,
                'isactive'=>$request->isactive,
            ]);
        return redirect()->route('users.index')
                        ->with('success','Data User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = User::where($id);
        User::where('id',$id)->delete();
        return redirect()->route('users.index')
                        ->with('success','Data User Berhasil Dihapus');
    }
}
