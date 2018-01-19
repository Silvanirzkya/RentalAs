<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sample Peminjaman Barang
        $member = User::where('email','member@gmail.com')->first();
        BorrowLog::create(['user_id' => $member->id, 'barang_id'=>$barang1->id,'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'barang_id'=>$barang2->id,'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'barang_id'=>$barang3->id,'is_returned' => 1]);

    }
}
