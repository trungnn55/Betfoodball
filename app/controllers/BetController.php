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

			$team1[$value->id] = $value; 
		}

		$t2 = Match::getMatchesTeam('matchs.team2');

		foreach($t2 as $value){

			$team2[$value->id] = $value; 
		}

		return View::make('match')->with( array( 'team1'=>$team1,'team2'=>$team2, 'id'=> $id));
	}

	public function postMatch($id){
		$user = Auth::User();
		$userbet = new Match();
		$ub = Match::find($id);
		$ub->iduserbetteam1 = $user->name;
		$ub->save();
		//$userbet::where('id', '=', $id)->update(array('iduserbetteam1'=>$user->name));
		//$userbet->save();
	}
}

