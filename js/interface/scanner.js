function move (e){
    var inbounds = {x: false, y: false},
        offset = {
            x: start.x - (origin.x - e.clientX), 
            y: start.y - (origin.y - e.clientY)
        };

    inbounds.x = offset.x < 0 && (offset.x * -1) < bounds.w;
    inbounds.y = offset.y < 0 && (offset.y * -1) < bounds.h;
    
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

var $scanner, elbounds, bounds, origin, start, movecontinue = null;

function scannerInit(){
    $scanner = $(".scannerContainer .scanner");
    elbounds = {w: parseInt($scanner.width()), h: parseInt($scanner.height())};
	bounds = {w: 1920 - elbounds.w, h: 1200 - elbounds.h};
	origin = {x: 0, y: 0};
	start = {x: 0, y: 0};
	movecontinue = false;

    $scanner.bind('mousedown mouseup mouseleave', handle);
    $scanner.bind('dblclick', reset);
}

