<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    protected $fillable = ['question', 'option_id'];

    public function options()
    {
        return $this->hasMany('App/Options');
    }
    use HasFactory;
}
