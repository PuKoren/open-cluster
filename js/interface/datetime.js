function updateTime(){
	var date = new Date();
	date.setYear(date.getFullYear() + 100);

	var h = date.getHours();
	var m = date.getMinutes();
	if (h<10) {h = "0" + h}
	if (m<10) {m = "0" + m}

	jQueryObjects.date.html(date.toDateString());
    jQueryObjects.time.html(h + ':' + m);
};

var jQueryObjects = {};

function dateTimeInit(){
	jQueryObjects.date = $('#date');
	jQueryObjects.time = $('#time');
    updateTime();
    setInterval(updateTime, 10000);
}