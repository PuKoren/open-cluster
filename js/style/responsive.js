function responsiveInit(){
    jQuery(window).resize(function() {
    // This will fire each time the window is resized:
        if(jQuery(window).width() <= 800) {
            $(".thumbContainer .thumb").addClass("displayReset");
            $(".menu .menuItems ul li").addClass("displayReset");
        } else {
            $(".thumbContainer .thumb").removeClass("displayReset");
            $(".menu .menuItems ul li").removeClass("displayReset");
        }
    }).resize();
}