<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uncfg;
use App\Ipolt;
use Redirect,Response;
use DataTables;

class UncfgController extends Controller
{
    public function index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = Uncfg::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUncfg">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUncfg">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $ipolt = \App\Ipolt::all();
        return view('uncfgAjax',compact(['uncfg','ipolt']));
    }
     
    public function store(Request $request)
    {
        Uncfg::updateOrCreate(['id' => $request->id],
                ['ip_olt' => $request->ip_olt, 'hostname_olt' => $request->hostname_olt, 'fsp' => $request->fsp, 'sn' => $request->sn]);        
   
        return response()->json(['success'=>'Uncfg saved successfully.']);
    }

    public function edit($id)
    {
        $uncfg = Uncfg::find($id);
        return response()->json($uncfg);
    }
  

    public function destroy($id)
    {
        Uncfg::find($id)->delete();
     
        return response()->json(['success'=>'Uncfg deleted successfully.']);
    }


}
