<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class az_dealers extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var float
     */
    protected $balance = 0;
	protected $table = 'az_dealers';
	protected $email;
	protected $name;
	protected $password;
	protected $status_;
	protected $expired_datetime;
    public $timestamps = true;

}

