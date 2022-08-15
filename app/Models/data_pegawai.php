<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pegawai extends Model
{
	use HasFactory;
	protected $table ='data_pegawai';
	protected $primaryKey = 'id';
	protected $fillable = ['nama','nik','email','alamat','jabatan','bio','file_profile','file_sampul','created_at','updated_at'];
}
