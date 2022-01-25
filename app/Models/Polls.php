<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Polls extends Model
{
    protected $fillable = ['overdue', 'question', 'user_id'];

    public function options()
    {
        return $this->hasMany(Options::class, 'poll_id');
    }

    public static function overdue($tanggal)
    {
        $deadline = date_create(date_format(new DateTime($tanggal), 'Y-m-d H:i'));
        $now = date_create(date("Y-m-d H:i"));
        $diff = date_diff($now, $deadline);
        if ($diff->format('%R') == '-') {
            $check['overdue'] = true;
            $check['status'] = 'Overdue';
        } else {
            $check['overdue'] = false;
            if ($diff->format('%a') == '0') {
                if ($diff->format('%H') == '0') {
                    $check['status'] = $diff->format("%i Menit Tersisa");
                } else {
                    $check['status'] = $diff->format("%h Jam %i Menit Tersisa");
                }
            } else {
                $check['status'] = $diff->format("%a  Hari %h Jam Tersisa");
            }
        }
        return $check;
    }
    use HasFactory;
}
