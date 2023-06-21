<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trielmodel extends Model
{
    use HasFactory;
    protected $table='users';  
    protected $fillable=['name','password','email','created_at','updated_at'];  
}
