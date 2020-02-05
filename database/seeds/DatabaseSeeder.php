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
        array('nama'=>'Super Admin', 'password'=>bcrypt('super'),'nipbps'=>'520000000','nipbaru'=>'520000000','email'=>'admin@bpsntb.id','username'=>'admin','jabatan'=>'Kepala','satuankerja'=>'Admin BPSNTB','kodebps'=>'5200','urlfoto'=>'https://via.placeholder.com/100x100','jk'=>'1','mitra'=>'1','aktif'=>'1','level'=>'9','isLokal'=>'1','created_at'=>NOW(),'updated_at'=>NOW()),
         ));
         //kode bps
         DB::table('t_kodebps')->delete();
        //insert some dummy records
        DB::table('t_kodebps')->insert(array(
        array('bps_kode'=>'5200', 'bps_nama'=>'BPS Provinsi NTB', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5201', 'bps_nama'=>'BPS Kabupaten Lombok Barat', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5202', 'bps_nama'=>'BPS Kabupaten Lombok Tengah', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5203', 'bps_nama'=>'BPS Kabupaten Lombok Timur', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5204', 'bps_nama'=>'BPS Kabupaten Sumbawa', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5205', 'bps_nama'=>'BPS Kabupaten Dompu', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5206', 'bps_nama'=>'BPS Kabupaten Bima', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5207', 'bps_nama'=>'BPS Kabupaten Sumbawa Barat', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5208', 'bps_nama'=>'BPS Kabupaten Lombok Utara', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5271', 'bps_nama'=>'BPS Kota Mataram', 'created_at'=>NOW(),'updated_at'=>NOW()),
        array('bps_kode'=>'5272', 'bps_nama'=>'BPS Kota Bima', 'created_at'=>NOW(),'updated_at'=>NOW()),
         ));
    }
}
