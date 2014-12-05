<?php session_start(); require( 'classes/User.php'); if(!isset($_SESSION[ 'user'])) die( 'Access Denied'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- Navigation -->
<?php include( "../html/navigation.html") ?>

<body>
    <header class="header">
        <div class="container">
            <div class="jumbotron2">
                <h1>Top 100 ranking</h1>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron2">
                
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
