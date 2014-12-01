<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BetMatch extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'userbetmatch';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'password', 'remember_token' );

	public static function getBetUser(){

		return DB::table( 'userbetmatch' )->join( 'users', 'users.id', '=', 'userbetmatch.betname' )
										->select( 'userbetmatch.id' )->get();
	}

	public static function getShowUserBetMatch($matchid, $teamid){

		return DB::table('userbetmatch')->where( 'userbetmatch.idmatch', '=', $matchid )
										->where( 'userbetmatch.teampick', '=', $teamid )
										->select( 'userbetmatch.betname' )->get();
	}
}
