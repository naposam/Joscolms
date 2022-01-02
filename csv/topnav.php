	<div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation"  style="background-color: rgba(0,0,0,0.3);">
            <div class="container">
                <div class="navbar-header">
                    <a  id="logo" class="navbar-brand" href="#">
                    	<p><img src="../img/logo.jpg" height="20px" width="20px">
                    	&nbsp;&nbsp;&nbsp;WELCOME: <?php echo $_SESSION['sess_user_name'];?></p></a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                  <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="#"><?php echo date('Y-m-d'); ?></a> </li>
                         
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                    </ul>
                </div>
               
             
            
            </div>
        </div>