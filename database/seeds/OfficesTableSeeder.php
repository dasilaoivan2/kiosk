<?php

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            ['name'=>'MAYORS OFFICE', 'code'=>'MO'],
            ['name'=>'MAYORS OFFICE EXTERNAL SERVICES', 'code'=>'MO-EX'],
            ['name'=>'MUNICIPAL PLANNING AND DEVELOPMENT OFFICE', 'code'=>'MPDO'],
            ['name'=>'HUMAN RESOURCE MANAGEMENT OFFICE', 'code'=>'HRMO'],
            ['name'=>'GENERAL SERVICES DIVISION', 'code'=>'GSD'],
            ['name'=>'LICENSE AND PERMITS DIVISION', 'code'=>'LAPD'],
            ['name'=>'MUNICIPAL ENGINEERING OFFICE', 'code'=>'MEO'],
            ['name'=>'MUNICIPAL AGRICULTURE OFFICE', 'code'=>'MAO'],
            ['name'=>'MUNICIPAL ACCOUNTING OFFICE', 'code'=>'MACCO'],
            ['name'=>'MUNICIPAL BUDGET OFFICE', 'code'=>'MBO'],
            ['name'=>'MUNICIPAL TREASURERS OFFICE', 'code'=>'MTO'],
            ['name'=>'MUNICIPAL ASSESSORS OFFICE', 'code'=>'MASSO'],
            ['name'=>'MUNICIPAL ENVIRONMENT AND NATURAL RESOURCES OFFICE', 'code'=>'MENRO'],
            ['name'=>'MUNICIPAL HEALTH OFFICE', 'code'=>'MHO'],
            ['name'=>'INFORMATION TECHNOLOGY DIVISION', 'code'=>'ITD'],
            ['name'=>'LOCAL CIVIL REGISTRAR OFFICE', 'code'=>'LCR']
        ];

        foreach($offices as $office){

            App\Office::insert($office);
        }
    }
}
