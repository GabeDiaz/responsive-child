var prefsLoaded = false;
var defaultFontSize = 100;
var currentFontSize = defaultFontSize;

function revertStyles(){

    currentFontSize = defaultFontSize;
    changeFontSize(0);

}

function toggleColors(){
    if(currentStyle == "White"){
        setColor("Black");
    }else{
        setColor("White");
    }
}

function changeFontSize(sizeDifference){
    currentFontSize = parseInt(currentFontSize) + parseInt(sizeDifference * 10);

    if(currentFontSize > 120){
        currentFontSize = 120;
    }else if(currentFontSize < 80){
        currentFontSize = 80;
    }

    //setFontSize(currentFontSize);
};

function setFontSize(fontSize){
    var stObj = document.getElementById("content_block");
    stObj.style.fontSize = fontSize + '%';
};


function GetFontSize() {
    //var stObj = document.getElementById("content_block");
    //return stObj.style.fontSize.replace("%","");
    return currentFontSize;
};

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
};

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
};

//window.onload = setUserOptions;

function setUserOptions(){
    if(!prefsLoaded){
        cookie = readCookie("fontSize");
        currentFontSize = cookie ? cookie : defaultFontSize;
        setFontSize(currentFontSize);
        prefsLoaded = true;
    }

}

//window.onunload = saveSettings;

//function saveSettings()
//{
//  createCookie("fontSize", currentFontSize, 365);
//}