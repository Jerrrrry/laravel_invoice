<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Invoice;
use App\Repositories\InvoiceRepository;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(InvoiceRepository $invoices){
        $this->middleware('auth');
        $this->invoices = $invoices;
    }
    public function index()
    {
        return view('invoice');
    }

    //get user data 
    public function getdata(Request $request)
    {
        $invoice=$this->invoices->forUser($request->user());
        
        return $invoice;
    }
    //print PDF
    public function printpdf($id)
    {   //$name=$request->name;
        //$time=$request->time;
        //$total=$request->total;
        //$hourly=$request->hourly;
        //$address=$request->address;
        //$description=$request->description;
        //$date=$request->date;
        $invoice=\App\Invoice::find($id);
        $view=\View::make('pdf',compact('invoice'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $vname=$invoice->name;
        $vdate=$invoice->date; 
         
        $pdf->loadHTML($view);
        //return $pdf->stream();
        return $pdf->download($vname.$vdate.'invoice.pdf');
    }
    public function testpdf()
    {
    	$view=\View::make('pdf')->render();
    	$pdf=\App::make('dompdf.wrapper'); 
    	 
    	$pdf->loadHTML($view);
    	return $pdf->download('invoice.pdf');
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->invoices()->create([
            'name' => $request->name,
            'address' => $request->address,
            'hourly' => $request->hourly,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description,
	    'total'=>$request->total,
            
        ]);
        //put post data to pdf generation 
        $name=$request->name;
        $date=$request->date;
        $hourly=$request->hourly;
        $time=$request->time;
        $description=$request->description;
        $total=$request->total;
        $address=$request->address;


        $view=\View::make('inipdf',compact('name','date','hourly','time','description','total','address'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $vname=$name;
        $vdate=$date; 
         
        $pdf->loadHTML($view);
        //return $pdf->stream();
        return $pdf->download($vname.$vdate.'invoice.pdf');
       


        
       

        //pdf
        
        /*$invoice=new Invoice;
        $invoice->name=$request->name;
        $invoice->address=$request->address;
        $invoice->hourly=$request->hourly;
        $invoice->email=$request->email;
        $invoice->date=$request->date;
        $invoice->time=$request->time;
        $invoice->description=$request->description;
        $inovice->save();*/
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
}
