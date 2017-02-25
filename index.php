<html>
    <head>
      <meta charset="UTF-8">
      <title>Inventory</title>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 <link rel="stylesheet" href="awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/adminku.css" type="text/css">
<link rel="stylesheet" href="css/login.css" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
    </head>
    <body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="login.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" placeholder="Username" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                LOGIN</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 </body>
</html>



<!--
<html>
    <head>
      <meta charset="UTF-8">
      <title>Inventory</title>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 <link rel="stylesheet" href="awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/adminku.css" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="form-box form-login" id="login-box">
            <div class="header">Inventory</div>
            <form action="login.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                </div>
                <div class="footer bg-gray">                                                               
                    <button type="submit" class="btn bg-blue btn-block">LOGIN</button>  
                 
                </div>
            </form>
        </div>
    </body>
</html>
-->