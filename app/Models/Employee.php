<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','image','division_id','position'];

    public function division(){
        return $this->belongsTo(Division::class);
    }
}
