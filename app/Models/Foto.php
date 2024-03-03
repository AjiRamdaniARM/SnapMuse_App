<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = "fotos";
    protected $guarded = ['fotoID','update_at','crated_at'];

    public function category()
    {
        return $this->belongsTo(category::class, 'categoryName');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function Likefoto()
    {
        return $this->belongsTo(Likefoto::class, 'likeID');
    }

    // protected $fillable = ['id_foto', 'nama', 'deskripsi', 'alamat', 'foto'];
}
