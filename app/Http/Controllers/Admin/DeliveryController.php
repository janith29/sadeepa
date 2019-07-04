<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Inverty;

use App\Models\Delivery;

use Validator;
use Illuminate\Support\Facades\DB;
use App;
use PDF;
use File;
class DeliveryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Delivers = Delivery::all();
      
        return view('admin.delivery.index', compact('Delivers'));
    }
    public function today()
    {
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');

        $Delivers =  DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue'");
      
        return view('admin.delivery.today', compact('Delivers'));
    }
    
    public function searchdelivery(Request $request)
    {
        $Delivers = DB::table('delivered')
        ->where('id', $request['search'])
        ->orWhere('articleNo', 'like', '%' . $request['search'] . '%')
        ->orWhere('refkey', 'like', '%' . $request['search'] . '%')
        ->orWhere('reqdate', 'like', '%' . $request['search'] . '%')
        ->orWhere('issudate', 'like', '%' . $request['search'] . '%')
        ->orWhere('qty', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.delivery.index', compact('Delivers'));
    }
    public function Selectdate(Request $request)
    {
        $Issue=$request->get('getdate');
        $Delivers =  DB::select("SELECT * FROM `delivered` WHERE DATE(issudate) = ' $Issue'");
       
        return view('admin.delivery.select', compact('Delivers'));
    }
    /**  
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function find()
    { 
        $Invertys = Inverty::all();
      
        return view('admin.delivery.inverty', compact('Invertys'));
    }

    public function searchInverty(Request $request)
    {
        $Invertys = DB::table('inverty')
        ->where('id', $request['search'])
        ->orWhere('articleNo', 'like', '%' . $request['search'] . '%')
        ->orWhere('color', 'like', '%' . $request['search'] . '%')
        ->orWhere('collection', 'like', '%' . $request['search'] . '%')
        ->orWhere('location', 'like', '%' . $request['search'] . '%')
        ->orWhere('qty', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.delivery.inverty', compact('Invertys'));
    }

    public function create(Inverty $delivery)
    {
        return view('admin.delivery.add',['delivery' => $delivery]);
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Delivery $Delivery)
    {
        $validatedData = [
            'quantity' => 'required|regex:/^[0-9]+(\.[0-9][0-9][0-9][0-9]?)?$/'
        ];
        $customMessages = [
            'quantity.required' =>  'Inverty quantity must be required',
            'quantity.regex' => 'Inverty quantity must be double value(with 4)'
        ];
        $this->validate($request, $validatedData, $customMessages);

         $invertys = DB::table('inverty')->where('articleNo', $request['articleNo'])->get();
           
        $ArticleNo="panding";
        $invertyCount=null;
        foreach($invertys as $inverty)
        {
            $ArticleNo=$inverty->articleNo;
            $invertyCount=$inverty->qty;
        }
        if($invertyCount < $request['quantity'])
        {
            $message = "Can't get ".$request['quantity']."M. Inverty has ".$invertyCount."M";
            return redirect()->back()->with('message', $message);
        }
        else{
            $Delivery->articleNo=$request->get('articleNo');
            $Delivery->qty=$request->get('quantity');
            $Delivery->refkey=$request->get('refkey');
            $Delivery->reqdate=$request->get('request_date');
            $Delivery->issudate=$request->get('issue_date');
            $Delivery->print=false;
            $Delivery->save();

            $now=$invertyCount-$request['quantity'];
            DB::table('inverty')
            ->where('articleNo', $ArticleNo)
            ->update(['qty' => $now]);
        
            $deliveres = DB::select('select * from delivered ORDER BY id DESC LIMIT 1');
        
            $lastid=null;
            foreach($deliveres as $deliveree)
            {
                $lastid=$deliveree->id;
            }

            return redirect()->route('admin.delivery.show',[$lastid])  ;
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $Delivery)
    {
        return view('admin.delivery.show',['Delivery' => $Delivery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Delivery $Delivery)
    {
        return view('admin.delivery.delete',['Delivery' => $Delivery]);
    }
    public function sedelete(Request $request)
    {
        DB::table('delivered')->where('id', $request['id'])->delete();
         return view('admin.delivery.success');
    }
    public function print()
    {
        $Issue=Carbon::now();
        Carbon::setToStringFormat('Y-m-d');
        
        $view = \View::make('admin.delivery.print');
        $html = $view->render();
        $pdf = new PDF();
        $pdf::SetTitle('Print');
        $pdf::AddPage('P', 'A4');
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output($Issue.'_print.pdf');
        
      }
      

}
