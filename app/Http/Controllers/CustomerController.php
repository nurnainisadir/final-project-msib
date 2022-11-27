<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use DB;
use PDF;
use Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilkan seluruh data
        $customer=Customer::orderBy('idcustomer', 'ASC')->get();
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.form');
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
            'nama_customer' => 'required:customer|max:50',
            'no_tlp' => 'required:customer|max:15',
            'gender'=> 'required|in:L,P',
            'alamat' => 'required:customer|max:50'
        ],

        [
            'nama_customer.required'=>'Nama Customer Wajib Diisi',
            'nama_customer.max'=>'Nama Customer Maksimal 50 karakter',
            'no_tlp.required'=>'No. Telepon Wajib Diisi',
            'no_tlp.max'=>'No. Telepon Maksimal 15 karakter',
            'gender.required'=>'Gender Wajib Diisi',
            'alamat.required'=>'Alamat Wajib Diisi',
            'alamat.max'=>'Alamat Maksimal 50 karakter',
        ]
    );
      
        Customer::create($request->all());
       
        return redirect()->route('customer.index')
                        ->with('success','Data Customer Berhasil Disimpan');
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
        $row = Customer::where('idcustomer',$id)->first();
        return view('customer.form_edit',compact('row'));
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
            'nama_customer' => 'required:customer|max:50',
            'no_tlp' => 'required:customer|max:15',
            'gender'=> 'required',
            'alamat' => 'required:customer|max:50'
        ]);
         DB::table('customer')->where('idcustomer',$id)->update(
            [
                //'nip'=>$request->nip,
                'nama_customer'=>$request->nama_customer,
                'no_tlp'=>$request->no_tlp,
                'gender'=>$request->gender,
                'alamat'=>$request->alamat,
                'updated_at'=>now(),
            ]);
        return redirect()->route('customer.index')
                        ->with('success','Data Customer Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Customer::where($id);
        Customer::where('idcustomer',$id)->delete();
        return redirect()->route('customer.index')
                        ->with('success','Data Customer Berhasil Dihapus');
    }
    public function customerPDF()
    {
        $customer = Customer::all();
        $pdf = PDF::loadView('customer.customerPDF', ['customer'=>$customer]);
        return $pdf->download('dataCustomer.pdf');
    }
}
