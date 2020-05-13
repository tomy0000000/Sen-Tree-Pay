<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $fillable = ['name', 'sid', 'password', 'role', 'tid'];
    public $timestamps = false;
    public $primaryKey = 'sid';

    /* to team */
    public function team() {
        return $this->belongsTo('App\Team', 'tid', 'tid');
    }
}
