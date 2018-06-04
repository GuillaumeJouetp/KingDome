function ajoutMaison() {
    // Get the modal
    var model = document.getElementById('myModel');

    // Get the button that opens the modal
    var bt = document.getElementById("myBt");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close2")[0];

    // When the user clicks the button, open the modal
    bt.onclick = function() {
        model.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        model.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == model) {
            model.style.display = "none";
        }
    }
}