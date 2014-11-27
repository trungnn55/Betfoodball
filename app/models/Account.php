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

	public function getPasswordAttribute($input){

		return ucfirst($input);
	}

	public function setPasswordAttribute($input){
		$this->attributes['password'] = Hash::make($input) ;
	}

}
