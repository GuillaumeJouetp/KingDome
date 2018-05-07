$(document).ready(function() {

    var $carrousel = $('#carrousel'),
        $img = $('#carrousel img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    $carrousel.append('<div class="controls"><span class="prev"><img src="../res/icones/arrow-point-to-left.png"></span><span class="next"><img src="../res/icones/arrow-point-to-right.png"></span></div>');

    $('.next').click(function () {

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

    $('.prev').click(function () {

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