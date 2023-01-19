<?PHP

$verbose = false;
$path    = 'SRC';
$filesInSrc = array_diff(scandir($path), array('.', '..'));

if($verbose)
{
      echo ("COMPILO TODO EL FOLDER SRC: " . count($filesInSrc));
      echo ("<br>");
}

foreach($filesInSrc as $nombreArchiLoop) 
{
      $rutaRelativaFileLoop = './src/'.$nombreArchiLoop;

      if(!is_dir($rutaRelativaFileLoop))
      {
            // $texto = fopen($rutaRelativaFileLoop,'r');
            if($verbose)
            {
                  echo("-------------------<br>");
                  echo("FILE TO COMPILE : " . $rutaRelativaFileLoop ."<br>");
            }

            $posLastSlash = (strripos($rutaRelativaFileLoop,"/") + 1);
            $posPunto = strrpos($rutaRelativaFileLoop , ".");
            $rutaParsed = substring_nico($rutaRelativaFileLoop, $posLastSlash , $posPunto);
            $rutaParsed = quitarExtensionArchivo($rutaParsed);

            if($verbose)
            {
                  echo("FILE TO PARSED : " . $rutaParsed ."<br>");
            }
            compilar($rutaParsed, $verbose);
      }
}

function compilar($rutaEntradaParam , $verbose)
{
      // 1 - FUERZO QUE LA ENTRADA SEA .HTML: Y DENTRO DE LA CARPETA SRC/
      // echo("RUTA ENTRADA PARAM:" . $rutaEntradaParam ."<BR>");
      $rutaArchivoEntrada = "SRC/" . $rutaEntradaParam . ".html";
      // $rutaArchivoEntrada =  $rutaEntradaParam . ".html";
      
      // 2 - RUTA DE SALIDA .PHP EN ROOT /
      $rutaArchivoSalida = "" . $rutaEntradaParam .".php";
      
      
      $rutaArchiLocal = substr($rutaArchivoEntrada ,0);
      
      if($verbose)
      {
            echo("RUTA ENTRADA PROCESADA : " . $rutaArchivoEntrada . "<br>");
            echo("RUTA SALIDA PROCESADA : " . $rutaArchivoSalida . "<br>");
      }
      
      // 3 - LEO LAS LINEAS DEL ARCHIVO DE ENTRADA - SEPARANDO EN HTML Y EL JS: LO GUARDO EN ACUMULADOR RAW.
      $acumuladorRaw = incluirLineasDeArchivo($rutaArchivoEntrada , 0);
      
      if($verbose)
      {
            //echo("ACUMULADOR HTML:" . $acumuladorRaw["HTML"] . "<br>");
            //echo("ACUMULADOR JS:" . $acumuladorRaw["JS"] . "<br>");
      }
      
      // 4 - AGREGO EL AUTOREFRESCO DOBLE F5 EN ESE ARCHIVO:



      // 4 - PLANTILLA DE INICIO:
      $rutaPlantillaInicio = "plantillas/INICIO.php";
      $arrValores = array("rutaEntradaParam"=>$rutaEntradaParam,"OTRO-VAL"=>"XXX");
      $inicioHTML = "<html>\r\r" . getBracket($rutaPlantillaInicio , $arrValores , 1 );
      
      //5 - PLANTILLA DE BODY:
      $rutaPlantillaBody = "plantillas/BODY.php";
      $bodyHTML = getBracket($rutaPlantillaBody , $arrValores , 1 );
      
      //6 - PLANTILLA FIN BODY:
      $rutaPlantillaFinBody = "plantillas/FIN-BODY.php";
      $finBodyHTML = "\t</body>\r\t<script>\r" . getBracket($rutaPlantillaFinBody , $arrValores ,1 );
      
      //7 - PLANTILLA FIN BODY:
      $rutaPlantillaFin = "plantillas/FIN.php";
      $finHTML = "\r\t});\r". getBracket($rutaPlantillaFin , $arrValores, 1 ) ."\r</html>";
      
      
      // echo("BRACKET::" . $inicioHTML);
      
      $acumuladorHTML = $inicioHTML ."\r" . $bodyHTML ."\r\r". $acumuladorRaw["HTML"] . "\r\r" . $finBodyHTML ;
      $acumuladorJS = $acumuladorRaw["JS"] . $finHTML;


      // 6 - EN LA POS DE FIN , LE AGREGO UN CIERRE DE SCRIPT ANGULAR AL ACUMULADOR JS:
      $largoJS = (strlen($acumuladorJS) - 20);


      // 7 - GUARDO EL ARCHIVO COMO ESCRITURA Y LE PASO LA RUTA, EL ACUMULADOR HTML Y EL ACUMULADOR JS CONCATENADOS:
      if($verbose)
      {
            //echo("archiSalida :" . $rutaArchivoSalida . "<br>");
      }
      
      $archiSalida = fopen($rutaArchivoSalida , 'w');
      fwrite($archiSalida, $acumuladorHTML . $acumuladorJS);
      
}

