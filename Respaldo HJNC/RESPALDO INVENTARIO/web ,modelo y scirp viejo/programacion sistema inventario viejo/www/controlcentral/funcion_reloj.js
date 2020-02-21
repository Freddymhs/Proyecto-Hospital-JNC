// JavaScript Document

function getXMLHttpRequest() {
    var aVersions = [ "MSXML2.XMLHttp.5.0","MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0","MSXML2.XMLHttp","Microsoft.XMLHttp"];
    if (window.XMLHttpRequest) {
        // para IE7, Mozilla, Safari, etc: que usen el objeto nativo
        return new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        // de lo contrario utilizar el control ActiveX para IE5.x y IE6.x
        for(var i=0;i<aVersions.length;i++) {
            try {
                var oXmlHttp = new ActiveXObject(aVersions);
                return oXmlHttp;
            }
            catch(error) {
                // no necesitamos hacer nada especial
            }
        }
    }
}

var carg = '<p align="center">Cargando...</p>';

function explode(nombre_div,pagina) {
    var cont = document.getElementById(nombre_div); // aqui esta la var nombre_div
    ajax = getXMLHttpRequest();
    ajax.onreadystatechange = function() {
        
        if(ajax.readyState == 4) {
            cont.innerHTML = ajax.responseText;
        }
    }
    ajax.open('GET', pagina, true); // aqui esta la var "pagina"
    ajax.send(null);
}

setInterval("explode('debajo','reloj.php');",1000);