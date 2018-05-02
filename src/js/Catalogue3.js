$(document).ready(function() {

    var $carrousel3 = $('#carrousel3'),
        $img = $('#carrousel3 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    $carrousel3.append('<div class="controls"> <span class="prev3"><img src="../res/icones/gauche.png"></span> <span class="next3"><img src="../res/icones/droite.png"></span> </div>');

    $('.next3').click(function () {

        i++;

        if (i <= indexImg) {
            $img.css('display', 'none');
            $currentImg = $img.eq(i);
            $currentImg.css('display', 'block');
        }
        else {
            i = 0;
            $img.css('display', 'none');
            $currentImg = $img.eq(i);
            $currentImg.css('display', 'block');
        }

    });

    $('.prev3').click(function () {

        i--;

        if (i >= 0) {
            $img.css('display', 'none');
            $currentImg = $img.eq(i);
            $currentImg.css('display', 'block');
        }
        else {
            i = indexImg;
            $img.css('display', 'none');
            $currentImg = $img.eq(i);
            $currentImg.css('display', 'block');
        }

    });

});