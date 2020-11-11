<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['superadmin', 'admin', 'user', 'guest'];
        
        DB::table('roles')->insert(['name'=>'superadmin']);
        DB::table('roles')->insert(['name'=>'admin']);
        DB::table('roles')->insert(['name'=>'user']);
        DB::table('roles')->insert(['name'=>'guest']);
        foreach ($roles as $role){
            
        }
    }
}
