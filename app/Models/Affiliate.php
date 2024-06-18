<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = ['latitude', 'affiliate_id', 'name', 'longitude'];
}
