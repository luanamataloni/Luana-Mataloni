<html>      <?php
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
      
      
      
      
      
      </head>      <body ng-app="app" ng-controller="ctl" ng-init="init()" ng-cloak class="body sin-padding col-12">		<div class="contenedor-listado-casas flex">
		
		    
		    <div class="casa" ng-repeat="casaRepetir in coleccionCasas">
		        <img class="img-casa" ng-src="{{casaRepetir.foto}}">
		        
		        <div class="textos-casa">
		
		            <h2 class="titulo">{{casaRepetir.titulo}}</h2>
		            <h3 class="ubicacion">
		                <i class="fa-regular fa-map-location-dot"></i>
		                {{casaRepetir.ubicacion}}
		            </h3>
		            <p class="descripcion">{{casaRepetir.descripcion}}</p>
		
		            <div class="boton-padre flex">
		
		                <div class=" hijo1 col-6 flex-center">
		                    <button class="button">{{"$" + casaRepetir.precio}}</button>
		                </div>
		
		                <div class="hijo2 col-6">
		                    <button class="button-view ">{{casaRepetir.view}}</button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>          
		
		<style>
		    
		    .button {
		        background-color: #0609c5;
		        border: none;
		        color: white;
		        padding-left: 15px;
		        padding-right: 15px;
		        padding-top: 12px;
		        margin: 4px 2px;
		        text-align: center;
		        text-decoration: none;
		        display: inline-block;
		        font-size: 16px;
		        cursor: pointer;
		        border-radius: 18px;
		        
		    }
		    
		    .flex {
		        display: flex;
		        flex-direction: row;
		    }
		    .casa
		    {
		        border: solid 1px rgb(196, 196, 196);
		        /* padding: 25px; */
		        padding-left: 0;
		        padding-right: 0;
		        padding-top: 0;
		        /* height: 300px; */
		        width: 350px;
		        border-radius: 20px;
		        float: left;
		        overflow: hidden;
		        margin-left: 15px;
		        margin-right: 15px;
		    }
		    .img-casa
		    {
		
		        width: 100%;
		        height: 50%;
		    }
		   /*  .textos-casa
		    {
		        padding-left: 15px;
		        padding-right: 15px;
		        padding-top: 12px;
		    } */
		
		    h2 {
		        font-family: "Montserrat", sans-serif;
		        font-style: 400;
		        font-size: 26px;
		        padding-left: 15px;
		        padding-right: 15px;
		        padding-top: 10px;
		        
		    }
		
		    h3{
		        font-family: "Montserrat", sans-serif;
		        font-style: 300;
		        font-size: 14px; 
		        padding-left: 15px;
		        padding-right: 15px;
		        
		    }
		
		    p{
		        font-family: "Montserrat", sans-serif;
		        font-style: 200;
		        font-size: 18px; 
		        padding-left: 15px;
		        padding-right: 15px;
		          
		    }
		
		    .boton-padre{
		
		        border: solid 1px rgb(196, 196, 196);
		        
		        
		        
		    }
		
		    .hijo1{
		        border: solid 1px rgb(3, 146, 79);
		        padding-top: 0%;
		    }
		    .hijo2{
		        border: solid 1px rgb(158, 10, 10);
		        padding-top: 0%;
		        
		    }
		
		</style>
		
	</body>	<script>      app = angular.module('app', ['ngSanitize']);
      app.controller('ctl', function ($scope, $http)
      {	        $scope.coleccionCasas = [
	            {"id":1,"titulo":"casa1","precio":999,"view":"Ver Mas","ubicacion": "Bariloche","descripcion":"tu vieja","foto":"https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?cs=srgb&dl=pexels-binyamin-mellish-186077.jpg&fm=jpg"},
	            {"id":2,"titulo":"casa2","precio":89,"view":"Ver Mas","ubicacion": "Bariloche","descripcion":"tu vieja 2","foto":"https://casasinhaus.com/wp-content/uploads/2021/10/casas-prefabricadas-valencia-fachada.jpg"},
	            {"id":3,"titulo":"casa3","precio":25,"view":"Ver Mas","ubicacion": "Bariloche","descripcion":"tu vieja 32","foto":"https://www.bhhsspain.com/media/properties/151/5_201922211222330605.jpg"}
	        ];
	        $scope.$evalAsync();
	});      </script>
      
      <style>
      .sin-padding {
            padding-left: 0px;
            padding-right: 0px;
            margin-left: 0px;
            margin-right: 0px;
      }
      
      .pointer {
            cursor: pointer;
      }
      
      .flex {
            display: flex;
      }
      .flex-center
      {
            display: flex;
            justify-content: center;
            align-items: center;
      }
      .flex-center-h
      {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
      }
      .flex-center-V
      {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
      }
      .flex-start
      {
            display: flex;
            justify-content: start;
            align-items: center;
      }
      .center
          {
              text-align: center;
          }
      </style></html>