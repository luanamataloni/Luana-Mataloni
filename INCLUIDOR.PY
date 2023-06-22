import os
from pathlib import Path
import datetime

PATH = "src/"
arrFiles = []
verbose = True
tabUnitaria = "    "


def incluirLineasDelArchivo(rutaArchivoEntrada , cantTabsRecibidas):

    rutaArchivoEntrada = rutaArchivoEntrada.strip()

    rta = {"HTML":"","JS":""}
    try:
        # 1 - INICIALIZO LOS ACUMULADORES DE HTML Y JS:
        acumuladorHTML = ""
        acumuladorJS = ""

        archivoEntrada = open(rutaArchivoEntrada)

        yaPasoScript = False
        yaCerroScript = False

        arrLineas = archivoEntrada.readlines()

        tabulacion = dameTabs(cantTabsRecibidas)
        for lineaLoop in arrLineas:
            # print(str(lineaLoop))

            #5 - BUSCO EL TAG INCLUDE:
            if "<!--//" in lineaLoop:
                print("comentario")
            elif "< fn src = " in lineaLoop or "<fn src = " in lineaLoop or "< fn src=" in lineaLoop:
                
                # 1 - AISLANDO EL SRC DEL FN:
                cantTabs = 0 ;
                primerQuote = lineaLoop.index('"') + 1
                secondQuote = lineaLoop.rindex('"')
                src = lineaLoop[primerQuote : secondQuote]
                  
                # 2 - VOY A LEER TODAS LAS LINEAS DEL ARCHIVO SRC E INCORPORARLAS AL JS:
                pwd = os.getcwd()
                pwd = pwd.replace("\\", "/")
                rutaArchiLoop = "" + str(pwd) + "\\" +str(src);
                rutaArchiLoop = rutaArchiLoop.replace("\\", "/")
                JSFN = incluirLineasDelArchivo(rutaArchiLoop,0)["HTML"]
                  
                acumuladorJS = str(acumuladorJS) + "" + str(JSFN) +"\n";


                print("FN SRC= "+ str(src) +" ->" + str(rutaArchiLoop))

            elif "<include" in lineaLoop:
                # cantTabs = lineaLoop.index("<include")
                primerQuote = lineaLoop.index('"') + 1
                secondQuote = lineaLoop.rindex('"')
                src = lineaLoop[primerQuote : secondQuote]

                if src.startswith("../"):
                    posSlash = src.index('/') + 1
                    src = src[posSlash : len(src)]

                rutaArchiLoop = PATH + src
                print("INCLUDE : CANT TABS: " + str(cantTabsRecibidas) + " | " + str(src) + " | " + str(rutaArchiLoop))

                # 6 - LEO TODAS LAS LINEAS DEL ARCHIVO Y LAS INCORPORO AL HTML:
                contenidoRaw = incluirLineasDelArchivo(rutaArchiLoop, cantTabsRecibidas + 1)
                acumuladorHTML = str(acumuladorHTML) + str(contenidoRaw["HTML"])
                acumuladorJS = str(acumuladorJS) + str(contenidoRaw["JS"])
                # print("CONTENIDO HTML:" + str(acumuladorHTML))
                # print("CONTENIDO JS:" + str(acumuladorJS))
                rta["HTML"] = acumuladorHTML
                rta["JS"] = acumuladorJS

            elif "<script inyectado>" in lineaLoop or "</script>" in lineaLoop:

                # 8 - BUSCO EL TAG SCRIPT:

                if "<script inyectado>" in lineaLoop:
                    yaPasoScript = True
                elif "</script" in lineaLoop:
                    yaCerroScript = True
                else:
                    acumuladorHTML = acumuladorHTML + str(tabulacion) + lineaLoop

            elif yaPasoScript and not yaCerroScript:
                acumuladorJS = acumuladorJS + "\t" + str(lineaLoop)

            else:
                acumuladorHTML = str(acumuladorHTML) + "\t\t"+ str(tabulacion) + str(lineaLoop)

        rta["HTML"] = acumuladorHTML
        rta["JS"] = acumuladorJS 
    except Exception as e: 
        print("ERROR AL INCLUIR LAS LINEAS DE: " + str(rutaArchivoEntrada) + "\r -> " + str(e))

    return rta

