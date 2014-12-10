<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BetMatch extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'userbetmatch';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'password', 'remember_token' );

	public static function getBetUser(){

		return DB::table( 'userbetmatch' )->join( 'users', 'users.id', '=', 'userbetmatch.betname' )
										->select( 'userbetmatch.id' )->get();
	}

	public static function getShowUserBetMatch($matchid, $teamname){

		return DB::table('userbetmatch')->where( 'idmatch', '=', $matchid )
										->where( 'teampick', '=', $teamname )
										->select( 'betname', 'betmoney', 'money')
										->get();
	}
	
	public static function getBetMatchId($id){

		return DB::table('userbetmatch')->where('idmatch', '=', $id)
										->select('id')
										->get();
	}

	public static function getUpdateMoney($id, $score1, $score2){

		// Update Money
		$returnMoney = new BetMatch();
		$money = (String)($score1 - $score2);

		if($money > 0.25)
			foreach( $returnMoney::getBetMatchId($id) as $value ){
				$betmatch = BetMatch::find($value->id);
				if($betmatch->teampick == Match::find($id)->team1 )

					$betmatch->money = $betmatch->betmoney;
				
				else 

					$betmatch->money = -$betmatch->betmoney;
				$betmatch->save();
			}

		else if($money == 0.25)
			foreach( $returnMoney::getBetMatchId($id) as $value ){
				$betmatch = BetMatch::find($value->id);
				if($betmatch->teampick == Match::find($id)->team1 )

					$betmatch->money = $betmatch->betmoney/2;
				
				else 

					$betmatch->money = -$betmatch->betmoney/2;
				$betmatch->save();
			}

		else if ($money == 0)
			foreach( $returnMoney::getBetMatchId($id) as $value ){
				$betmatch = BetMatch::find($value->id);
					$betmatch->money = 0;
				$betmatch->save();
			}
		else if($money == -0.25)
			foreach( $returnMoney::getBetMatchId($id) as $value ){
				$betmatch = BetMatch::find($value->id);
				if($betmatch->teampick == Match::find($id)->team1 )

					$betmatch->money = -$betmatch->betmoney/2;
				
				else 

					$betmatch->money = $betmatch->betmoney/2;
				$betmatch->save();
			}
		else
			foreach( $returnMoney::getBetMatchId($id) as $value ){
				$betmatch = BetMatch::find($value->id);
				if($betmatch->teampick == Match::find($id)->team1 )

					$betmatch->money = -$betmatch->betmoney;
				
				else 

					$betmatch->money = $betmatch->betmoney;
				$betmatch->save();
			}
	}

// Get Money Bet
	public static function getBetName(){

		return DB::table('userbetmatch')->join('users', 'users.name', '=', 'userbetmatch.betname')
										->select('userbetmatch.betname', 'users.id')
										->groupBy('betname')
										->orderBy('users.id')->get();
	}

	public static function getTotalBetMoney(){
		
		$betName =  BetMatch::getBetName();
		if($betName == null){
			dd($betName);
			$totalBetMoney = 0;}
		else
		foreach($betName as $value)
			$totalBetMoney[$value->id] = DB::table('userbetmatch')->where('betname', '=', $value->betname)->sum('money');

			return $totalBetMoney;
	}


// Bet History
	public static function getBetMatch($user){

		return DB::table('userbetmatch')->join('matchs', 'userbetmatch.idmatch', '=', 'matchs.id')
										->select('userbetmatch.betname', 'matchs.team1', 'matchs.team2', 'matchs.status', 'money', 'teampick', 'matchs.result', 'matchs.id')
										->where('betname', '=', $user)
										->orderBy('matchs.created_at', 'asc')
										->get();
	}

}
