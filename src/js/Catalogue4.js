$(document).ready(function() {

    var $carrousel4 = $('#carrousel4'),
        $img = $('#carrousel4 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    $carrousel4.append('<div class="controls"> <span class="prev4"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next4"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

    $('.next4').click(function () {

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

    $('.prev4').click(function () {

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