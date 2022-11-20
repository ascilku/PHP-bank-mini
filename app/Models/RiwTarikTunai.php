<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwTarikTunai extends Model
{
    use HasFactory;

    protected $table = "riw_tariktunai";

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
