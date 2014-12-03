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

	public static $rules = array(
		'addteam' => array(
		 	'name'=>'required|unique:teams',
		 	'logo'=>'required',
		),
		'chooseteam' => array(
			'choose-team'=>'required', 
		),
	); 

	public static function getMatchesTeam($value){

		return DB::table('matchs')->join('teams', $value, '=', 'teams.name')
								->select('matchs.id as matchid', 'teams.logo', 'teams.name', 'matchs.rate', 'teams.id as teamid', 'matchs.league')
								->where('matchs.status', '=', '')
								->orWhere('matchs.status', '=', 'Closed')
								->orderBy('matchs.id', 'desc')->limit(5)->get();
	}

	public static function getResult($value){

		return DB::table('matchs')->join('teams', $value, '=', 'teams.name')
								->select('matchs.id as matchid', 'teams.logo', 'teams.name', 'matchs.rate', 'teams.id as teamid', 'matchs.league')
								->where('matchs.status', '!=', '')
								->where('matchs.status', '!=', 'Closed')
								->orderBy('matchs.id', 'desc')->limit(5)->get();
	}
}