<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class potoProfile extends Model
{
    use HasFactory;


    protected $guarded = ['profileId'];
    protected $fillable = ['id', 'potoProfile'];

}
