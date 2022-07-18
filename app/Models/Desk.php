<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    public function lists()
    {
        return $this->hasMany(DeskList::class);
    }
}
