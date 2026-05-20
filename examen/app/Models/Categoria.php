<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'logo',
        'family_id',
    ];

    public function familia()
    {
        return $this->belongsTo(Familia::class, 'family_id');
    }
}
