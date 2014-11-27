<?php

class AccountController extends BaseController{

/*
|--------------------------------------------------------------------------
| Login, Logout function
|--------------------------------------------------------------------------
|	
| #getLogin
| #postLogin
| #getLogout
|
*/
	public function getLogin() {

		if( Auth::check() ) {

			return Redirect::route( 'index' );
			
		} else

			return View::make( 'login' );
	}


	public function postLogin() {
		
		$account = array(
			'username' => Input::get( 'username' ),
			'password' => Input::get( 'password' )
		);
		
		if ( Auth::attempt( $account ) ) {

     		return Redirect::route( 'index' );

		} else {
		
			return Redirect::route( 'login' )->withMessage( 'Not correct username or password!' );
		
		}
	}

	

	public function getLogout() {
	
		Auth::logout();
	
		return Redirect::route( 'login' );
	}

/*
|--------------------------------------------------------------------------
| Register function
|--------------------------------------------------------------------------
|	
| #getRegister
| #postRegister
|
*/
	// getRegister
	public function getRegister() {

		return View::make('register');
	}

	// postRegister
	public function postRegister() {

		$rule = Account::$rules[ 'register' ];
		$input = Input::all();
		$validation = Validator::make( $input, $rule );
		
		if( $validation ->fails() ) {

			return Redirect::route( 'register' )->withErrors( $validation );

		} else {

			$user = new Account();
			$user->username = Input::get( 'username' );
			$user->password = Input::get( 'password' );
			$user->name = Input::get( 'name' );
	        $user->save();	
	        
	        return Redirect::route( 'login' )->withNotification( 'Register successfull' );
        }
	}

	
/*
|--------------------------------------------------------------------------
| Password function
|--------------------------------------------------------------------------
|	
| #getChangePassword
| #postChangePassword
|
*/

	public function getChangePassword() {

		if( Auth::check() )

			return View::make( 'password' );

		else

			return Redirect::route( 'login' );
	}


	public function postChangePassword() {

		$rule = Account::$rules[ 'changePassword' ];

		$validation = Validator::make( Input::all(), $rule );

		if( $validation->fails() ) {

					return Redirect::route( 'changepassword' )->WithErrors( $validation );

		} else {
			
			if( Hash::check( Input::get( 'currentPassword' ), Auth::user()->password ) ) {

				$user = Auth::user();
				$user->password = Input::get('newPassword');
				$user->save();

				return Redirect::route( 'index' );

			} else {

				return Redirect::route( 'changepassword' )->withMessage( 'Current Password not correct' );

			}			
		}
	}
}