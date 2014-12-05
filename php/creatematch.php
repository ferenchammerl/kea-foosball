<?php session_start(); require( 'classes/User.php'); if(!isset($_SESSION[ 'user'])) die( 'Access Denied'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- Navigation -->
<?php include( "../html/navigation.html") ?>

<body>
    <header class="header">
        <div class="container">
            <div class="jumbotron2">
                <h1>Create match</h1>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron2">
                <div class="row">
                    <div class="col-md-2 col-md-offset-5 text-center">
                        <h2><span class="label label-success">Winners</span></h2>
                    </div>
                </div>
                <form action="creategame.php" class="form-horizontal" role="form" method="POST">
                    <div class="row">

                        <div class="form-group">
                            <label for="inputfield1" class="col-sm-2 control-label">Player 1</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" name="win1" class="form-control" id="inputfield1" placeholder="...">
                                </div>
                            </div>

                            <label for="inputfield2" class="col-sm-2 control-label">Player 2</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" name="win2" class="form-control" id="inputfield2" placeholder="...">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2 col-md-offset-5 text-center">
                            <h2><span class="label label-danger">Losers</span></h2>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group">
                            <label for="inputfield3" class="col-sm-2 control-label">Player 3</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" name="los1" class="form-control" id="inputfield3" placeholder="...">
                                </div>
                            </div>

                            <label for="inputfield4" class="col-sm-2 control-label">Player 4</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" name="los2" class="form-control" id="inputfield4" placeholder="...">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <label for="locationfield" class="col-xs-12 control-label" style="text-align:center;">Location</label>
                    </div>
                    <div class="row">
                        <div class="col col-xs-3"></div>
                            <div class="col-xs-6 col-lg-6 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="fa fa-location-arrow"></a></span>
                                    <input type="text" name="locfield" class="form-control" id="locationfield" placeholder="...">
                                </div>
                            </div>
                        <div class="col col-xs-2"> </div>
                    </div>
                    <div class="row">
                        <div class="col col-xs-12" style="text-align:center;">
                            <button type="submit" class="btn btn-block btn-primary" >
                                OK
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </header>



    <script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>

    <script>
        $(document).ready(function () {
            var elem = document.getElementsByClassName("form-control");
            for (var i = 0; i < elem.length; i++) {
                $(elem[i]).typeahead({
                    remote: {

                        url: 'search.php?query=%QUERY'
                    }

                });
            }
        });
    </script>


</body>

</html>
