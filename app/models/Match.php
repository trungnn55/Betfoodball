<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Match extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'matchs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static function getMatchesTeam($value){
		return DB::table('matchs')->join('teams', $value, '=', 'teams.name')
								->select('matchs.id', 'teams.logo', 'teams.name', 'matchs.rate')
								->orderBy('matchs.id', 'desc')->limit(5)->get();
	}


}