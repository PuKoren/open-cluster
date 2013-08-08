var items = [".thumbContainer .thumb", ".menu .menuItems ul li"];

function responsiveInit(){

    for(var i = 0; i < items.length; i++){
        items[i] = $(items[i]);
    }

    jQuery(window).resize(function() {
    // This will fire each time the window is resized:
        if(jQuery(window).width() <= 800) {
            for(var i = 0; i < items.length; i++){
                items[i].addClass("displayReset");
            }
        } else {
            for(var i = 0; i < items.length; i++){
                items[i].removeClass("displayReset");
            }
        }
    }).resize();

    $(".title").fitText(1.1, {minFontSize: '20px', maxFontSize: '50px'});
}