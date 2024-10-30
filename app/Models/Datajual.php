<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datajual extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    protected $table = 'datajual';
    
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
