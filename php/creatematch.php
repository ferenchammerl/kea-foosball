<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php include( "../html/headcontent.html") ?>

<body>

    <!-- Navigation -->
    <?php include( "../html/navigation.html") ?>

    <header class="header">
        <div class="container">
            <div class="jumbotron2">
                <h1>Create match</h1>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron2">
                <div class="row">
                    <div class="col-md-2 col-md-offset-5 text-center"><h2><span class="label label-success">Winners</span></h2></div>
                </div>
                <div class="row">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputfield1" class="col-sm-2 control-label">Player 1</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" class="form-control" id="inputfield1" placeholder="...">
                                </div>
                            </div>

                            <label for="inputfield2" class="col-sm-2 control-label">Player 2</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" class="form-control" id="inputfield2" placeholder="...">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-2 col-md-offset-5 text-center"><h2><span class="label label-danger">Losers</span></h2></div>
                </div>
                <div class="row">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputfield3" class="col-sm-2 control-label">Player 3</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" class="form-control" id="inputfield3" placeholder="...">
                                </div>
                            </div>

                            <label for="inputfield4" class="col-sm-2 control-label">Player 4</label>
                            <div class="col-sm-3 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><a class="glyphicon glyphicon-user"></a></span>
                                    <input type="text" class="form-control" id="inputfield4" placeholder="...">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        <div class="btn btn-primary center-block">
                            OK
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <script type='../text/javascript'>
        var loginWindow = document.getElementById('loginWindow'); <? php
        if (isset($_SESSION['loginfailure']) && $_SESSION['loginfailure']) {
            $_SESSION['loginfailure'] = false;
            echo 'loginWindow.click();';
        } ?>
    </script>

    <script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#search").typeahead({
                name: 'search',
                id: 'search',
                remote: {
                    url: 'search.php?query=%QUERY'
                }

            });
        });
    </script>

</body>

</html>
