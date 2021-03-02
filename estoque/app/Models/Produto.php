<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = array('title', 'price', 'quantidade', 'marca_id');

    public function marca() {
        return $this->belongsTo('App\Models\Marca', 'marca_id');
    }
}
