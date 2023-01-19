<?php
      require 'INCLUIDOR.php';

            
            $verboso = false;
      
            if(!isset($_SESSION)) 
            { 
                  session_start();
      
                  if($verboso)
                  {
                        echo "INICIANDO SESSION";
                  }
            }
      
      
            if(isset($_SESSION['STEP']))
            { 
                  $step = $_SESSION['STEP'];
                  
                  if($step == -1)
                  {
                        $step = 1;
                        $_SESSION['STEP'] = (int) $step;
                  }
      
      
      
      
                  if($verboso)
                  {
                        echo "STEP:" . $step ."<br>";
                  }
      
      
      
                  
      
                  if($step == 1)
                  {
                        $step = 2;
                        compilar("index",false);
                        $_SESSION['STEP'] = (int) $step;
                        // sleep(1);
                        header("Refresh:0");
                        
                        
                        
                        if($verboso)
                        {
                              echo "ENTRE 1 PONGO EN 2";
                        }
                  }
                  else if ($step == 2)
                  {
                        $step = 3;
                        compilar("index",false);
                        $_SESSION['STEP'] = (int) $step;
                        header("Refresh:0");
                        // header("Location: http://localhost/FRONT-START/index.php".$step);
                        
                        
                        if($verboso)
                        {
                              echo "ENTRE 2 PONGO EN 3";
                        }
                  }
                  else if ($step == 3)
                  {
                        $step = 1;
                        compilar("index",false);
                        $_SESSION['STEP'] = (int) $step;
                        // sleep(3);
                        // header("Refresh:0");
                        // header("Location: http://localhost/FRONT-START/index.php".$step);
                        
                        
                        
                        
                        if($verboso)
                        {
                              echo "ENTRE 3 PONGO EN 1";
                        }
                  }
            }
            else
            {
                  compilar("index",false);
                  $_SESSION['STEP'] = 1;
                  header("Refresh:0");
                  
                  
                  
                  if($verboso)
                  {
                        echo "NO HABIA VARIABLE DE SESSION";
                  }
            }
?>

<head>


      <!-- COLOR BARRA : -->
      <meta content="width=device-width, user-scalable=no" name="viewport">
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#E36B2C">

      <!-- FAVICON : -->
      <link rel="icon" href="assets/images/apmticon.ico" />


      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>

      <!-- BS4: -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

      <!-- FONT AWESOME: -->
      <script src="https://kit.fontawesome.com/01ed377a67.js" crossorigin="anonymous"></script>
      
      <!-- FONTS: -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
      
      <!-- DE ACA SE PUEDE BORRAR: -->
      <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
      <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet" /> -->
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
      <!-- <script async defer src="https://apis.google.com/js/platform.js"></script> -->





</head>