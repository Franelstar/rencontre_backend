<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationPhysiques extends Model
{
    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
