<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $table = 'books';
    protected $fillable = ['nombre', 'descripcion', 'genero', 'publisher_id'];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
