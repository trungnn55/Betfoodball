<?php

class BetController extends BaseController{

	public function getIndex(){

		$team1 = Match::getMatchesTeam('matchs.team1');
		$team2 = Match::getMatchesTeam('matchs.team2');

		$result1 = Match::getResult('matchs.team1');
		$result2 = Match::getResult('matchs.team2');

		$teamwin = Team::getTeamWin();

		return View::make('index')->with( array( 'team1'=>$team1,'team2'=>$team2, 'result1'=>$result1, 'result2'=>$result2) );
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

		$userbet = new BetMatch();
		$userbetteam1 = $userbet::getShowUserBetMatch($id, $team1[$id]->teamid);
		$userbetteam2 = $userbet::getShowUserBetMatch($id, $team2[$id]->teamid);

		return View::make('match')->with( array( 'team1'=>$team1,'team2'=>$team2, 'id'=> $id, 'userbetteam1'=>$userbetteam1, 'userbetteam2'=>$userbetteam2 ));
	}

	public function postMatch($id){

		// Add username in userbetmatch table
		$user = Auth::User();
		$userbet = new BetMatch();
		$userbetmatch = BetMatch::all();

		if( Input::get( 'choosen-team' ) == "" )

			return Redirect::route('match',$id);

		foreach($userbetmatch as $value){

			if( $value->idmatch == $id && $value->betname == $user->name){

				$temp = $userbet::find($value->id);
				$temp->teampick = Input::get('choosen-team');
				$temp->save();
			
				return Redirect::route('match', $id);
			}
		}

		// dd($user->name);
		$userbet->betname = $user->name;
		$userbet->idmatch = $id;
		$userbet->teampick = Input::get('choosen-team');
		$userbet->save();

		return Redirect::route('match',$id);
	}
}