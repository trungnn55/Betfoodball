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
		$league = Team::$league;
		return View::make('addmatch')->with(array('team'=>$team,'league'=>$league));
	}

	public function postAdminAddMatch(){
		//dd(substr(Input::get('rate'),2));
		$match = new Match();
		$match->team1 = Input::get('team1');
		$match->team2 = Input::get('team2');
		$match->rate = Input::get('rate');
		$match->league = Input::get('league');
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

		return View::make('addteam')->withLeague(Team::$league);
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
		$temp = $match::find($id);

		if(Input::get('team1goal') == '' || Input::get('team2goal') == ''){
			$temp->status = Input::get('status');
			$temp->save();
			return Redirect::route('index');
		}



		$temp->result = Input::get('team1goal') . ':' . Input::get('team2goal');

		if(($match::find($id)->rate[0] + Input::get('team1goal')) > ($match::find($id)->rate[2] + Input::get('team2goal')))
			$temp->status = $match::find($id)->team1;
		else if(($match::find($id)->rate[0] + Input::get('team1goal')) < ($match::find($id)->rate[2] + Input::get('team2goal')))
			$temp->status = $match::find($id)->team2;
		else
			$temp->status = "Hoà";
		$temp->save();

		return Redirect::route('index');
	}


	/*---------------------------------------------
	|
	|	function getReUpdateResult 
	|	function postReUpdateResult
	*/ 
	public function getReUpdateResult($id){

		$r1 = Match::getResult('matchs.team1');

		foreach($r1 as $value){

			$result1[$value->matchid] = $value; 
		}

		$r2 = Match::getResult('matchs.team2');

		foreach($r2 as $value){

			$result2[$value->matchid] = $value; 
		}

		return View::make('updateresult')->with(array('result1'=>$result1, 'result2'=>$result2, 'id'=>$id));
	}

	public function postReUpdateResult($id){

		$user = Auth::User();
		$match = new Match();
		$betmatch = Match::all();
		$temp = $match::find($id);

		if(Input::get('result1goal') == '' || Input::get('result2goal') == ''){
			$temp->status = Input::get('status');
			$temp->result = '';
			$temp->save();
			return Redirect::route('index');
		}

		$temp->result = Input::get('result1goal') . ':' . Input::get('result2goal');

		if(($match::find($id)->rate[0] + Input::get('result1goal')) > ($match::find($id)->rate[2] + Input::get('result2goal')))
			$temp->status = $match::find($id)->team1;
		else if(($match::find($id)->rate[0] + Input::get('result1goal')) < ($match::find($id)->rate[2] + Input::get('result2goal')))
			$temp->status = $match::find($id)->team2;
		else
			$temp->status = "Hoà";
		$temp->save();

		return Redirect::route('index');
	} 
}