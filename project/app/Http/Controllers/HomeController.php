<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\SecondData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use App\Mail\SendPdf;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function home()
    {
        
        return redirect()->route('data.create');
    }
    public function index()
    {
        $data = data::all();
        // return $data;
        return view('data', compact('data'));

        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required|max:255',
            'date-of-birth' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $create = data::create([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request['date-of-birth'],
            'phone' => $request->phone,
        ]);

        if($create){
            return $this->Dbsave($request->all());
            
        }

        abort(500);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function create_pdf()
    {
        $data = data::all();
        $pdf = PDF::loadView('pdf_data', compact('data'));

        
        // download PDF file with download method
        return $pdf->download('data.pdf');
    }

    public function CreatePdfData($id){
        $data = data::find($id);

        $pdf = PDF::loadView('pdf_view', [
        'name' => $data->name,
        'dob' => $data->dob,
        'email' => $data->email,
        'phone' => $data->phone,
        // ... and more data if you like
        ]);

        return $pdf->download('single-data-client.pdf');
    }
    public function Dbsave($data) {
        $second_data = new SecondData;
        $second_data->setConnection('mysql2');
        $second_data->name = $data['name'];
        $second_data->email = $data['email'];
        $second_data->phone = $data['phone'];
        $second_data->dob = $data['date-of-birth'];

        $second_data->save();

        return redirect()->route('data.index');
    }
}
