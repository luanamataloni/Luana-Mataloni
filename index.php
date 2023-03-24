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
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
		</header>
		
		<!-- BARRA MENU -->
		<!-- 1 - BARRA DE MENU -->
		<div class="barra-rosa  flex ">
		
		        <!-- CONTENEDOR LOGO -->
		    <div class="contenedor-izq col-3">
		        <img class="img-logo" src="../CASAS/img/logos-03.png">
		    </div>
		
		    <!-- CONTENEDOR ITEMS MENU -->
		    <div class="contenedor-mid col-6">
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
		
		    <!-- CONTENEDOR ITEM LOGIN MENU -->
		    <div class="contenedor-der col-3">
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
		</style>		
		<!-- FOTO PRINCIPAL -->
		<div class="banner col-12 sin-padding">
		    <!-- PRIMER FOTO PRINCIPAL -->
		        <img class="imagen" src="../CASAS/img/ban-nuevo.png">
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
		<!-- SEGUNDA FOTO: -->
		<div class="cont-segunda-foto div-to-img col-12" style="background-image: url('img/segunda-foto.png')">
		
		</div>
		
		<style>
		    .cont-segunda-foto
		    {
		        z-index: 999;
		        height: 300px;
		    }
		    .div-to-img
		    {
		        background-size: contain;
		        background-repeat: no-repeat;
		        background-position: center center;
		    }
		    .div-to-img-left
		    {
		        background-size: contain;
		        background-repeat: no-repeat;
		        background-position: left center;
		    }
		    .div-to-img-right
		    {
		        background-size: contain;
		        background-repeat: no-repeat;
		        background-position: right center;
		    }
		</style>
		
		
		<!-- SERVICIOS -->
		
		<!-- TRABAJOS -->
		<div class="contenedor-galeria col-12 sin-padding flex">
		
		
		      <div class="flecha-galeria  flecha-izq-galeria  flex-center-v flex-center" ng-click="avanzarGaleria(false)">
		            <i class="fa-solid fa-chevron-left"></i>
		      </div>
		
		      <div class="cont-items-galeria flex" id="galeria">
		            <div class="separador-item-galeria" ng-repeat="itemLoop in arrGaleria">
		                  <div class="item-galeria" ng-click="abrirItemGaleria(itemLoop)">
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
		
		
		<!-- MODAL GALERIA: -->
		<!-- The Modal -->
		<div class="modal" id="modalPdf">
		      <div class="modal-dialog">
		            <div class="modal-content">
		
		                  <!-- Modal Header -->
		                  <div class="modal-header">
		                        <h4 class="modal-title">{{itemGaleriaSelected.nombre}}</h4>
		                        <button type="button" class="close" data-dismiss="modal">&times;</button>
		                  </div>
		
		                  <!-- Modal body -->
		                  <div class="modal-body">
		                        <embed src="{{itemGaleriaSelected.pdf}}" class="col-12 sin-padding" height="475"
		                              type="application/pdf">
		                  </div>
		
		                  <!-- Modal footer -->
		                  <div class="modal-footer">
		                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		                  </div>
		
		            </div>
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
		            /* PARA QUE LA IMG SE CENTRE DENTRO DEL DIV */
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
		<!-- STAFF -->
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
	    
	
	
	
	
	      $(document).ready(function ()
	      {
	            console.log("ready");
	      })
	
	
	      $scope.arrGaleria = [
	            { "nombre": "Vilche", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Feria", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" },
	            { "nombre": "Pepito", "foto": "./img/paisaje.jpg", "pdf": "./pdfs/Allianz Cheat Sheet_Edit V8.pdf", "texto": "jasdjfklañsdfklajsdklf" }
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
	
	      $scope.itemGaleriaSelected = null;
	
	      $scope.abrirItemGaleria = function (itemGaleria)
	      {
	            console.log("ABRIENDO MODAL GALERIA:");
	            $scope.itemGaleriaSelected = itemGaleria;
	            $scope.$evalAsync();
	            $("#modalPdf").modal();
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