/*
function addCity()
{
	var xmlhttp;
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("dopeDiv").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","addCity.txt",true);
	xmlhttp.send();
document.getElementById("dopeDiv").innerHTML=xmlhttp.responseText;
}
*/

$(city-input).bind("keydown", function() {
	console.dir(boop);
	populate();
});

// function to be called on every key press in the text-box
function populate(){
	var input = $('#city_input').val();
	console.dir(input);
	options = {
		"url": "https://babbage.cs.missouri.edu/~pld9bc/hackillinois/trvBud/include/util/autoTextbox.php",
		"content": "data",
		"format": "json"
	};
	$.get("https://babbage.cs.missouri.edu/~pld9bc/hackillinois/trvBud/include/util/autoTextbox.php?search="+input, options, function(data) {
		processData(data);
	});// end get
}// end populate

processData( data ){
	console.dir(data);
}// end processData
