<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Arsip extends Model
{
    use HasFactory , Notifiable;
    protected $table = 'arsips';
    
    protected $fillable = [
        'NamaDokumen','Keterangan','NamaDesa','Tahun','LokasiPenyimpanan','NamaFile',
    ];

}
