<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absen';
    protected $primaryKey = 'absen_id';

    protected $fillable = [
        'tanggal','mahasiswa_id','dosen_id','keterangan'
    ];
}
