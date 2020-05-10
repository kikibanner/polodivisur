<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class IpoltController extends Controller
{

    public function index(Request $request)
    {
      $user = \App\User::find(auth()->user()->id);
      $rs = \App\Rs::all();

      $latitude = $user->latitude;
      $longitude = $user->longitude;

      /*$rsterdekat = \App\Rs::select('rs.*')
       ->selectRaw('( 3959 * acos( cos( radians(?) ) *
                          cos( radians( latitude ) )
                          * cos( radians( longitude ) - radians(?)
                          ) + sin( radians(?) ) *
                          sin( radians( latitude ) ) )
                        ) AS distance', [$latitude, $longitude, $latitude])
       ->havingRaw("distance < ?", [1])
       ->get();*/

        return view('ipolt.index', ['rs' => $rs],['user' => $user]);
    }

    public function create(Request $request)
    {
        \App\Ipolt::create($request->all());
        return redirect('\ipolt')->with('success','Data Berhasil Diinput!');
    }

    public function edit($id)
    {
        $ipolt = \App\Ipolt::find($id);
        $user = \App\User::find($id);
        return view('ipolt.edit',['ipolt' => $ipolt],['user' => $user]);
    }

    public function update(Request $request,$id)
    {
        $ipolt = \App\Ipolt::find($id);
        $ipolt->update($request->all());
        return redirect('\ipolt')->with('success','Data Berhasil Diperbarui!');
    }

    public function delete($id)
    {
        $ipolt =  \App\Ipolt::find($id);
        $ipolt->delete($ipolt);
        return redirect('\ipolt')->with('success','Data Berhasil Dihapus!');
    }

    public function detail($id)
    {
        $ipolt = \App\Ipolt::find($id);
        $user = \App\User::find($id);
        return view('ipolt.detail',['ipolt' => $ipolt],['user' => $user]);
    }
}
