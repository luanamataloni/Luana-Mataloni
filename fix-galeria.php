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
      
      
      
      
      
      </head>      <body ng-app="app" ng-controller="ctl" ng-init="init()" ng-cloak class="body sin-padding col-12">		<div class="contenedor-galeria col-12 sin-padding flex">
		
		
		      <div class="flecha-galeria  flecha-izq-galeria  flex-center-v flex-center" ng-click="avanzarGaleria(false)">
		            <i class="fa-solid fa-chevron-left"></i>
		      </div>
		
		      <div class="cont-items-galeria flex" id="galeria">
		            <div class="separador-item-galeria" ng-repeat="itemLoop in arrGaleria">
		                  <div class="item-galeria">
		                        <div class="img-item-galeria" style="background-image: url('{{itemLoop.foto}}')">
		                              <h3 class="h-item-galeria">{{itemLoop.nombre}}</h3>
		                        </div>
		
		                        <div class="contenedor-ver-mas-item-galeria ">
		                              Ver Mas
		                              <br>
		                              <i class="fa-solid fa-angle-down"></i>
		                        </div>
		                  </div>
		            </div>
		      </div>
		      <div class="flecha-galeria flecha-der-galeria  flex-center-v flex-center" ng-click="avanzarGaleria(true)">
		            <i class="fa-solid fa-chevron-right"></i>
		      </div>
		</div>
		
		<style>
		      .contenedor-galeria {
		            /* border: solid 1px blue; */
		            height: 300px;
		      }
		
		      .cont-items-galeria {
		            width: calc(100% - 100px);
		            background-color: lightgrey;
		
		            overflow-x: scroll;
		            overflow-y: hidden;
		            padding-top: 25px;
		            padding-bottom: 25px;
		            padding-left: 15px;
		      }
		
		      .separador-item-galeria {
		            padding-right: 15px;
		      }
		
		      .item-galeria {
		            /* border: solid 1px yellow; */
		            width: 200px;
		            height: 220px;
		            background-color: white;
		            /* border-radius: 20px; */
		            cursor: pointer;
		            box-shadow: 5px 5px 15px black;
		            padding: 15px;
		      }
		
		      .flecha-galeria {
		            /* border: solid 1px red; */
		            width: 50px;
		            height: 100%;
		            cursor: pointer;
		      }
		
		      .img-item-galeria {
		            height: 150px;
		            /* border: solid 1px red; */
		            background-position: top center;
		            background-repeat: no-repeat;
		            background-size: contain;
		            /* border-radius: 12px 12px 0px 0px; */
		      }
		
		      .h-item-galeria {
		            font-family: 'Montserrat', sans-serif;
		            font-size: 16px;
		            padding: 8px;
		            z-index: 999;
		            color: white;
		            padding-top: 100px;
		      }
		
		      /* SCROLLBAR CUSTOM */
		      .cont-items-galeria::-webkit-scrollbar {
		            width: 10px;
		            height: 10px;
		      }
		
		      .cont-items-galeria::-webkit-scrollbar-track {
		            background: transparent;
		            width: 10px;
		            height: 10px;
		            border-radius: 50px;
		      }
		
		      .cont-items-galeria::-webkit-scrollbar-thumb {
		            background: lightcoral;
		            border-radius: 50px;
		      }
		
		      .cont-items-galeria::-webkit-scrollbar-thumb:hover {
		            background: #555;
		      }
		
		      .contenedor-ver-mas-item-galeria {
		            text-align: center;
		            /* border: solid 1px red; */
		      }
		</style>
	</body>	<script>      app = angular.module('app', ['ngSanitize']);
      app.controller('ctl', function ($scope, $http)
      {	
	      $(document).ready(function ()
	      {
	            console.log("ready");
	      })
	
	
	      $scope.arrGaleria = [
	            { "nombre": "Vilche", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Feria", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "texto": "jasdjfklañsdfklajsdklf" }
	      ]
	
	
	      $scope.avanzarGaleria = function (adelante)
	      {
	            aumento = 450;
	            offset = $("#galeria").scrollLeft()
	            console.log("AVANZANDO EN GALERIA: " + adelante + " -> " + offset);
	
	            if (adelante)
	            {
	                  offset += aumento;
	                  $('#galeria').animate({ scrollLeft: '+=' + aumento }, 500);
	            }
	            else
	            {
	                  offset -= aumento;
	                  $('#galeria').animate({ scrollLeft: '-=' + aumento }, 500);
	            }
	
	            // $("#galeria").scrollLeft(offset)
	      }
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
      .flex-center-v
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
      .flex-between
      {
            display: flex;
            justify-content: space-between;
            align-items: center;
      }
      .center
          {
              text-align: center;
          }
      </style></html>