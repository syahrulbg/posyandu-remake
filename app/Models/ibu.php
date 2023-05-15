<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ibu extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'alamat', 'nomorHP', 'ttl', 'jenis_kelamin'];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function anak()
    {
        return $this->hasOne(balita::class);
    }
}
