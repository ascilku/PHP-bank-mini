<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwTransfer extends Model
{
    use HasFactory;

    protected $table = "riw_tranfer";

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
