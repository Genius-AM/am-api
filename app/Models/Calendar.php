<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'color_id'
    ];
}
