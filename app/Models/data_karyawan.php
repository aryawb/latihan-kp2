<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_karyawan extends Model
{
	use HasFactory;
	protected $table ='data_karyawan';
	protected $primaryKey = 'id';
	protected $fillable = array('data_file','caption','created_at','updated_at','created_by','updated_by');
}
