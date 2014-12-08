<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Team extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teams';

	public static $league = array( 'Premier League'=>'Premier League', 
												'Champion League'=>'Champion League',
												'La Liga'=>'La Liga',
												'Bundesliga'=>'Bundesliga',
												'Serie A'=>'Serie A',
								);

	public static function getTeamWin(){

		return DB::table('teams')->join('matchs', 'matchs.result', '=', 'teams.id')
								->select('teams.name');
	}

	public static function getAddTeam(){

		$team = new Team();

		$team->name = Input::get('name');
		$img = Input::file('logo');
		$path = public_path().'/image';
		$fileName =$img->getClientOriginalName();
		if($img->move($path, $fileName)){
			$team->logo = 'image/' . $fileName;
			$team->save();

		};
		
	}

	/**~
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
}