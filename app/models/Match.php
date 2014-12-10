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
		'score' => array(
			'team1goal' => 'numeric',
			'team2goal' => 'numeric',
		),
		'updatescore' =>array(
			'result1goal' => 'numeric',
			'result2goal' => 'numeric',
		),
	); 

	public static function getMatchesTeam($value){

		return DB::table('matchs')->join('teams', $value, '=', 'teams.name')
								->select('matchs.id as matchid', 'teams.logo', 'teams.name', 'matchs.rate', 'teams.id as teamid', 'matchs.league', 'matchs.result')
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

	public static function getAddMatch(){

		$match = new Match();
		$match->team1 = Input::get('team1');
		$match->team2 = Input::get('team2');
		$match->rate = Input::get('rate');
		$match->league = Input::get('league');
		$match->save();
	}

	public static function getRate($rate){

		$sum = 0;		

		$rate2_arr_by_space = explode(" ", $rate);

		foreach ($rate2_arr_by_space as $item) {
			$rate2_arr = explode('/', $item);
			if (count($rate2_arr) > 1) {
				$sum += (float)$rate2_arr[0] / (float)$rate2_arr[1];
			}
			else
				$sum += (float)$rate2_arr[0];
		}

		return $sum;
	}
}