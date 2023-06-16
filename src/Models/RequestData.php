<?php

namespace sharkey97\weatherfromip\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestData extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}