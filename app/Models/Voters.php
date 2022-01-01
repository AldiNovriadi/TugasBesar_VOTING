<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    protected $fillable = ['pollv_id', 'optionv_id', 'user_id'];
    use HasFactory;
}
