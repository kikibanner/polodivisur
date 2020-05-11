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

    public function simpan_old(Request $request,$id)
    {
      $user = \App\User::find($id);
      $user->gejala = $request->gejala;
      $ip = '50.90.0.1';
      $data = \Location::get($ip);
      $user->latitude = $data->latitude;
      $user->longitude = $data->longitude;
      $user->save();
      $user->update();
      dd($request->gejala);
      return redirect('\dashboard');
    }

    public function simpan(Request $request,$id)
    {
      $gejala = $request->gejala;
      $gejala = str_replace(' ', '', $gejala);
      $umur = $request->usia;
      $kelamin = $request->jenis_kelamin;
      $id = $request->id;
      $parameter = 'umur'.$umur.','.$kelamin.','.$gejala.',dpos1,'.$id;
      $client = new \GuzzleHttp\Client();
      $request = $client->get('http://13.76.142.69:5000/nlp/'.$parameter);
      $response = json_decode($request->getBody()->getContents());
      $result = $response->result;

      $user = \App\User::find($id);
      $user->gejala = $gejala;
      $user->result = $result;
      $ip = '50.90.0.1';
      $data = \Location::get($ip);
      $user->latitude = $data->latitude;
      $user->longitude = $data->longitude;
      $user->save();
      $user->update();
      return redirect('\dashboard');
    }

    public function ml()
    {
      $jajal='umur21,pilek,panas,batukbatuk,dpos1,21';
      $client = new \GuzzleHttp\Client();
      $request = $client->get('http://13.76.142.69:5000/nlp/'.$jajal);
      $response = json_decode($request->getBody()->getContents());
      $gejala = $response->result;
      dd($response);
    }
}
