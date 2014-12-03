<div id="wrapper" >

        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost:8888/laravel/betfootball/public/index">Home</a>
            <!-- <a class="navbar-brand" href="http://localhost:8888/laravel/betfootball/public/bethistory">Bet History</a> -->
            <!-- <a class="navbar-brand" href="http://localhost:8888/laravel/betfootball/public/changepassword">Change Password</a> -->
        </div>

        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                {{ HTML::linkRoute('logout', 'Logout') }}
            </li>
        </ul>
       <!--  <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                {{ HTML::linkRoute('changepassword', 'Change Password') }}
            </li>
        </ul> -->
        <h2 style ="text-align: center; color: red">NADIA BET FOODBALL GROUP</h2>

    </nav>
</div>
