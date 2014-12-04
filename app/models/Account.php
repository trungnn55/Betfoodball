<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Account extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
		 'changePassword' => array( 
			'currentPassword'=>'',
			'newPassword'=>'required|min:5',
			'confirmPassword'=>'required|same:newPassword' 
			),

		'register' => array(
			'username' => 'required|min:5|unique:users',
			'password' => 'required|min:5',
			'confirmpassword' => 'required|same:password',
			'name' => 'required|unique:users'
			),
	);

	public static function getTopMoney(){

		return DB::table('users')->select('money', 'name')
								->orderBy('money', 'desc')->get();	
	}

	public static function getUserBet(){

		return DB::table('users')->join('userbetmatch' );
	}

	public function getPasswordAttribute($input){

		return ucfirst($input);
	}

	public function setPasswordAttribute($input){
		$this->attributes['password'] = Hash::make($input) ;
	}

	public static function getRegister(){

			$user = new Account();
			$user->username = Input::get( 'username' );
			$user->password = Input::get( 'password' );
			$user->name = Input::get( 'name' );
	        $user->save();
	}

	public static function getBetMoney(){

		return DB::table('users')->join('userbetmatch', 'users.name', '=', 'userbetmatch.betname')
								->select('userbetmatch.money as money', 'users.id as userid')
								->get();
	}

	public static function getReturnMoney(){

		$totalBetMoney = BetMatch::getTotalBetMoney();
		$betname = BetMatch::getBetName();
		
		foreach($betname as $value){

			$savemoney = Account::find($value->id);
			$savemoney->money = $totalBetMoney[$value->id];
			$savemoney->save();
		}
	}
}
