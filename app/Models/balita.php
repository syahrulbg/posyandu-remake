<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balita extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = ['id', 'ibu_id', 'nama_balita', 'tanggal_lahir', 'jenis_kelamin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ibu()
    {
        return $this->belongsTo(Ibu::class);
    }

    public function timbang()
    {
        return $this->hasOne(PenimbanganController::class);
    }
}
