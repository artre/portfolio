// JavaScript Document

/* Global Variables
========================================================== */
var windowWidth = $(window).width();
var windowHeight = $(window).height();
// Cubes

if (windowWidth > 1189) {
    var cubeTopMove = "-123px";
    var cubeLeftMoveTop = "99px";
    var cubeLeftMoveLeft = "-95px";
    var cubeRightMoveTop = "99px";
    var cubeRightMoveLeft = "192px";
    // Move rhombs to default position
    var cubeTopPlace = "-12px";
    var cubeLeftPlaceTop = "44px";
    var cubeLeftPlaceLeft = "0";
    var cubeRightPlaceTop = "44px";
    var cubeRightPlaceLeft = "97px";
} else if (windowWidth < 1189) {
    var cubeTopMove = "-94px";
    var cubeLeftMoveTop = "70px";
    var cubeLeftMoveLeft = "-69px";
    var cubeRightMoveTop = "70px";
    var cubeRightMoveLeft = "142px";
    // Move rhombs to default position
    var cubeTopPlace = "-12px";
    var cubeLeftPlaceTop = "30px";
    var cubeLeftPlaceLeft = "0";
    var cubeRightPlaceTop = "30px";
    var cubeRightPlaceLeft = "72px";
}

/* Functions
========================================================== */
function moveCube1() {
    $(".cube_top").animate({
        top: cubeTopMove
    }, 900);
    $(".cube_left").animate({
        top: cubeLeftMoveTop,
        left: cubeLeftMoveLeft
    }, 900);
    $(".cube_right").animate({
        top: cubeRightMoveTop,
        left: cubeRightMoveLeft
    }, 900);
};

function placeCube1() {
    $(".cube_top").stop(true, false).animate({
        top: cubeTopPlace
    }, 700);
    $(".cube_left").stop(true, false).animate({
        top: cubeLeftPlaceTop,
        left: cubeLeftPlaceLeft
    }, 700);
    $(".cube_right").stop(true, false).animate({
        top: cubeRightPlaceTop,
        left: cubeRightPlaceLeft
    }, 700);
};

function moveCube2() {
    $(".cube_top_2").animate({
        top: cubeTopMove
    }, 900);
    $(".cube_left_2").animate({
        top: cubeLeftMoveTop,
        left: cubeLeftMoveLeft
    }, 900);
    $(".cube_right_2").animate({
        top: cubeRightMoveTop,
        left: cubeRightMoveLeft
    }, 900);
};

function placeCube2() {
    $(".cube_top_2").stop(true, false).animate({
        top: cubeTopPlace
    }, 700);
    $(".cube_left_2").stop(true, false).animate({
        top: cubeLeftPlaceTop,
        left: cubeLeftPlaceLeft
    }, 700);
    $(".cube_right_2").stop(true, false).animate({
        top: cubeRightPlaceTop,
        left: cubeRightPlaceLeft
    }, 700);
};

function moveCube3() {
    $(".cube_top_3").animate({
        top: cubeTopMove
    }, 900);
    $(".cube_left_3").animate({
        top: cubeLeftMoveTop,
        left: cubeLeftMoveLeft
    }, 900);
    $(".cube_right_3").animate({
        top: cubeRightMoveTop,
        left: cubeRightMoveLeft
    }, 900);
};

function placeCube3() {
    $(".cube_top_3").stop(true, false).animate({
        top: cubeTopPlace
    }, 700);
    $(".cube_left_3").stop(true, false).animate({
        top: cubeLeftPlaceTop,
        left: cubeLeftPlaceLeft
    }, 700);
    $(".cube_right_3").stop(true, false).animate({
        top: cubeRightPlaceTop,
        left: cubeRightPlaceLeft
    }, 700);
};


// Making yellow triangles in light_path_3 desapear on moblile screen size
var anglePath1 = $(".light_path_1").find(".angle_path, .angle_path2");
var anglePath2 = $(".light_path_2").find(".angle_path, .angle_path2");

function angleDisapear() {
    if (windowWidth < 580) {
        anglePath2.hide();
        anglePath1.hide();
    }
};


/* Document ready
==========================================================*/
$(document).ready(function() {

    $(".cube_1").mouseenter(moveCube1);
    $(".cube_1").mouseleave(placeCube1);
    $(".cube_2").mouseenter(moveCube2);
    $(".cube_2").mouseleave(placeCube2);
    $(".cube_3").mouseenter(moveCube3);
    $(".cube_3").mouseleave(placeCube3);

    var myName = $("#my-name");
    $("#main-menu").mouseenter(function() {
        $(myName).fadeOut(50);
    });
    $("#main-menu").mouseleave(function() {
        $(myName).fadeIn(50);
    });

    $('.about').click(function() {

        $('html, body').animate({
            scrollTop: $(".bottomGrey").offset().top
        }, 2000);

    });

    $('.rhomb_web').click(function() {
        $('html, body').animate({
            scrollTop: $(".bottomGrey_web").offset().top
        }, 2000);
    });

    $('.rhomb_oil').click(function() {
        $('html, body').animate({
            scrollTop: $(".bottomGrey").offset().top
        }, 2000);
    });

    $('.tothe_top').click(function() {
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 1000);
    });

    $('.see-top').click(function() {
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 1000);
    });

    angleDisapear();

});