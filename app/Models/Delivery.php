<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
   
    protected $table = 'delivered';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','articleNo', 'qty','refkey','reqdate','issudate','created_at','updated_at','print'
    ];
}
