<?php

use Illuminate\Database\Seeder;

class BarangaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brgys = [
            ['name'=>'AGUSAN CANYON'],
            ['name'=>'ALAE'],
            ['name'=>'DAHILAYAN'],
            ['name'=>'DALIRIG'],
            ['name'=>'DAMILAG'],
            ['name'=>'DICKLUM'],
            ['name'=>'GUILANG-GUILANG'],
            ['name'=>'KALUGMANAN'],
            ['name'=>'LINDABAN'],
            ['name'=>'LINGION'],
            ['name'=>'LUNOCAN'],
            ['name'=>'MALUKO'],
            ['name'=>'MAMBATANGAN'],
            ['name'=>'MAMPAYAG'],
            ['name'=>'MANTIBUGAO'],
            ['name'=>'MINSURO'],
            ['name'=>'SAN MIGUEL'],
            ['name'=>'SANKANAN'],
            ['name'=>'SANTIAGO'],
            ['name'=>'STO. NINO'],
            ['name'=>'TANKULAN'],
            ['name'=>'TICALA']
        ];

        foreach($brgys as $b){

            App\Barangay::insert($b);
        }
    }
}
