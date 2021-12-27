<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $fillable = ['options_id', 'description', 'voters'];

    public function poll()
    {
        return $this->belongsTo('App/Polls');
    }
    use HasFactory;
}
