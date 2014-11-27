<?php

class AdminController extends BaseController{

/*
|--------------------------------------------------------------------------
| Add match function
|--------------------------------------------------------------------------
|	
| #getAdminAddMatch
| #postAdminAddMatch
|
*/
	public function getAdminAddMatch(){

		$team = Team::all();
		return View::make('addmatch')->withTeam($team);
	}

	public function postAdminAddMatch(){
		
		$match = new Match();
		$match->team1 = Input::get('team1');
		$match->team2 = Input::get('team2');
		$match->rate = Input::get('rate');
		$match->save();

		return Redirect::route('admin.addmatch')->withConfirm('Added');
	}

/*
|--------------------------------------------------------------------------
| Add team function
|--------------------------------------------------------------------------
|	
| #getAdminAddTeam
| #postAdminAddTeam
|
*/
	public function getAdminAddTeam(){

		return View::make('addteam');
	}

	public function postAdminAddTeam(){

		$team = new Team();
		$team->name = Input::get('name');
		$team->logo = Input::get('logo');
		$team->save();

		return Redirect::route('admin.addteam')->withConfirm('Added');
	}

}