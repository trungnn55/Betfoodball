    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="text-align: center">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
             <!--    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
 -->                <a class="navbar-brand" href="{{ action('BetController@getIndex') }}">Home</a>
                @if(Auth::user()->manager != 1)
                <a class="navbar-brand" href="{{ action('BetController@getTopMoney') }}">Top</a>
                @else
                    <a class="navbar-brand" href="{{ action('AdminController@getAdminAddMatch') }}">Add Match</a>
                    <a class="navbar-brand" href="{{ action('AdminController@getAdminAddTeam') }}">Add Team</a>
                @endif
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ action('BetController@getBetHistory') }}"><i class="fa fa-fw fa-gear"></i> History</a>
                        </li>
                        <li>
                            <a href="{{ action('AccountController@getChangePassword') }}"><i class="fa fa-fw fa-user"></i> Password</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="{{ action('AccountController@getLogout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>   
            </ul>
            <h2 style="color: red; margin-left: 180px"> NADIA FOOTBALL BET</h2>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          
            <!-- /.navbar-collapse -->
        </nav>
        </div>

        

    <!-- jQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ url('js/plugins/morris/morris.min.js')  }}"></script>
    <script src="{{ url('js/plugins/morris/morris-data.js') }}"></script>

</body>

</html>
