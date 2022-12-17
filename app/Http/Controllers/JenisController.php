<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use DB;
use PDF;
use Alert;

class JenisController extends Controller
{
    public function __construct(){
        $this->middleware('admin',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilkan seluruh data
        $jenis=Jenis::orderBy('idjenis', 'ASC')->get();
        return view('jenis.index',compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis.form');
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
            'jenis_laundry' => 'required:jenis|max:30',
            'harga' => 'required:jenis|max:11'
        ],
        
        [
            'jenis_laundry.required'=>'Jenis Laundry Wajib Diisi',
            'jenis_laundry.max'=>'Jenis Laundry Maksimal 30 karakter',
            'harga.required'=>'Harga Wajib Diisi',
            'harga.max'=>'Harga Maksimal 11 karakter',
        ]
    
    );
      
        Jenis::create($request->all());
       
        return redirect()->route('jenis.index')
                        ->with('success','Data Jenis Berhasil Disimpan');
                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Jenis::where('idjenis',$id)->first();
        return view('jenis.form_edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'jenis_laundry' => 'required:jenis|max:30',
            'harga' => 'required:jenis|max:11'
        ]);
          DB::table('jenis')->where('idjenis',$id)->update(
            [
                //'nip'=>$request->nip,
                'jenis_laundry'=>$request->jenis_laundry,
                'harga'=>$request->harga,
                'updated_at'=>now(),
            ]);
       
        return redirect()->route('jenis.index')
                        ->with('success','Data Jenis Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Jenis::where($id);
         Jenis::where('idjenis',$id)->delete();
        return redirect()->route('jenis.index')
                        ->with('success','Data Jenis Berhasil Dihapus');
    }

    public function jenisPDF()
    {
        $jenis = Jenis::all();
        $pdf = PDF::loadView('jenis.jenisPDF', ['jenis'=>$jenis]);
        return $pdf->download('dataJenis.pdf');
    }

	public function apiJenis()
    {
        $jenis = Jenis::all();
       return response()->json(
       [
       'message'=>'Data Jenis',
       'data'=>$jenis
       ],200);
     }
       
     public function apiJenisid($idjenis)
     {
        $jenis = Jenis::find($idjenis);
        if($jenis){
            return response()->json(
                [
                'message'=>'Detail jenis',
                'data'=>$jenis,
                ],200);
        }else{
            return response()->json(
                [
                'message'=>'Jenis tidak ada',
                ],200);
        }
     }
}
