/*
  CifrasEnLetras.js — ProInf.net — ago-2011

  Expresar una serie de cifras en letras.
  A modo de ejemplo convierte "22" en "veintidós".
  Puede convertir un número entre una y ciento veintiséis cifras como máximo.
  Adaptado de "CifrasEnLetras.java"

  Ejemplos de uso:
    CifrasEnLetras.convertirEurosEnLetras(22.34) --> "veintidós euros con treinta y cuatro céntimos"
    CifrasEnLetras.convertirNumeroEnLetras("35,67") --> "treinta y cinco con sesenta y siete"

  Licencia:
    <a href="http://creativecommons.org/licenses/GPL/2.0/deed.es">
      Este software está sujeto a la CC-GNU GPL
    </a>

*/

var CifrasEnLetras = {

  PREFIJO_ERROR: "Error: ",
  COMA: ",",
  MENOS: "-",
  SEPARADOR_SEIS_CIFRAS: " ",

  // Listas -------------------------------------

  listaUnidades: [ // De 0 a 29
    "cero", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve",
    "diez", "once", "doce", "trece", "catorce", "quince", "dieciséis", "diecisiete", "dieciocho", "diecinueve",
    "veinte", "veintiún", "veintidós", "veintitrés", "veinticuatro", "veinticinco", "veintiséis", "veintisiete", "veintiocho", "veintinueve",
  ],
  listaDecenas: [
    "", "diez", "veinte", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa",
  ],
  listaCentenas: [
    "", "cien", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos",
  ],
  listaOrdenesMillonSingular: [
    "", "millón", "billón", "trillón", "cuatrillón", "quintillón",
    "sextillón", "septillón", "octillón", "nonillón", "decillón",
    "undecillón", "duodecillón", "tridecillón", "cuatridecillón", "quidecillón",
    "sexdecillón", "septidecillón", "octodecillón", "nonidecillón", "vigillón",
  ],
  listaOrdenesMillonPlural: [
    "", "millones", "billones", "trillones", "cuatrillones", "quintillones",
    "sextillones", "septillones", "octillones", "nonillones", "decillones",
    "undecillones", "duodecillones", "tridecillones", "cuatridecillones", "quidecillones",
    "sexdecillones", "septidecillones", "octodecillones", "nonidecillones", "vigillones",
  ],

  // Principales --------------------------------

  /*
    Convierte a letras los números entre 0 y 29.
    Ejemplo: CifrasEnLetras.convertirUnidades(21,"femenino") --> "veintiuna"
  */
  convertirUnidades: function(unidades, genero) {
    with (CifrasEnLetras) {
      if (unidades == 1) {
        if (genero == "masculino") return "uno";
        else if (genero == "femenino") return "una";
      }
      else if (unidades == 21) {
        if (genero == "masculino") return "veintiuno";
        else if (genero == "femenino") return "veintiuna";
      }
      return listaUnidades[unidades];
    }
  },

  /*
    Convierte a letras las centenas
    Ejemplo: CifrasEnLetras.convertirCentenas(2,"femenino") --> "doscientas"
  */
  convertirCentenas: function(centenas, genero) {
    with (CifrasEnLetras) {
      var resultado = listaCentenas[centenas];
      if (genero == "femenino") {
        resultado = reemplazar(resultado, "iento","ienta");
      }
      return resultado;
    }
  },

  /*
    Primer centenar: del cero al noventa y nueve.
    Ejemplos: CifrasEnLetras.convertirDosCifras(22, "neutro") --> "veintidós"
  */
  convertirDosCifras: function(cifras, genero) {
    with (CifrasEnLetras) {
      var unidad = cifras % 10;
      var decena = Math.floor(cifras / 10);
      if (cifras < 30) {
        return convertirUnidades(cifras, genero);
      }
      else if (unidad == 0) {
        return listaDecenas[decena];
      }
      else {
        return listaDecenas[decena] + " y " + convertirUnidades(unidad, genero);
      }
    }
  },

  /*
    Primer millar: del cero al novecientos noventa y nueve.
    Ejemplos: ifrasEnLetras.convertirTresCifras(222, "neutro") --> "doscientos veintidós"
  */
  convertirTresCifras: function(cifras, genero) {
    with (CifrasEnLetras) {
      var decenas_y_unidades = cifras % 100;
      var centenas = Math.floor(cifras / 100);
      if  (cifras < 100) {
        return convertirDosCifras(cifras, genero);
      }
      else if (decenas_y_unidades == 0) {
        return convertirCentenas(centenas, genero);
      }
      else if (centenas == 1) {
        return "ciento " + convertirDosCifras(decenas_y_unidades, genero);
      }
      else {
        return convertirCentenas(centenas, genero) + " " +
          convertirDosCifras(decenas_y_unidades, genero);
      }
    }
  },

  /*
    Primer millón: del cero al novecientos noventa y nueve mil novecientos noventa y nueve.
    Ejemplo: CifrasEnLetras.convertirSeisCifras(222222, "neutro") --> "doscientos veintidós mil doscientos veintidós"
   */
  convertirSeisCifras: function(cifras, genero) {
    with (CifrasEnLetras) {
      var primerMillar = cifras % 1000;
      var grupoMiles = Math.floor(cifras / 1000);
      var generoMiles = genero == "masculino" ? "neutro" : genero;
      if (grupoMiles == 0) {
        return convertirTresCifras(primerMillar, genero);
      }
      else if (grupoMiles == 1) {
        if (primerMillar == 0) return "mil";
        else return "mil " + convertirTresCifras(primerMillar, genero);
      }
      else if (primerMillar == 0) {
        return convertirTresCifras(grupoMiles, generoMiles) + " mil";
      }
      else {
        return convertirTresCifras(grupoMiles, generoMiles) + " mil " +
          convertirTresCifras(primerMillar, genero);
      }
    }
  },

  /*
    Números enteros entre el cero y el novecientos noventa y nueve mil novecientos noventa y nueve vigillones... etc, etc.
    Es decir entre el 0 y el (10^126)-1 o bien números entre 1 y 126 cifras.
    Las cifras por debajo del millón pueden ir en masculino o en femenino.
    Ejemplos:
      CifrasEnLetras.convertirCifrasEnLetras("22222222") --> "veintidós millones doscientos veintidós mil doscientos veintidós"
      CifrasEnLetras.convertirCifrasEnLetras("") --> "No hay ningún número"
      CifrasEnLetras.convertirCifrasEnLetras(CifrasEnLetras.repetir('9',127)) --> "El número es demasiado grande ya que tiene más de 126 cifras"
      CifrasEnLetras.convertirCifrasEnLetras("0x") --> "Uno de los caracteres no es una cifra decimal"
      CifrasEnLetras.convertirCifrasEnLetras(CifrasEnLetras.repetir('9',126)) --> "novecientos noventa y nueve mil novecientos noventa y nueve vigillones..."
      CifrasEnLetras.convertirCifrasEnLetras(10^6) --> "un millón"
      CifrasEnLetras.convertirCifrasEnLetras(10^12) --> "un billón"
      CifrasEnLetras.convertirCifrasEnLetras(10200050) --> "diez millones doscientos mil cincuenta"
      CifrasEnLetras.convertirCifrasEnLetras(10001000) --> "diez millones mil"
      CifrasEnLetras.convertirCifrasEnLetras("1" + CifrasEnLetras.repetir('0',120)) --> "un vigillón"
      CifrasEnLetras.convertirCifrasEnLetras("2" + CifrasEnLetras.repetir('0',18)) --> "dos trillones"
      CifrasEnLetras.convertirCifrasEnLetras("4792347927489", "\n") --> "..."
      CifrasEnLetras.convertirCifrasEnLetrasFemeninas("501") --> "quinientas una"
      CifrasEnLetras.convertirCifrasEnLetrasFemeninas("240021") --> "doscientas cuarenta mil veintiuna"
  */
  convertirCifrasEnLetras: function(cifras, genero, separadorGruposSeisCifras)
  {
    with (CifrasEnLetras) {

      // Predeterminado
      cifras = isNaN(cifras)? cifras: reemplazar(cifras+"", ".", COMA);
      genero = genero || "neutro";
      separadorGruposSeisCifras = separadorGruposSeisCifras || SEPARADOR_SEIS_CIFRAS;

      // Inicialización
      cifras = recortar(cifras);
      var numeroCifras = cifras.length;

      // Comprobación
      if (numeroCifras == 0) {
        return PREFIJO_ERROR + "No hay ningún número";
      }
      for (var indiceCifra=0; indiceCifra<numeroCifras; ++indiceCifra) {
          var cifra = cifras.charAt(indiceCifra);
          var esDecimal = "0123456789".indexOf(cifra) >= 0;
          if (!esDecimal) {
            return PREFIJO_ERROR + "Uno de los caracteres no es una cifra decimal";
          }
      }
      if (numeroCifras > 126) {
        return PREFIJO_ERROR + "El número es demasiado grande ya que tiene más de 126 cifras";
      }

      // Preparación
      var numeroGruposSeisCifras = Math.floor(numeroCifras / 6) + signo(numeroCifras);
      var cerosIzquierda = repetir('0', numeroGruposSeisCifras * 6 - numeroCifras);
      cifras = cerosIzquierda + cifras;
      var ordenMillon = numeroGruposSeisCifras - 1;

      // Procesamiento
      var resultado = [];
      for (var indiceGrupo=0; indiceGrupo<numeroGruposSeisCifras*6; indiceGrupo+=6) {
          var seisCifras = parseInt(cifras.substring(indiceGrupo, indiceGrupo+6), 10);
          if (seisCifras != 0) {
              if (resultado.length > 0) {
                resultado.push(separadorGruposSeisCifras);
              }

              if (ordenMillon == 0) {
                  resultado.push(convertirSeisCifras(seisCifras, genero));
              }
              else if (seisCifras == 1) {
                  resultado.push("un " + listaOrdenesMillonSingular[ordenMillon]);
              }
              else {
                  resultado.push(convertirSeisCifras(seisCifras, "neutro") +
                      " " + listaOrdenesMillonPlural[ordenMillon]);
              }
          }
          ordenMillon--;
      }

      // Finalización
      if (resultado.length == 0) {
        resultado.push(listaUnidades[0]);
      }
      return resultado.join("");
    }
  },

  convertirCifrasEnLetrasMasculinas: function(cifras) {
    return CifrasEnLetras.convertirCifrasEnLetras(cifras, "masculino");
  },

  convertirCifrasEnLetrasFemeninas: function(cifras) {
    return CifrasEnLetras.convertirCifrasEnLetras(cifras, "femenino");
  },

  /*
    Expresa un número con decimales y signo en letras
    acompañado del tipo de medida para la parte entera y la parte decimal.

    - Los caracteres no numéricos son ignorados.
    - Los múltiplos de millón tienen la preposición "de" antes de la palabra.
    - El género masculino o femenino sólo puede influir en las cifras inferiores al millón

    Ejemplos:
      CifrasEnLetras.convertirNumeroEnLetras("-123,45",2) --> "menos ciento veintitrés con cuarenta y cinco"
      CifrasEnLetras.convertirNumeroEnLetras("2.000,25", 3, "kilo",null,null, "gramo") --> "dos mil kilos con doscientos cincuenta gramos"
      CifrasEnLetras.convertirNumeroEnLetras("43,005", 3, "kilómetro",null,null, "metro") --> "cuarenta y tres kilómetros con cinco metros"
      CifrasEnLetras.convertirNumeroEnLetras("1.270,23", 2, "euro",null,null, "céntimo") --> "mil doscientos setenta euros con veintitrés céntimos"
      CifrasEnLetras.convertirNumeroEnLetras("1", 2, "euro",null,null, "céntimo") --> "un euro con cero céntimos"
      CifrasEnLetras.convertirNumeroEnLetras("0,678", 2, "euro", null, null, "céntimo") --> "cero euros con sesenta y siete céntimos"
      CifrasEnLetras.convertirNumeroEnLetras("22.000,55", 0, "euro") --> "veintidós mil euros"
      CifrasEnLetras.convertirNumeroEnLetras("-,889") --> "menos cero con ochocientos ochenta y nueve"
      CifrasEnLetras.convertirNumeroEnLetras("200", 0, "manzana",null,true) --> "doscientas manzanas"
      CifrasEnLetras.convertirNumeroEnLetras("1,5", 2, "peseta",null,true, "céntimo",null,false) --> "una peseta con cincuenta céntimos"
      CifrasEnLetras.convertirNumeroEnLetras("300,56", 3, "segundo",null,false, "milésima",null,true) --> "trescientos segundos con quinientas sesenta milésimas"
      CifrasEnLetras.convertirNumeroEnLetras("21,21",2,"niño",null,false, "niña",null,true) --> "veintiún niños con veintiuna niñas"
      CifrasEnLetras.convertirNumeroEnLetras("1000000", null, "euro") --> "un millón de euros"
      CifrasEnLetras.convertirNumeroEnLetras("200.200.200", null, "persona",null,true) --> "doscientos millones doscientas mil doscientas personas"
      CifrasEnLetras.convertirNumeroEnLetras("221.221.221") --> "doscientos veintiún millones doscientos veintiún mil doscientos veintiuno"
  */
  convertirNumeroEnLetras: function(cifras, numeroDecimales,
    palabraEntera, palabraEnteraPlural, esFemeninaPalabraEntera,
    palabraDecimal, palabraDecimalPlural, esFemeninaPalabraDecimal)
  {
    with (CifrasEnLetras) {
      // Argumentos predeterminados
      cifras = isNaN(cifras)? cifras: reemplazar(cifras+"",".",COMA);
      numeroDecimales = numeroDecimales===0? 0: numeroDecimales || -1;
      palabraEntera = palabraEntera || "";
      palabraEnteraPlural = palabraEnteraPlural || palabraEntera+"s";
      esFemeninaPalabraEntera = esFemeninaPalabraEntera || false;
      palabraDecimal = palabraDecimal || "";
      palabraDecimalPlural = palabraDecimalPlural || palabraDecimal+"s";
      esFemeninaPalabraDecimal = esFemeninaPalabraDecimal || false;

      // Limpieza
      cifras = dejarSoloCaracteresDeseados(cifras, "0123456789" + COMA + MENOS);

      // Comprobaciones
      var repeticionesMenos = numeroRepeticiones(cifras, MENOS);
      var repeticionesComa = numeroRepeticiones(cifras, COMA);
      if (repeticionesMenos > 1 || (repeticionesMenos == 1 && !empiezaPor(cifras, MENOS)) ) {
        return PREFIJO_ERROR + "Símbolo negativo incorrecto o demasiados símbolos negativos";
      }
      else if (repeticionesComa > 1) {
        return PREFIJO_ERROR + "Demasiadas comas decimales";
      }

      // Negatividad
      var esNegativo = empiezaPor(cifras, MENOS);
      if (esNegativo) cifras = cifras.substring(1);

      // Preparación
      var posicionComa = cifras.indexOf(COMA);
      if (posicionComa == -1) posicionComa = cifras.length;

      var cifrasEntera = cifras.substring(0, posicionComa);
      if (cifrasEntera == "" || cifrasEntera == MENOS) cifrasEntera = "0";
      var cifrasDecimal = cifras.substring(Math.min(posicionComa + 1, cifras.length));

      var esAutomaticoNumeroDecimales = numeroDecimales < 0;
      if (esAutomaticoNumeroDecimales) {
        numeroDecimales = cifrasDecimal.length;
      }
      else {
        cifrasDecimal = cifrasDecimal.substring(0, Math.min(numeroDecimales, cifrasDecimal.length));
        var cerosDerecha = repetir('0', numeroDecimales - cifrasDecimal.length);
        cifrasDecimal = cifrasDecimal + cerosDerecha;
      }

      // Cero
      var esCero = dejarSoloCaracteresDeseados(cifrasEntera,"123456789") == "" &&
        dejarSoloCaracteresDeseados(cifrasDecimal,"123456789") == "";

      // Procesar
      var resultado = [];

      if (esNegativo && !esCero) resultado.push("menos ");

      var parteEntera = procesarEnLetras(cifrasEntera,
        palabraEntera, palabraEnteraPlural, esFemeninaPalabraEntera);
      if (empiezaPor(parteEntera, PREFIJO_ERROR)) return parteEntera;
      resultado.push(parteEntera);

      if (cifrasDecimal != "") {
        var parteDecimal = procesarEnLetras(cifrasDecimal,
          palabraDecimal, palabraDecimalPlural, esFemeninaPalabraDecimal);
        if (empiezaPor(parteDecimal, PREFIJO_ERROR)) return parteDecimal;
        resultado.push(" con ");
        resultado.push(parteDecimal);
      }

      return resultado.join("");
    }
  },

  convertirNumeroConParametrosEnLetras: function(cifras, parametros) {
    parametros = parametros || {};
    return CifrasEnLetras.convertirNumeroEnLetras(
      cifras,
      parametros.numeroDecimales || -1,

      parametros.palabraEntera || "",
      parametros.palabraEnteraPlural || "",
      parametros.esFemeninaPalabraEntera || false,

      parametros.palabraDecimal || "",
      parametros.palabraDecimalPlural || "",
      parametros.esFemeninaPalabraDecimal || false
    );
  },

  //---------------------------------------------
  // FUNCIONES AUXILIARES
  //---------------------------------------------

  /*
    Borra todos los caracteres del texto que no sea alguno de los caracteres deseados.
    Ejemplos:
      CifrasEnLetras.dejarSoloCaracteresDeseados("89.500.400","0123456789") --> "89500400"
      CifrasEnLetras.dejarSoloCaracteresDeseados("ABC-000-123-X-456","0123456789") --> "000123456"
  */
  dejarSoloCaracteresDeseados: function(texto, caracteresDeseados) {
    var indice = 0;
    var resultado = [];
    for (var indice = 0; indice < texto.length; ++indice) {
      var caracter = texto.charAt(indice);
      if (caracteresDeseados.indexOf(caracter) >= 0) resultado.push(caracter);
    }
    return resultado.join("");
  },

  /*
   Cuenta el número de repeticiones en el texto de los caracteres indicados
   Ejemplo: CifrasEnLetras.numeroRepeticiones("89.500.400","0") --> 4
  */
  numeroRepeticiones: function(texto, caracteres) {
    var resultado = 0;
    for (var indice=0; indice<texto.length; ++indice) {
      var caracter = texto.charAt(indice);
      if (caracteres.indexOf(caracter) >= 0) resultado++;
    }
    return resultado;
  },

  /*
    Función auxiliar de "convertirNumeroEnLetras"
    para procesar por separado la parte entera y la parte decimal
  */
  procesarEnLetras: function(cifras, palabraSingular, palabraPlural, esFemenina) {
    with (CifrasEnLetras) {
      // Género
      var genero = "neutro";
      if (esFemenina) genero = "femenino";
      else if (palabraSingular == "") genero = "masculino";

      // Letras
      var letras = convertirCifrasEnLetras(cifras, genero);
      if (empiezaPor(letras, PREFIJO_ERROR)) return letras;

      // Propiedades
      var esCero = letras == convertirUnidades(0, genero) || letras == "";
      var esUno = letras == convertirUnidades(1, genero);
      var esMultiploMillon = !esCero && acabaPor(cifras, "000000");

      // Palabra
      var palabra = "";
      if (!palabraSingular == "") {
        if (esUno || palabraPlural == "")
          palabra = palabraSingular;
        else
          palabra = palabraPlural;
      }

      // Resultado
      var resultado = [];
      resultado.push(letras);
      if (palabra != "") {
        resultado.push (esMultiploMillon? " de ": " ");
        resultado.push(palabra);
      }
      return resultado.join("");
    }
  },

  reemplazar: function(texto, buscado, reemplazo) {
    return texto.split(buscado).join(reemplazo);
    //return texto.replace(new RegExp(buscado, "g"), reemplazo);
  },

  recortar: function(texto) {
    return texto.replace(/^\s*|\s*$/g,"");
  },

  signo: function(numero){
    if (numero > 0) return 1;
    else if (numero < 0) return -1;
    else return 0;
  },

  repetir: function(texto, veces) {
    return new Array(isNaN(veces)? 1: veces+1).join(texto);
  },

  empiezaPor: function(texto, prefijo) {
    //return texto.match("^"+prefijo) == prefijo;
    return texto.substr(0, prefijo.length) == prefijo;
  },

  acabaPor: function(texto, sufijo) {
    //return texto.match(sufijo+"$") == sufijo;
    return texto.substr(texto.length-sufijo.length) == sufijo;
  },

}; // CifrasEnLetras
