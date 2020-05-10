<?php

use Illuminate\Database\Seeder;
use App\Rs;

class RsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Rs::create([
          'name' => 'RSUD Dr. Soetomo',
          'address' => 'Jl. Mayjen Prof. Dr. Moestopo No.6-8, Airlangga, Kec. Gubeng, Kota SBY, Jawa Timur 60286',
          'latitude' => '-7.268.448',
          'longitude' => '112.758.128',
      ]);
    }
}
