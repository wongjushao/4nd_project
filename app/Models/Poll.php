<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = ['title'];
    use HasFactory;
    public function options()
    {
        return $this->hasMany(Option::class);
    }

}
