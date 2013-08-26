var $body, $map, $minimap, $marker, $container;
var mapSize = {w: 1400, h: 960};
var origin = {x: 0, y: 0};
var smoothness = {x: 2, y: 2};

function resetMarker(){
	$marker.css('width', $minimap.width() * ($container.width()/mapSize.w));
	$marker.css('height', $minimap.height() * ($container.height()/mapSize.h));
}

function mouseMoveHandle(e){
	var offset = {x: (e.clientX - origin.x)/smoothness.x, y: (e.clientY - origin.y)/smoothness.y};
	var oldPosition = {x: parseFloat($map.css("margin-left")), y: parseFloat($map.css("margin-top"))};

	if((oldPosition.x >= - mapSize.w + $container.width() && offset.x <= 0) || (oldPosition.x <= 0 && offset.x >= 0)){
		$map.css("margin-left", oldPosition.x+offset.x+"px");
	}else{
		if(offset.x > 0){
			$map.css("margin-left", "0px");
		}else{
			$map.css("margin-left", - mapSize.w + $container.width()+"px");
		}
	}


	if((oldPosition.y >= - mapSize.h + $container.height() && offset.y < 0) || (oldPosition.y <= 0 && offset.y > 0)){
		$map.css("margin-top", oldPosition.y+offset.y+"px");
	}else{
		if(offset.y > 0){
			$map.css("margin-top", "0px");
		}else{
			$map.css("margin-top", - mapSize.y + $container.height()+"px");
		}
	}

	origin.x = e.clientX;
	origin.y = e.clientY;
}

function mouseClickHandle(e){
	if (e.type == 'mousedown') {
		origin.x = e.clientX;
		origin.y = e.clientY;
        $container.bind('mousemove', mouseMoveHandle);
    } else {
    	$container.unbind('mousemove');
        $(document.body).focus();
    }
    e.stopPropagation();
    return false;
}

function placeSVG(){
	$map.find('svg').css('width', mapSize.w);
	$map.find('svg').css('height', mapSize.h);

	$map.find('circle').each(function(index){
		$(this).attr("cx", mapSize.w/2);
		$(this).attr("cy", mapSize.h/2);
	});
}


function scannerInit(){
	$body = $("body");
	$container = $(".scannerContainer");
	$map = $container.find('.scanner');
	$minimap = $container.find('.scannerMinimap');
	$marker = $minimap.find('.marker');

	placeSVG();

	$map.find('img').load(function(){
		resetMarker();
	});

	$container.bind('mousedown mouseup mouseleave', mouseClickHandle);

	jQuery(window).resize(function() {
    	resetMarker();
    });
}