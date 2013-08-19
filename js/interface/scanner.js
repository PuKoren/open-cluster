function move (e, force){
    var inbounds = {x: false, y: false},
        offset = {
            x: start.x - (origin.x - e.clientX), 
            y: start.y - (origin.y - e.clientY)
        };

    inbounds.x = offset.x < 0 && (offset.x * -1) < bounds.w;
    inbounds.y = offset.y < 0 && (offset.y * -1) < bounds.h;
    
    $minimap.css("margin-top", -offset.y * ($minimap.height() / elbounds.h));
    $minimap.css("margin-left", -offset.x * ($minimap.width() / elbounds.w));

    //$zone9.attr('cx', offset.x + $container.width() + 'px');

    if (force || (movecontinue && inbounds.x && inbounds.y)) {
        start.x = offset.x;
        start.y = offset.y;
        
        $(this).css('background-position', start.x + 'px ' + start.y + 'px');
    }
    
    origin.x = e.clientX;
    origin.y = e.clientY;
    
    e.stopPropagation();
    return false;
}

function handle (e){
    movecontinue = false;
    $scanner.unbind('mousemove', move);
    
    if (e.type == 'mousedown') {
        origin.x = e.clientX;
        origin.y = e.clientY;
        movecontinue = true;
        $scanner.bind('mousemove', move);
    } else {
        $(document.body).focus();
    }
    
    e.stopPropagation();
    return false;
}

function reset (){
	origin = {x: 0, y: 0};
    start = {x: 0, y: 0};
    $(this).css('backgroundPosition', 'center');
    resetMarker();
    move({clientY: -(backgroundSize.h - $container.height())/2, clientX: -(backgroundSize.w - $container.width())/2, stopPropagation: function(){}}, true);
    $zone9.attr('cx', ($container.width())/2 + 'px');
    $zone9.attr('cy', ($container.height())/2 + 'px');
}

var $scanner, $minimap, elbounds, bounds, origin, start, movecontinue = null, backgroundSize;

function scannerInit(){

	backgroundSize = {w: 1400, h: 960};

	$container = $(".scannerContainer");
	$zone9 = $("#zone9");
    $scanner = $(".scannerContainer .scanner");
    $minimap = $(".scannerContainer .scannerMinimap .marker");
    $minimap.css("width", $(".scannerContainer .scannerMinimap").width()/(backgroundSize.w/$container.width()));
    $minimap.css("height", $(".scannerContainer .scannerMinimap").height()/(backgroundSize.h/$container.height()));

    elbounds = {w: parseInt($scanner.width()), h: parseInt($scanner.height())};
	bounds = {w: backgroundSize.w - elbounds.w, h: backgroundSize.h - elbounds.h};
	origin = {x: 0, y: 0};
	start = {x: 0, y: 0};
	movecontinue = false;

    move({clientY: -(backgroundSize.h - $container.height())/2, clientX: -(backgroundSize.w - $container.width())/2, stopPropagation: function(){}}, true);
    $zone9.attr('cx', ($container.width())/2 + 'px');
    $zone9.attr('cy', ($container.height())/2 + 'px');

    $scanner.bind('mousedown mouseup mouseleave', handle);
    $scanner.bind('dblclick', reset);
    jQuery(window).resize(function() {
    	resetMarker();
    });
}

function resetMarker(){
    elbounds = {w: parseInt($scanner.width()), h: parseInt($scanner.height())};
	bounds = {w: backgroundSize.w - elbounds.w, h: backgroundSize.h - elbounds.h};
    $minimap.css("width", $(".scannerContainer .scannerMinimap").width()/(backgroundSize.w/$container.width()));
    $minimap.css("height", $(".scannerContainer .scannerMinimap").height()/(backgroundSize.h/$container.height()));
}
