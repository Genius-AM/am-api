<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'user_id'];

    public function lists()
    {
        return $this->hasMany(DeskList::class);
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
