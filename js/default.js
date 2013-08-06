function updateTime(){
	var date = new Date();
	date.setYear(date.getFullYear() + 100);

	var h = date.getHours();
	var m = date.getMinutes();
	if (h<10) {h = "0" + h}
	if (m<10) {m = "0" + m}

	$('#date').html(date.toDateString());
    $('#time').html(h + ':' + m);
};

function fitTextInit(){
	$(".title").fitText(1.1, {minFontSize: '20px', maxFontSize: '50px'});
};

$(document).ready( function() {
	fitTextInit();
    updateTime();
    setTimeout(updateTime, 10000);
});