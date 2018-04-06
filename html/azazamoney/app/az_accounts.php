<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class az_accounts extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var float
     */
    public $balance;
    protected $table = 'az_accounts';
    public $timestamps = true;

}