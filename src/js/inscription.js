// Modal de l'avatar
$(function () {

    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var ok = document.getElementById("avatar_ok");
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
});