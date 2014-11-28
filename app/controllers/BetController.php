<?php

class BetController extends BaseController{

	public function getIndex(){

		$team1 = Match::getMatchesTeam('matchs.team1');

		$team2 = Match::getMatchesTeam('matchs.team2');

		return View::make('index')->with( array( 'team1'=>$team1,'team2'=>$team2) );
	}

	public function getMatch($id){

		$t1 = Match::getMatchesTeam('matchs.team1');
		foreach($t1 as $value){

			$team1[$value->matchid] = $value; 
		}

		$t2 = Match::getMatchesTeam('matchs.team2');

		foreach($t2 as $value){

			$team2[$value->matchid] = $value; 
		}

		return View::make('match')->with( array( 'team1'=>$team1,'team2'=>$team2, 'id'=> $id));
	}

	public function postMatch($id){

		// Add username in userbetmatch table
		$user = Auth::User();
		$userbet = new BetMatch();
		$userbet->iduser = $user->id;
		$userbet->idmatch = $id;
		$userbet->teampick = Input::get('choosen-team');
		$userbet->save();

		return Redirect::route('index');
	}
}

