<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class az_transactions extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var float
     */
    protected $balance;
    public $account_id;
    protected $table = 'az_transactions';
    public $timestamps = true;

}