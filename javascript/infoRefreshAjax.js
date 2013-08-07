// The AJAX function...

function AJAX(){
    try{
        xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
        return xmlHttp;
    } catch (e){
        try {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
            return xmlHttp;
        } catch (e2) {
            try{
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                return xmlHttp;
            } catch (e3) {
                alert("Your browser does not support AJAX.");
                return false;
            }
        }
    }
}

function fetch_unix_timestamp() {
    return parseInt(new Date().getTime().toString().substring(0, 10), 10);
}

////////////////////////////////
//
// Refreshing the DIV registreti
//
////////////////////////////////

function refreshdiv_registreti(){
    var seconds = 10;
    var divid = "registreti";
    var url = "rightInfoRegistreti.php";
    var xmlHttp_one = AJAX();
    var timestamp = fetch_unix_timestamp();
    var nocacheurl = url+"?t="+timestamp;
    xmlHttp_one.onreadystatechange = function() {
        if (xmlHttp_one.readyState==4) {
            document.getElementById(divid).innerHTML=xmlHttp_one.responseText;
            setTimeout('refreshdiv_registreti()',seconds*1000);
        }
    };

    xmlHttp_one.open("GET",nocacheurl,true);
    xmlHttp_one.send(null);
}

window.onload = function startrefresh(){
    setTimeout('refreshdiv_registreti()', 1000);
};

////////////////////////////////
//
// Refreshing the DIV TIMEINWASHINGTON
//
////////////////////////////////

function refreshdiv_startejusi() {
    var seconds = 10;
    var divid = "startejusi";
    var url = "rightInfoStartejusi.php";
    var xmlHttp_two = AJAX();
    var timestamp = fetch_unix_timestamp();
    var nocacheurl = url+"?t="+timestamp;

    xmlHttp_two.onreadystatechange = function() {
        if (xmlHttp_two.readyState==4) {
            document.getElementById(divid).innerHTML=xmlHttp_two.responseText;
            setTimeout('refreshdiv_startejusi()',seconds*1000);
        }
    };

    xmlHttp_two.open("GET",nocacheurl,true);
    xmlHttp_two.send(null);
}

window.onload = function startrefresh() {
    setTimeout('refreshdiv_startejusi()', 1000);
};

////////////////////////////////
//
// Refreshing the DIV finisejusi
//
////////////////////////////////

function refreshdiv_finisejusi(){
    var seconds = 10;
    var divid = "finisejusi";
    var url = "rightInfoFinisejusi.php";
    var xmlHttp_three = AJAX();
    var timestamp = fetch_unix_timestamp();
    var nocacheurl = url+"?t="+timestamp;

    xmlHttp_three.onreadystatechange = function() {
        if (xmlHttp_three.readyState == 4) {
            document.getElementById(divid).innerHTML = xmlHttp_three.responseText;
            setTimeout('refreshdiv_finisejusi()',seconds*1000);
        }
    };

    xmlHttp_three.open("GET",nocacheurl,true);
    xmlHttp_three.send(null);
}

window.onload = function startrefresh(){
    setTimeout('refreshdiv_finisejusi()', 1000);
};

////////////////////////////////
//
// Refreshing the DIV HRONOMETRS
//
////////////////////////////////

function refreshdiv_hronometrs(){
    // Customise those settings

    var seconds = 1;
    var divid = "hronometrs";
    var url = "rightInfoHronometrs.php";

    // Create xmlHttp

    var xmlHttp_three = AJAX();

    // No cache

    var timestamp = fetch_unix_timestamp();
    var nocacheurl = url+"?t="+timestamp;

    // The code...

    xmlHttp_three.onreadystatechange=function(){
        if (xmlHttp_three.readyState == 4) {
            document.getElementById(divid).innerHTML = xmlHttp_three.responseText;
            setTimeout('refreshdiv_hronometrs()',seconds*1000);
        }
    };

    xmlHttp_three.open("GET",nocacheurl,true);
    xmlHttp_three.send(null);
}

// Start the refreshing process

window.onload = function startrefresh(){
    setTimeout('refreshdiv_hronometrs()',1000);
};