def incluirLineasArchivoSimple(rutaArchivo, cantTabs):
    rta = ""
    archivoEntrada = open(rutaArchivo)
    arrLineas = archivoEntrada.readlines()

    tabulacion = dameTabs(cantTabs)

    for lineaLoop in arrLineas:
        rta = rta + "" + str(tabulacion) + "" + str(lineaLoop)



    return rta
def dameTabs(cantTabs):
    rta = ""

    espacio = ""
    for  i in range(cantTabs):
        espacio = espacio + tabUnitaria

    rta = espacio

    return rta
def compilar(rutaEntradaParam):

    if "-wip" in rutaEntradaParam:
        pos = rutaEntradaParam.index("-wip")
        if pos > -1:
            rutaArchivoSalida = str(rutaEntradaParam[0: pos])
            print("POS:" + str(pos) + " | " + rutaEntradaParam)

    if ".html" in rutaEntradaParam:
        rutaArchivoEntrada = PATH + "" + rutaEntradaParam
        rutaArchivoSalida = "" + rutaEntradaParam
    else:
        rutaArchivoEntrada = PATH + "" + rutaEntradaParam +".html"
        rutaArchivoSalida = "" + rutaArchivoSalida +".html"

    # 1 - ACUMULO EL HTML Y JS DE LOS ARCHIVOS LEIDOS RECURSIVAMENTE:
    acumuladorRAW = incluirLineasDelArchivo(rutaArchivoEntrada,0)
    acumuladorHTML = acumuladorRAW["HTML"]
    acumuladorJS = acumuladorRAW["JS"]



    # 2 - INCLUIR TODAS LOS ARCHIVOS DE LA CARPETA FN - JS AL INICIO DEL ANGULAR..
    carpetaFN = "FN"
    arrFNJS = os.listdir('./'+ carpetaFN )

    arrLineasJSComunes = ""
    for archivoJS in arrFNJS:
        arrLineasJSComunes = arrLineasJSComunes + str(incluirLineasArchivoSimple(carpetaFN + "/" + archivoJS,1)) + "\n"
        # print("ARCHIVO JS:"  + str(archivoJS))


    # PLANTILLAS:
    rutaPlantillaInicio = "plantillas/INICIO.html"
    # rutaPlantillaBody = "plantillas/BODY.html"
    rutaPlantillaFinBody = "plantillas/FIN-BODY.html"
    rutaPlantillaFin = "plantillas/FIN.html"

    inicioHTML = "<html>\r\r" + incluirLineasArchivoSimple(rutaPlantillaInicio,0)
    # bodyHTML = incluirLineasArchivoSimple(rutaPlantillaBody,0)
    finBodyHTML = incluirLineasArchivoSimple(rutaPlantillaFinBody,0)
    finHTML = incluirLineasArchivoSimple(rutaPlantillaFin,0)

    acumuladorHTML = inicioHTML + "\r"+ acumuladorHTML + "\r\r"
    acumuladorJS = finBodyHTML + "\r" + acumuladorJS + "\r" + arrLineasJSComunes + "\r\r" + finHTML

    archiSalida = open(rutaArchivoSalida, "w")
    archiSalida.writelines(acumuladorHTML)
    archiSalida.writelines(acumuladorJS)

def main():
    # 1 - LOGICA DE LA APP:                    # print("arrFiles:" + str(arrFiles))
    clear = lambda: os.system('cls')
    clear()

    now = datetime.datetime.now()

    print("|---------- COMPILANDO " + str(now.hour) + ":" + str(now.minute) + ":" + str(now.second) + " ----------|")
    arrFiles = os.listdir('./' + PATH)

    for nombreArchiLoop in arrFiles:
        rutaRelativaFileLoop = "./" + PATH + nombreArchiLoop


        if not Path(rutaRelativaFileLoop).is_dir():

            posLastSlash = rutaRelativaFileLoop.rindex("/") + 1
            posPunto = rutaRelativaFileLoop.rindex(".")
            rutaParsed = rutaRelativaFileLoop[posLastSlash : posPunto]

            
            # 2 - LINEA MUY IMPORTANTE: COMPILO CADA ARCHIVO QUE ENCUENTRO LUEGO DEL FILTRO:
            print("| ----------------------->  " + str(rutaRelativaFileLoop) + " -> " +str(rutaParsed))
            compilar(rutaParsed)

if __name__ == '__main__':
    main()



