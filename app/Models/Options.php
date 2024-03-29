<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $primary_key = null;

    protected $fillable = ['description', 'poll_id'];

    public function poll()
    {
        return $this->belongsTo(Polls::class);
    }

    public function voters()
    {
        return $this->hasMany(Voters::class, 'optionv_id');
    }
    use HasFactory;
}
