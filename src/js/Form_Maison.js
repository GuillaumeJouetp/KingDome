function ajoutMaison() {
    var model = document.getElementById('myModel');

    var bt = document.getElementById("myBt");

    var span = document.getElementsByClassName("close2")[0];

    bt.onclick = function() {
        model.style.display = "block";
    }

    span.onclick = function() {
        model.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == model) {
            model.style.display = "none";
        }
    }
}