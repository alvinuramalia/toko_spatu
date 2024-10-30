<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $table = 'admin';
    
    public function user(){
        return $this->hasOne(User::class , 'admin_id');
    }

    public function datajual(){
        return $this->hasMany(Datajual::class, 'admin_id');
    }

}