// 1 - PRIMERO DEFINO QUE RECIBO EN LA URL COMO PARAMETRO, EL NOMBRE DEL ARCHIVO A COMPILAR, SI NO RECIBO NADA ENTONCES POR DEFECTO ES INDEX
//  SIEMPRE RECIBO UN ARCHIVO .HTML Y LO CONVIERTO A .PHP, PERO LE PUEDO PASAR EL NOMBRE Y EL FLACO ME RESUELVE SOLO.
// if (isset($_GET['archi']))
// {
//       $archiRaw = $_GET['archi'];
//       $archiProcesado = quitarExtensionArchivo($archiRaw);
      
//       compilar($archiProcesado , $verbose);
//       // echo("COMPILARIA: " . $archiProcesado);
// }
// else
// {
      












function incluirLineasDeArchivo( $rutaArchivoEntrada , $cantTabsRecibidas)
{

      // 1 - INICIALIZO LOS ACUMULADORES DE HTML Y JS:
      $contenidoHTML = "";
      $acumuladorJS = "";
      
      // 2 - LEO EL ARCHIVO DE ENTRADA:
      // $rutaArchivoEntrada = quitarExtensionArchivo($rutaArchivoEntrada).".html";
      $archivoEntrada = file($rutaArchivoEntrada);
      
      $yaPasoScript = false;
      $yaCerroScript = false;
      
      // 3 - RECORRO LINEA A LINEA - BUSCANDO <INCLUDE SRC=""></INCLUDE> O <SCRIPT INYECTADO></SCRIPT> , TAMBIEN HAY COMENTARIOS <!-- -->
      foreach ((array) $archivoEntrada as $linea) 
      {
            // 4 - GENERO EL ESPACIO DE TABULACIONES PARA ESE INCLUDE:
            $tabUnitaria = " ";
            $tabs = "";
            
            for($x = 0 ; $x < $cantTabsRecibidas; $x++)
            {
                  $tabs .= " ";
            }
            
            
            // echo $linea;
            
            
            
            
            // 5 - BUSCO EL TAG INCLUDE:
            if(str_contains($linea, "<!--//"))
            {
                  echo "comentario";
            }
             if(str_contains($linea, "<include"))
            {
            
                  // 6 - AISLANDO EL SRC DEL INCLUDE:
                  $cantTabs = stripos($linea, "<include") ;
                  $primerQuote = stripos($linea, '"') + 1 ;
                  $secondQuote = strripos($linea, '"')  ;
                  
                  
                  $src = substr($linea , $primerQuote , $secondQuote - $primerQuote);;
                  if(str_starts_with($src, "../"))
                  {
                        //echo("1)" . $src ."<br>");
                        $posSlash = (stripos($src, '/') + 1);
                        $src = "SRC/".substring_nico($src , $posSlash , strlen($src));
                        //echo ("---------<br>");
                  }
                  else
                  {
                        //echo("2)" . $src ."<br>");
                        $src = "SRC/". $src;
                        // echo ("---------<br>");
                  }
                  // $src = "dev/".substr($linea , $primerQuote , $secondQuote - $primerQuote);
                  // $src = str_replace($src,"/","\\");
                  // echo "INCLUDE(" . $primerQuote . "," . $secondQuote . ") -> " . $src ."<br>";
                  
                  
                  // 7 - VOY A LEER TODAS LAS LINEAS DEL ARCHIVO SRC E INCORPORARLAS AL HTML:
                  $pwd = getcwd();
                  $rutaArchiLoop = "" . $pwd."\\".$src;
                  $rutaArchiLoop = str_replace('\\', '/', $rutaArchiLoop);
                  // echo "PWD + SRC:".  $rutaArchiLoop ;
                  // echo $tabs."INCLUDE(" . $primerQuote . "," . $secondQuote . ") -> " . $rutaArchiLoop ."<br>";
                  
                  $contenidoRaw = incluirLineasDeArchivo($rutaArchiLoop, $cantTabs + 0) ;
                  $contenidoHTML .= $contenidoRaw["HTML"] ."\r";
                  $acumuladorJS .= $contenidoRaw["JS"];
                  
                  // $rta .= $linea;
            }
            else if(str_contains($linea, "<script inyectado>") || str_starts_with(trim($linea), "</script>") )
            {
                  // 8 - BUSCO EL TAG SCRIPT:
                  // $contenidoHTML .= $tabs.$linea;
                  if(str_contains($linea, "<script inyectado>"))
                  {
                        $yaPasoScript = true;
                        // $acumuladorJS .=  $linea;
                        // echo "SCRIPT:" . $linea . "<br>";
                  }
                  if (str_starts_with(trim($linea), "</script"))
                  {
                        $ $yaCerroScript = true;
                        // $acumulador .= "LINEA:" . $line;
                        
                  }
                       
            }
            else if( str_contains($linea , "< fn src = ") ||  str_contains($linea , "<fn src = ") || str_contains($linea , "< fn src="))
            {
                  // 1 - AISLANDO EL SRC DEL FN:
                  $cantTabs = stripos($linea, "<include") ;
                  $primerQuote = stripos($linea, '"') + 1 ;
                  $secondQuote = strripos($linea, '"')  ;
                  
                  
                  $src = substr($linea , $primerQuote , $secondQuote - $primerQuote);
                  
                  // 2 - VOY A LEER TODAS LAS LINEAS DEL ARCHIVO SRC E INCORPORARLAS AL JS:
                  $pwd = getcwd();
                  $rutaArchiLoop = "" . $pwd."\\".$src;
                  $rutaArchiLoop = str_replace('\\', '/', $rutaArchiLoop);
                  // echo("FN(" . $primerQuote. "," . $secondQuote . "): " . $src . " ->" . $rutaArchiLoop);
                  
                  $arrValores = array("OTRO-VAL"=>"XXX");
                  $JSFN = getBracket($rutaArchiLoop,$arrValores,2);
                  
                  
                  $acumuladorJS .= $JSFN ."\n";
                  
                  
                  
            }
            else if($yaPasoScript && !$yaCerroScript)
            {
                  $acumuladorJS .=  "\t" . $linea;
            }
            else
            {
                  $contenidoHTML .= "\t\t" . $tabs.$linea;
            }
      }
      
      
      
      
      //  9 - GUARDO EL HTML EN EL ACUMULADOR DE HTML Y EL JS EN EL ACUMULADOR DE JS, DEVUELVO TODO EN UN ARRAY DE AMBOS ELEMENTOS, PRIMERO HTML Y JS LUEGO: 
      $rta = array("HTML"=>"", "JS"=>"");
      $rta["HTML"] =   $contenidoHTML ;
      $rta["JS"] =  $acumuladorJS ;
      
      
      // $rta["HTML"] = $inicioHTML . $contenidoHTML . $finHTML."\r";
      // $rta["JS"] = $inicioJS . $acumuladorJS ."\r";
      // echo "|----------|<br>";
      // echo "HTML:" . $contenidoHTML;
      // echo "JS:" . $acumuladorJS;
      // return $contenidoHTML . $acumuladorJS;
      
      return $rta;
}




      
function getBracket($rutaArchivo, $arrValores , $cantTabs)
{
      $rta = "";
      
      // GENERO EL ESPACIO DE TABS:
      $tabs = dameTabs($cantTabs);
      // echo("tabs:" . strlen($tabs) . "s".$tabs."s<br>");
      
      
      $inicioHTML = file($rutaArchivo);
      foreach ((array) $inicioHTML as $linea) 
      {
            if(str_contains($linea, "{{") && str_contains($linea, "}}"))
            {
                  $posInicioBracket = strrpos($linea , "{{") +2 ;
                  $posFinBracket = strrpos($linea , "}}");
                  
                  $contenidoBracket = substring_nico($linea , $posInicioBracket , $posFinBracket);
                  
                  $valorBracket = $arrValores[$contenidoBracket];
                  // echo("BRACKETS:" .$linea . " - " . $posInicioBracket . " - " . $posFinBracket . "|" . $contenidoBracket .  "<BR>");
                  // echo("VALOR:" . $valorBracket ."<BR>");
                  
                  // echo ("LINEA:" .$linea);
                  $largoLinea = strlen($linea);
                  $inicio = substring_nico($linea , 0  , ($posInicioBracket - 2));
                  $fin = substring_nico($linea , ($posFinBracket +2) , $largoLinea);
                  
                  
                  $lineaAux = $inicio;
                  $lineaAux .=  $valorBracket;
                  $lineaAux .= $fin;
                  
                  $linea = $lineaAux;
                  
                  // echo("-->".$tabs.$linea ."<BR>");
                  
                  $rta .= $tabs . $linea;
                  
                  // echo("<br>inicio:" .  $inicio . "<br>");
                  // echo("<br>fin:" .  $fin);
                  // // echo("<br>");
                  // echo("<br>NUEVA LINEA: " .$linea);
            }
            else
            {
                  $rta .= $tabs . $linea;
                  // echo($linea ."<BR>");
            }
      }
      return $rta;
}


