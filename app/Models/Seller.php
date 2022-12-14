<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable =['user_id', 'nama_warung', 'deskripsi'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
