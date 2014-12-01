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

		$rule = Match::$rules['addteam'];
		$validation = Validator::make( Input::all(), $rule);

		if( $validation->fails() ){

			return Redirect::route('admin.addteam')->withErrors($validation);

		}else{

			$team = new Team();
			$team->name = Input::get('name');
			$team->logo = Input::get('logo');
			$team->save();

			return Redirect::route('admin.addteam')->withConfirm('Added');
		}		
	}

/*
|--------------------------------------------------------------------------
| Update match result
|--------------------------------------------------------------------------
|	
| #getUpdateResult
| #postUpdateResult
|
*/

	public function getUpdateResult($id){

		$t1 = Match::getMatchesTeam('matchs.team1');

		foreach($t1 as $value){

			$team1[$value->matchid] = $value; 
		}

		$t2 = Match::getMatchesTeam('matchs.team2');

		foreach($t2 as $value){

			$team2[$value->matchid] = $value; 
		}

		return View::make('result')->with( array( 'team1'=>$team1,'team2'=>$team2, 'id'=> $id ));
	}

	public function postUpdateResult($id){

		$user = Auth::User();
		$match = new Match();
		$betmatch = Match::all();
		
		if( Input::get( 'choosen-team' ) == "" )

			return Redirect::route('result', $id);

		$temp = $match::find($id);
		$temp->result = Input::get('choosen-team');
		$temp->save();

		return Redirect::route('result', $id);
	}
}