function dameTabs($cantTabs)
{
      // 4 - GENERO EL ESPACIO DE TABULACIONES:
      $rta = "";
      
      
      $tabUnitaria = "      ";
      $tabs = "";
      
      for($x = 0 ; $x < $cantTabs; $x++)
      {
            $tabs .= $tabUnitaria;
      }
      
      $rta = $tabs;
      
      
      // echo("tabs:" . strlen($tabs) . "s".$tabs."s<br>");
      
      return $rta;
}
// FUNCION QUE SE ENCARGAR DE HACER SUBSTRING DE FORMA COMO YO LA CONOZCO, YA QUE PHP, LO HACE PARA EL FINAL, ES ALGO RARO:
function quitarExtensionArchivo($archiRaw)
{
      $rta = $archiRaw;
      
      if(str_contains($archiRaw, '.'))
      {
            $posPunto = strrpos($archiRaw , ".");
            
            $archiProcesado = substring_nico($archiRaw,0,$posPunto);
            
            // echo("TIENE UN PUNTO: " . $posPunto ." = " . $archiProcesado ."<BR>");
            
            $rta =  $archiProcesado;
            
      }
      
      return $rta;
}
function substring_nico($str, $start, $end)
{
  return mb_substr($str, $start, $end - $start);
}
?>