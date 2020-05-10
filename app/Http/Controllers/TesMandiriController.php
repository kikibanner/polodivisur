<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesMandiriController extends Controller
{
    public function index(Request $request)
    {
      $user = \App\User::all();
      return view('ipolt.tesmandiri', ['user' => $user]);
    }

    public function mulai($id)
    {
        $user = \App\User::find($id);
        return view('ipolt.tesmandiri',['user' => $user]);
    }

    public function simpan(Request $request,$id)
    {
      $user = \App\User::find($id);
      $user->gejala = $request->gejala;
      $ip = '50.90.0.1';
      $data = \Location::get($ip);
      $user->latitude = $data->latitude;
      $user->longitude = $data->longitude;
      $user->save();
      $user->update();
      return redirect('\dashboard');
    }
}
