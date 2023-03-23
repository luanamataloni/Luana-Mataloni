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
      
      
      
      
      
      </head>      <body ng-app="app" ng-controller="ctl" ng-init="init()" ng-cloak class="body sin-padding col-12">		<header>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		</header>
		<!-- 1 - BARRA DE MENU -->
		<div class="barra-rosa  flex ">
		
		    <div class="contenedor-izq contenedores-banner col-3">
		        <img class="img-logo" src="../CASAS/img/logos-03.png">
		    </div>
		    <div class="contenedor-mid contenedores-banner col-6">
		        <div class="padre flex-between flex-center-v">
		            <div class="item">¿QUIENES SOMOS?</div>
		            <div class="item">¿QUE HACEMOS?</div>
		            <div class="item">CLIENTES</div>
		            <div class="item">PROPUESTAS</div>
		        </div>
		        
		        <style>
		        .item{
		            padding-left: 25px;
		            padding-right: 25px;
		            padding-top: 15px;
		            color: white;
		            font-size: 16px;
		            font-weight: bold;
		            font-family: 'Montserrat';
		            
		        }
		        .padre{
		            padding-top: 10px;
		        }
		        
		        </style>
		        
		    </div>
		    <div class="contenedor-der contenedores-banner col-3">
		        <div class="caja-login flex-between flex-center-v">
		            <div class="login-in button col-6 flex-center-h">
		        
		                <!-- BOTON INGRESAR -->
		                <button class="btn btn-secondary" ng-click="mostrarCartelUsuario()">
		                    <i class="fa-solid fa-user"></i>
		                    Ingresar
		                </button>
		        
		        
		                <div class="login-up button col-6">
		        
		                    {{mostrarCartel}}
		                </div>
		        
		                
		        
		        
		            </div>
		            
		        </div>
		        
		        
		        
		        <style>
		            
		            .login-in {
		                /* background-color: black; */
		                height: 100%;
		        
		            }
		            .login-up {
		                /* background-color: blue; */
		                height: 100%;
		                
		            }
		            .caja-login {
		                height: 70px;
		                /* background-color: white; */
		        
		            }
		        </style>
		        
		    </div>
		</div>
		
		
		<div class="banner col-12 sin-padding">
		    <!-- PRIMER BANNER -->
		        <img class="imagen" src="../CASAS/img/ban-nuevo.png">
		    <!-- SEGUNDO BANNER -->
		        <img class="luana" src="../CASAS/img/luana.png">
		</div>
		
		<style>
		    .luana{
		        width: 100%;
		        border: solid 1px red;
		        height: 200px;
		    }
		    .imagen{
		         width: 100%;
		         /* border: solid 1px red; */
		         
		    }
		    .banner{
		        /* background-image: url(casa.png); */
		        width: 100%;
		        height: auto;
		        /* background-color: #D3A6E2; */
		        /* position: absolute; */
		        /* top: 0; */
		        /* left: 0; */
		        /* border: solid 1px red; */
		       
		    }
		        
		        
		    .casa{
		        width: 100%;
		        height: 100%;
		        position: absolute;
		        top: 0px;
		        left: 0px;
		        background-position: top;
		    }
		        
		
		</style>		
		
		
		<!-- 2 - CARTEL LOGIN: -->
		<div class="cartelito" ng-show="mostrarCartel"> 
		    <div class="form-group">
		      <label for="usr">Nombre Usuario:</label>
		      <input type="text" class="form-control" ng-model="correo">
		        <br>
		        El Email que escribiste es: 
		      {{correo}}
		    </div>
		
		    <div class="form-group">
		      <label for="pwd">Contraseña:</label>
		      <input type="password" class="form-control" ng-model="contrasena">
		      <br>
		      Tu contraseña es:
		      {{contrasena}}
		    </div>
		
		
		    <button class="btn btn-info" ng-click="guardarUsuario()" >
		        Ingresar
		    </button>
		
		    <button class="btn btn-danger" ng-click="mostrarCartelUsuario()">
		        Cancelar
		    </button>
		</div>
		
		
		<style>
		.cartelito {
		    position: absolute;
		    top: 20%;
		    left: 30%;
		    right: 30%;
		    
		    border: solid 1px lightgrey;
		    border-radius: 20px;
		
		    padding: 25px;
		
		    -webkit-box-shadow: 6px 3px 21px 2px rgba(181,181,181,1);
		    -moz-box-shadow: 6px 3px 21px 2px rgba(181,181,181,1);
		    box-shadow: 6px 3px 21px 2px rgba(181,181,181,1);
		}
		</style>
		
		
		<!-- 3 - TARJETAS DE SERVICIOS BRINDADOS: -->
		
		
		
		<style>
		
		
		    .barra-rosa 
		    {
		        height: 70px;
		        background-color: #ED928C;
		        /* border: solid 1px rebeccapurple; */
		       
		
		    }
		    .contenedor-izq
		    {
		        height: 100%;
		        /* background-color: green; */
		    }
		    .contenedor-mid
		    {
		        height: 100%;
		        /* background-color: blue; */
		    }
		    .contenedor-der
		    {
		        height: 100%;
		        /* background-color: rgb(255, 204, 0); */
		    }
		
		    .img-logo{
		        height: 100%;
		    }
		</style>		     <div class="cont-servicios flex-center-v flex-center-h">
		         <div class="servicios flex-center-h flex-center-v">
		             <img src="../CASAS/img/servicios.png">
		         </div>
		     </div>
		     
		     <div class="contenedor-tarjetas flex-center sin-padding">
		     
		         <div class="tarjeta flex-center flex-center-v flex-center-h">
		             <img class="img-tarjeta">
		     
		                 <!-- FOTO EN PNG ENCIMA DE IMG -->
		                 <div class="foto-encima flex-center-v"></div>
		                     <!-- CONTENIDO DEL TITULO, DESCIPCION Y BOTON -->
		                 <div class="cont-texto-btn">
		     
		                 <div class="textos">
		     
		                     <div class="titulo">Marketing <br> Digital</div>
		     
		                     <div class="descripcion">Manejo de redes sociales, Social
		                         Media, Media Planner, Community Management, Email Marketing.</div>
		     
		                 </div>
		                     <!-- BOTON ROSA -->
		                 <div class="boton-principal flex-center">
		                     <button class="button flex-center">SABER MAS</button>
		                 </div>
		             </div>
		         </div>
		     
		     </div>
		     
		     <style>
		         .foto-encima{
		             
		             height: 120px;
		             width: 100px;
		             border: solid 1px red;
		             position: absolute;
		         }
		         .cont-texto-btn{
		             border: solid 1px red;
		             padding-top: 30px;
		         }
		         
		         .tarjeta{
		             height: 500px;
		             width: 290px;
		             border: solid 1px green;
		             border-radius: 20px;
		         }
		         .img-tarjeta{
		             width: 100%;
		             height: 40%;
		             background-color: aqua;
		             border-radius: 20px 20px 0px 0px;
		         }
		         .titulo{
		             font-family: "Montserrat", sans-serif;
		             font-style: 400;
		             font-size: 24px;
		             padding-left: 15px;
		             padding-right: 15px;
		             padding-top: 10px;
		             text-align: center;
		             border: solid 1px green;
		         }
		         .descripcion{
		             font-family: "Montserrat", sans-serif;
		             font-style: 200;
		             font-size: 16px; 
		             padding-left: 15px;
		             padding-right: 15px;
		             text-align: center;
		             padding-top: 15px;
		             border: solid 1px green;
		         }
		     
		         .boton-principal{
		             padding-top: 8px;
		             border: solid 1px green;
		         }
		     
		         .button{
		             background-color: #ED928C;
		             border: none;
		             text-align: center;
		             text-decoration: none;
		             display: inline-block;
		             font-family: "Montserrat", sans-serif;
		             font-style: 500;
		             font-size: 14px;
		             color: white;
		             cursor: pointer;
		             border-radius: 25px;
		             height: 40px;
		             width: 120px;
		             
		         }
		         .contenedor-tarjetas{
		             height: 500px;
		             border: solid 1px blue;
		         }
		         .servicios{
		             border: solid 1px green;
		             height: 100%;
		             /* color:#ED928C;
		             font-size: 30px;
		             font-style: bold 700;
		             font-family: 'Montserrat', sans-serif;
		             font-family: 'Montserrat Alternates', sans-serif; */
		     
		         }
		         .cont-servicios
		         {
		             height: 80px;
		             border: solid 1px red;
		         }
		     
		     </style>
		     
		
		<h3>Trabajos</h3>
		{{arrTrabajos}}
		<div id="demo" class="carousel slide" data-ride="carousel" style="border: solid 1px yellow">
		
		    <!-- Indicators -->
		    <!-- <ul class="carousel-indicators">
		        <li data-target="#demo" ng-repeat="trabajo in arrTrabajos" 
		            data-slide-to="{{$index}}"
		            ng-class="{'true':'active'}[$index == 0]">
		        </li>
		    </ul> -->
		  
		    <!-- The slideshow -->
		    <div class="carousel-inner">
		      <div class="carousel-item"
		        style="background-color: black;height: 250px;width: 250px;z-index: 9999;"
		        ng-repeat="trabajo in arrTrabajos"
		        ng-class="{'true':'active'}[$index == 0]">
		
		            {{trabajo}}
		            <!-- <img ng-src="{{trabajo.foto}}" alt="Los Angeles"> -->
		      </div>
		    </div>
		  
		    <!-- Left and right controls -->
		    <a class="carousel-control-prev" href="#demo" data-slide="prev">
		      <span class="carousel-control-prev-icon"></span>
		    </a>
		    <a class="carousel-control-next" href="#demo" data-slide="next">
		      <span class="carousel-control-next-icon"></span>
		    </a>
		  
		</div>
		
		
		
		     <!-- TITULO STAFF -->
		     <div class="titulo-staff flex-center-h flex-center-v">STAFF</div>
		     <div class="cont-staff col-12 flex-center-h flex-center sin-padding">
		         
		         <!-- TARJETA DE CADA INTEGRANTE -->
		         <div class="card-izq col-4"></div>
		     
		         <div class="card-der col-4"></div>
		     </div>
		     
		     
		     <style>
		         .titulo-staff{
		             border: solid 1px rgb(60, 0, 255);
		             height: 80px;
		         }
		         .card-der{
		             background-color: aqua;
		             height: 100%;
		         }
		         .card-izq{
		             height: 100%;
		             background-color: green;
		         }
		         .cont-staff{
		             border: solid 1px rgb(255, 0, 0);
		             height: 350px;
		         }
		     </style>		
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->	</body>	<script>      app = angular.module('app', ['ngSanitize']);
      app.controller('ctl', function ($scope, $http)
      {	
	    // VARIABLE
	    $scope.mostrarCartel=false;
	
	
	    // FUNCION
	    $scope.mostrarCartelUsuario = function()
	    {
	        $scope.mostrarCartel=!$scope.mostrarCartel;
	    }
	
	    $scope.guardarUsuario=function(){
	        // alert("Estoy guardando el usuario" + " "+  $scope.correo + " " + $scope.contrasena)
	
	        $scope.cargando = false;
	        $.ajax(
	        {
	            url:"autenticarse.php",
	            data:
	            {
	                "mail":$scope.correo,
	                "clave":$scope.contrasena
	            },
	            beforeSend: function (xhr) 
	            {
	                $scope.cargando = true;
	            },
	            success: function (resultado, textStatus, jqXHR) 
	            {
	                if(resultado == true)
	                {
	                    alert("INGRESASTE A LA WEB");
	                }
	                else
	                {
	                    alert("USUARIO O CLAVE INVALIDAS")
	                }
	                $scope.cargando = false;
	                $scope.$evalAsync();
	            }
	
	        });
	    }
	    
	
	
	
	    $scope.arrTrabajos = [
	        {"nombre":"Vonte","foto":"img/vonte.png","pdf":"pdfs/VONTE.pdf"},
	        {"nombre":"Vilche","foto":"img/vilche.png","pdf":"pdfs/vilche.pdf"},
	        {"nombre":"Feria","foto":"img/feria.png","pdf":"pdfs/feria.pdf"}
	    ];
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