<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use HasFactory;

    protected $table = 'wines';
    protected $fillable = ['name', 'vinery', 'grape_variety', 'vintage', 'price'];
    protected $visible = ['id', 'name', 'vinery', 'grape_variety', 'vintage', 'price'];
}
