function move (e){
    var inbounds = {x: false, y: false},
        offset = {
            x: start.x - (origin.x - e.clientX), 
            y: start.y - (origin.y - e.clientY)
        };

    inbounds.x = offset.x < 0 && (offset.x * -1) < bounds.w;
    inbounds.y = offset.y < 0 && (offset.y * -1) < bounds.h;
    
    $minimap.css("margin-top", -offset.y * ($minimap.height() / elbounds.h));
    $minimap.css("margin-left", -offset.x * ($minimap.width() / elbounds.w));

    if (movecontinue && inbounds.x && inbounds.y) {
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
    start = {x: 0, y: 0};
    $(this).css('backgroundPosition', '0 0');
}

var $scanner, $minimap, elbounds, bounds, origin, start, movecontinue = null, backgroundSize;

function scannerInit(){

	backgroundSize = {w: 1400, h: 960};

	$container = $(".scannerContainer");
    $scanner = $(".scannerContainer .scanner");
    $minimap = $(".scannerContainer .scannerMinimap .marker");
    $minimap.css("width", $(".scannerContainer .scannerMinimap").width()/(backgroundSize.w/$container.width()));
    $minimap.css("height", $(".scannerContainer .scannerMinimap").height()/(backgroundSize.h/$container.height()));

    elbounds = {w: parseInt($scanner.width()), h: parseInt($scanner.height())};
	bounds = {w: backgroundSize.w - elbounds.w, h: backgroundSize.h - elbounds.h};
	origin = {x: 0, y: 0};
	start = {x: 0, y: 0};
	movecontinue = false;

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
