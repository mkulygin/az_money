<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/v1/noauth/newaccount/{dealer_id}/', function($dealer_id)
{
	
	$err = "false";
	$LastInsertId = 0;
	$status = 0;
	try{	
		$account = new  App\az_accounts();
		$account->status_ = 'opened';
		$account->balance = 0;
		$account->dealer_id = $dealer_id;
		DB::beginTransaction();
		$account->save();
		$LastInsertId = $account->id;
		DB::commit();
		$status = 201;
    }
	catch(exception $e){
		DB::rollback();
		$err = $e->getMessage();
		$status = 400;
	}
	
    return Response::json(array(
                'error' => $err,
                'new_account_id' => $LastInsertId,
                'status_code' => $status
            ));
});

Route::post('/v1/noauth/newdealer/{email}/{password}', function($email, $password)
{
	$err = "false";
	$LastInsertId = 0;
	$status = 0;
	try{
		$account = new  App\az_dealers();
		$account->email = $email;
		$account->password = $password;
		
		DB::beginTransaction();
		$account->save();
		$LastInsertId = $account->id;
		DB::commit();
		$status = 201;
	}
	catch(exception $e){
		DB::rollback();
		$err = $e->getMessage();
		$status = 400;
	}
	
    return Response::json(array(
                'error' => $err,
                'new_account_id' => $LastInsertId,
                'status_code' => $status
            ));
});

Route::post('/v1/noauth/addmoney/{account_id}/{sum}', function($account_id, $sum)
{
	$err = "false";
	$LastInsertId = 0;
	$status = 0;
	$balance = 0;
	try{	
		$account = App\az_accounts::find($account_id, array('id', 'balance'));
		$account->balance += abs($sum);
		
		$tr = new App\az_transactions();
		$tr->sum = abs($sum);
		$tr->action = 'add money';
		$tr->account_id = $account_id;
		
		DB::beginTransaction();
		$account->save();
		$tr->save();
		DB::commit();
		$status = 201;
		$balance = $account->balance;
    }
	catch(exception $e){
		DB::rollback();
		$err = $e->getMessage();
		$status = 400;
	}
	
    return Response::json(array(
                'error' => $err,
                'balance' => $balance,
                'status_code' => $status
            ));
});

Route::post('/v1/noauth/reccurentpayment/{account_id}/{sum}', function($account_id, $sum)
{
	
	$err = "false";
	$LastInsertId = 0;
	$status = 0;
	$balance = 0;
	try{
		$account = App\az_accounts::find($account_id, array('id', 'balance', 'dealer_id'));
		$dealer = App\az_dealers::find($account->dealer_id, array('id', 'expired_datetime'));
		if($dealer->expired_datetime)
			$exprired_datetime = new DateTime($dealer->expired_datetime);
		else
			$exprired_datetime = new DateTime(date('Y-m-d H:i:s'));

		$exprired_datetime->modify('+1 month');
		
		$dealer->expired_datetime = $exprired_datetime;
		$account->balance -= abs($sum);

		$tr = new App\az_transactions();
		$tr->sum = -abs($sum);
		$tr->action = 'dec recurrent';
		$tr->account_id = $account_id;
		
		DB::beginTransaction();
		$account->save();
		$dealer->save();
		$tr->save();
		DB::commit();
		$status = 201;
		$balance = $account->balance;
    }
	catch(exception $e){
		DB::rollback();
		$err = $e->getMessage();
		$status = 400;
	}
	
    return Response::json(array(
                'error' => $err,
                'balance' => $balance,
                'status_code' => $status
            ));
});

Route::get('/v1/noauth/getbalance/{account_id}', function($account_id)
{
	$err = "false";
	$status = 0;
	$balance = 0;
	try{	
		$account = App\az_accounts::find($account_id, array('id', 'balance'));
		$status = 200;
		$balance = $account->balance;
    }
	catch(exception $e){
		$err = $e->getMessage();
		$status = 400;
	}
	
    return Response::json(array(
                'error' => $err,
                'balance' => $balance,
                'status_code' => $status
            ));
});

Route::get('/v1/noauth/getbalancedealer/{d_id}', function($d_id)
{
	$err = "false";
	$status = 0;
	$balance = 0;
	try{	
		$account = App\az_accounts::where('dealer_id','=',$d_id)->first();
		$status = 200;
		$balance = $account->balance;
    }
	catch(exception $e){
		$err = $e->getMessage();
		$status = 400;
	}
	
    return Response::json(array(
                'error' => $err,
                'balance' => $balance,
                'status_code' => $status
            ));
});

Route::get('/v1/noauth/transactions/{account_id}', function($account_id)
{
	$err = "false";
	$status = 0;
	$trs = "";
	try{	
		$trs = App\az_transactions::where('account_id','=',$account_id)->get();
		$status = 200;
    }
	catch(exception $e){
		$err = $e->getMessage();
		$status = 400;
	}
	
    return Response::json(array(
                'error' => $err,
                'transactions' => $trs,
                'status_code' => $status
            ));
});