// hardcoded
moment.tz.link('Australia/ACT|Australia/Hobart|Australia/Hobart');
m = null;


function getCurTime(p){

	var url_root = "https://maps.googleapis.com/maps/api/timezone/json?location="+p.latitude+","+p.longitude+"&timestamp="+Math.floor(Date.now() / 1000)+"&sensor=false&key=AIzaSyCeQdQT6CloU2pGRXIQJatS4wPRXpNCDJU";

	$.ajax({
	  dataType: "json",
	  url: url_root,
	}).done(function(data){

		console.log("Google Timezone Data:",data);

		// location
		$("#"+p.ns+" .latitude").html(p.latitude);
		$("#"+p.ns+" .longitude").html(p.longitude);
		
		// update time
		t = figTime(p,data['timeZoneId']);		
		$("#"+p.ns+" .timeString").html(t);
		$("#"+p.ns+" .timezoneString").html(data['timeZoneName']);

	});

}


function showPerson(p){

	p = peeps[p];
	
	// get current time difference and timezome from Google API
	getCurTime(p)

}


function figTime(p,timezone){

	var t = new Date().toISOString();	
	m = moment(t);
	m.tz(timezone);
	console.log(m._d);
	
	// hour offset for analog clock
	hour_offset = numFormat(m._offset / 60);

	// fire clock	
	clock_string = '<canvas id="'+p.ns+'_clock_canvas" class="CoolClock:Null:45:seconds:'+hour_offset+' clock"></canvas>';
	$("#"+p.ns+"_clock").html(clock_string);	
	CoolClock.findAndCreateClocks();

	// return string
	date_string = m.toString();
	temp = date_string.split(" ");
	console.log(temp);
	date_string_return = temp[0] + ", " + temp[1] + " " + temp[2] + ", " + temp[3]
	return date_string_return;

}

function numFormat(n) {
    return (n>0?'+':'') + n;
}

$(document).ready(function(){
	$(".fe_title").remove();

})