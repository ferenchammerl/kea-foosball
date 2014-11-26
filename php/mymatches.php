<?php session_start(); if(!isset($_SESSION['user'])) die('Access Denied'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Foosball</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>

    <!-- Navigation -->
    <?php include( "../html/navigation.html") ?>


    <header class="header">
        <div class="container">
            <div class="jumbotron2">
                <h1>Match history</h1>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron2">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                60%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jumbotron2" style="padding-top: 2px;">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="widget">
                            <div class="widget-header">
                                <div class="title">
                                    <ul class="list-inline">
                                        <li>
                                            <h2><span class="label label-default">Match#007</span></h2>
                                        </li>
                                        <li>
                                            <h2><span class="label label-default">14-11-2014</span></h2>
                                        </li>
                                    </ul>
                                    <h2><span class="label label-success">Won</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="widget-body">
                                <table class="table table-responsive table-striped table-bordered table-hover no-margin">
                                    <thead>
                                        <tr class="active">
                                            <th style="width:15%">
                                                Player name
                                            </th>
                                            <th style="width:15%">
                                                Rank
                                            </th>
                                            <th style="width:10%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="success">
                                            <td>
                                                <span class="name">Winner1</span>
                                            </td>
                                            <td>
                                            #567
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-success">Confirm</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="success">
                                            <td>
                                                <span class="name">Winner2</span>
                                            </td>
                                            <td>
                                            #224
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-success">Confirm</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            <h2><span class="label label-danger">Lost</span></h2>
                            <table class="table table-responsive table-striped table-bordered table-hover no-margin">
                                <thead>
                                    <tr class="active">
                                        <th style="width:15%">
                                            Player name
                                        </th>
                                        <th style="width:15%">
                                            Rank
                                        </th>
                                        <th style="width:10%">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="danger">
                                        <td>
                                            <span class="name">Loser1</span>
                                        </td>
                                        <td>
                                        #342
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-success">Confirm</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="danger">
                                        <td>
                                            <span class="name">Loser2</span>
                                        </td>
                                        <td>
                                        #3021
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-success">Confirm</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


    </header>

</body>

</html>
