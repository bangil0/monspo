<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('t_level')->delete();
        //insert some dummy records
        DB::table('t_level')->insert(array(
        array('level_id'=>'1', 'level_nama'=>'Pemantau', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('level_id'=>'2', 'level_nama'=>'Pengentri', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('level_id'=>'3', 'level_nama'=>'Pengawas', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('level_id'=>'4', 'level_nama'=>'Admin', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('level_id'=>'9', 'level_nama'=>'Superadmin', 'created_at'=>NOW(),'updated_at'=>NOW()),
         ));
         //add superadmin
         DB::table('users')->delete();
        //insert some dummy records
        DB::table('users')->insert(array(
        array('nama'=>'Super Admin', 'password'=>bcrypt('super'),'nipbps'=>'520000000','nipbaru'=>'520000000','email'=>'admin@bpsntb.id','username'=>'admin','jabatan'=>'Kepala','satuankerja'=>'Admin BPSNTB','urlfoto'=>'','jk'=>'1','mitra'=>'1','aktif'=>'1','level'=>'9','isLokal'=>'1','created_at'=>NOW(),'updated_at'=>NOW()),
         ));
    }
}
