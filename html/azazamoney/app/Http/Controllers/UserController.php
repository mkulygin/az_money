<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function returningASimplePage()
    {
        return view('welcome2');
    }    
}

/*

class DealerController extends Controller
{

    public function index()
    {
        $u = DB::select('select * from dealers where active = ?', [1]);

        return view('dealer.index', ['dealers' => $u]);
    }
}

class AccountController extends Controller
{

    public function index()
    {
        $u = DB::select('select * from accounts where active = ?', [1]);

        return view('account.index', ['accounts' => $u]);
    }
}

class TransactionController extends Controller
{

    public function index()
    {
        $users = DB::select('select * from transactions where active = ?', [1]);

        return view('transaction.index', ['transactions' => $users]);
    }
}
*/
