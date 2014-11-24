<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php include("../html/headcontent.html") ?>

<body>

<!-- Navigation --><?php include("../html/navigation.html") ?>

<header class="header">
    <div class="container">
        <div class="jumbotron">
            <h1>Create match</h1>
        </div>
    </div>
    
    <div class="container">
        <div class="jumbotron2">
            <div class="row">
              <div class="col-lg-4 col-lg-offset-2">
                <div class="input-group">
                  <span class="input-group-addon">
                    <label>Winner 1</label>
                  </span>
                  <input type="text" class="form-control">
                </div>
                  <div class="input-group">
                  <span class="input-group-addon">
                    <label>Winner 2</label>
                  </span>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="input-group">
                  <span class="input-group-addon">
                    <label>Loser 1</label>
                  </span>
                  <input type="text" class="form-control">
                </div>
                  <div class="input-group">
                  <span class="input-group-addon">
                    <label>Loser 2</label>
                  </span>
                  <input type="text" class="form-control">
                </div>
              </div>
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
    var loginWindow = document.getElementById('loginWindow');
    <?php if (isset($_SESSION['loginfailure'])&&$_SESSION['loginfailure']){ $_SESSION['loginfailure']=false; echo 'loginWindow.click();';}?>
</script>


</body>

</html>
