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
                <div class="form-group">
                  <span class="input-group-addon">
                    <label>Winner 1</label>
                  </span>
                  <input id="search" name="search" type="text" class="form-control">
                </div>
                  <div class="form-group">
                  <span class="input-group-addon">
                    <label>Winner 2</label>
                  </span>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <span class="input-group-addon">
                    <label>Loser 1</label>
                  </span>
                  <input type="text" class="form-control">
                </div>
                  <div class="form-group">
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

    
<script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>
    
<script>
$(document).ready(function(){
    var elem = document.getElementsByClassName("form-control");
    for(var i=0; i<elem.length; i++){
    $(elem[i]).typeahead({
        remote: {
        url : 'search.php?query=%QUERY'
        }
        
    });
    }
});
</script>

</body>

</html>
