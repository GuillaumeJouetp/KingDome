function Ajx()
{
    var request = false;
    try
    {request = new ActiveXObject('Msxml2.XMLHTTP');}
    catch (err2)
    { try { request = new ActiveXObject('Microsoft.XMLHTTP');}
    catch (err3) {
        try {request = new XMLHttpRequest();}
        catch (err1) {request = false;}
    }
    }
    return request;
}
function getphpelementid(elementid,url,endvar)
{
    var xhr = Ajx();
    xhr.onreadystatechange  = function()
    {
        if(xhr.readyState  === 4)
        {
            if(xhr.status  === 200) {
                if(xhr.responseText === "deco"){
                    deco();
                }else{
                    document.getElementById(elementid).innerHTML = xhr.responseText;
                }
            }else{
                document.getElementById(elementid).innerHTML = "Error code " + xhr.status;
            }
        }
    };

    xhr.open("GET", url + endvar, true);
    xhr.send(null);
}
function selectcp()
{
    //alert('plop');
    var cp = document.getElementById('zip_code').value;

    //on ne teste qu'à partir de 2 caracteres
    if (cp.length > 1)
    {
        getphpelementid("city", "get_city($bdd, \"cp_autocomplete\", ",cp +");");
    }
}


// Modal de l'avatar
$(function () {
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the button that valid the avatar
    var ok = document.getElementById("avatar_ok");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks on "envoyer", close the modal
    ok.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
});