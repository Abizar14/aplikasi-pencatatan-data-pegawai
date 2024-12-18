<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawais";
    protected $fillable = [
        'user_id',
        'jabatan',
        'tanggal_bergabung',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
