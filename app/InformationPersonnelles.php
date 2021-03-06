<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationPersonnelles extends Model
{
    protected $primaryKey = null;

    public $incrementing = false;

    protected $fillable = [
        'nom',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
