<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwDeposit extends Model
{
    use HasFactory;

    protected $table = "riw_deposit";

    public function deposit()
    {
        return $this->belongsTo('App\Models\Deposit');
    }
    
}
