// hardcoded
moment.tz.link('Australia/ACT|Australia/Hobart|Australia/Hobart');


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
		t = figTime(data['timeZoneId']);
		$("#"+p.ns+" .timeString").html(t);
		$("#"+p.ns+" .timezoneString").html(data['timeZoneName']);


	});

}


function showPerson(p){

	p = peeps[p];
	
	// get current time difference and timezome from Google API
	getCurTime(p)

}


function figTime(timezone){

	var t = new Date().toISOString();
	var m = moment(t);
	m.tz(timezone);
	// console.log(m.toString());
	return m.toString();

}

$(document).ready(function(){
	$(".fe_forecast_link").remove();
})