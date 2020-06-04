// paralax
$(window).scroll(function () {

    var tes = $(this).scrollTop();

    // jumbotron

    $('.jumbotron img').css({
        'transform': 'translate(0px, ' + tes / 5 + '%)'

    });
    $('.jumbotron h1').css({
        'transform': 'translate(0px, ' + tes / 2.5 + '%)'

    });
    $('.jumbotron p').css({
        'transform': 'translate(0px, ' + tes + '%)'

    });



});