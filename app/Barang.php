<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['id_jenis','kode_barang','nama_barang','tgl_masuk','amount'];
    public function jenis()
    {
    	return $this->belongsTo('App\Jenis');
    }
}
