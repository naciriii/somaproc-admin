<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
         DB::table('contacts')->insert([
        	['first_name'=>'aziz','last_name'=>'rabhi','email'=>'aziz@aziz.aziz','message'=>'test test test test'],
        	['first_name'=>'nacer','last_name'=>'nacer','email'=>'nacer@nacer.nacer','message'=>'test test test test']
        	
        	]);
    }
}
