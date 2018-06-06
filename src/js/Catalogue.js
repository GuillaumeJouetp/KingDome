$(document).ready(function() {

    var $carrousel = $('#carrousel1'),
        $img = $('#carrousel1 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev1"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next1"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next1').click(function () {

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

        $('.prev1').click(function () {

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel2'),
        $img = $('#carrousel2 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev2"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next2"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next2').click(function () {

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

        $('.prev2').click(function () {

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel3'),
        $img = $('#carrousel3 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev3"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next3"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

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

    }

})

$(document).ready(function() {

    var $carrousel = $('#carrousel4'),
        $img = $('#carrousel4 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev4"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next4"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel5'),
        $img = $('#carrousel5 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev5"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next5"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next5').click(function () {

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

        $('.prev5').click(function () {

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel6'),
        $img = $('#carrousel6 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev6"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next6"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next6').click(function () {

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

        $('.prev6').click(function () {

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel7'),
        $img = $('#carrousel7 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev7"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next7"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next7').click(function () {

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

        $('.prev7').click(function () {

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel8'),
        $img = $('#carrousel8 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev8"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next8"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next8').click(function () {

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

        $('.prev8').click(function () {

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel9'),
        $img = $('#carrousel9 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev9"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next9"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next9').click(function () {

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

        $('.prev9').click(function () {

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

    }

});

$(document).ready(function() {

    var $carrousel = $('#carrousel10'),
        $img = $('#carrousel10 img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.css('display', 'none');
    $currentImg.css('display', 'block');

    if ($img.length > 1) {

        $carrousel.append('<div class="controls"> <span class="prev10"><img src="../res/icones/arrow-point-to-left.png"></span> <span class="next10"><img src="../res/icones/arrow-point-to-right.png"></span> </div>');

        $('.next10').click(function () {

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

        $('.prev10').click(function () {

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

    }

});
