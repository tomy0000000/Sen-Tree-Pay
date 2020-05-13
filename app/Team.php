<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
							'tid',
							'name',
							'points'
						  ];
	protected $primaryKey = 'tid';
	public $timestamps = false;
}
