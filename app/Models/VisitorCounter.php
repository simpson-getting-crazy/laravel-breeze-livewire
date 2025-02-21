<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorCounter extends Model
{
    protected $table = 'visitor_counters';
    protected $guarded = ['id'];
}
