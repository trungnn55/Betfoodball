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
		Match::getAddMatch();

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

			Team::getAddTeam();

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
		$match = Match::find($id);
		$rule = Match::$rules['score'];
		$validation = Validator::make(Input::all(), $rule);
		if($validation->fails())
			return Redirect::route('result', $id)->withErrors($validation);

		if(Input::get('team1goal') == '' || Input::get('team2goal') == ''){
			$match->status = Input::get('status');
			$match->save();
			$matchid = BetMatch::getBetMatchId($id)[0]->id;
			BetMatch::find($matchid)->money = '';
			BetMatch::find($matchid)->save();
			return Redirect::route('index');
		}



		$match->result = Input::get('team1goal') . ':' . Input::get('team2goal');

		$key = strpos($match->rate,':');
		$rate1 = substr($match->rate, 0, $key);
		$rate2 = substr($match->rate, $key+1);
		$match->result = Input::get('team1goal') . ':' . Input::get('team2goal');
		$score1 = $rate1 + Input::get('team1goal');
		$score2 = $rate2 + Input::get('team2goal');	
		$match->status = (String)($score1 - $score2);
		
		$match->save();

		BetMatch::getUpdateMoney($id, $score1, $score2);
		Account::getReturnMoney();
				
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

		$key = strpos(Match::find($id)->result,':');
		$score1 = substr(Match::find($id)->result, 0, $key);
		$score2 = substr(Match::find($id)->result, $key+1);

		return View::make('updateresult')->with(array(  'result1'=>$result1, 'result2'=>$result2, 'id'=>$id,
														'score1'=>$score1, 'score2'=>$score2 ));
	}

	public function postReUpdateResult($id){

		$user = Auth::User();
		$match = Match::find($id);
		$rule = Match::$rules['updatescore'];
		$validation = Validator::make(Input::all(), $rule);
		if($validation->fails())
			return Redirect::route('updateresult', $id)->withErrors($validation);

		if(Input::get('result1goal') == '' || Input::get('result2goal') == ''){
			$match->status = Input::get('status');
			$match->result = '';
			$match->save();
			return Redirect::route('index');
		}

		$key = strpos($match->rate,':');
		$rate1 = substr($match->rate, 0, $key);
		$rate2 = substr($match->rate, $key+1);
		$match->result = Input::get('result1goal') . ':' . Input::get('result2goal');
		$score1 = $rate1 + Input::get('result1goal');
		$score2 = $rate2 + Input::get('result2goal');	
		$match->status = (String)($score1 - $score2);
		
		$match->save();

		BetMatch::getUpdateMoney($id, $score1, $score2);
		Account::getReturnMoney($id);

		return Redirect::route('index');
	} 

	public function getDeleteMatch($id){

		Match::destroy($id);

		return Redirect::route('index');
	}
}