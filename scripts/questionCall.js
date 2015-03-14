

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }



$(document).ready(function(){
window.getQuestion=function(sample){
	$.ajax({
 
    // The URL for the request
    url: "/question",
 
    // The data to send (will be converted to a query string)
    data: {
	anslist :
	sample
    },
 
    // Whether this is a POST or GET request
    type: "GET",
 
    // The type of data we expect back
    dataType : "json",
 
    // Code to run if the request succeeds;
    // the response is passed to the function
    success: function( json ) {
        $('#section').html("");
	$( "<div>" ).html( json.qid ).appendTo( "#section" );
        $( "<div>").html( "<h3>"+json.qcontent+"</h3>" ).appendTo( "#section" );
        $( "<div>").html( "<h3>Checking the sym value : "+json.sym+"</h3>" ).appendTo( "#section" );
        
	var len = json.options.length;
                for (var i = 0; i < len; i++) {
                    $("<div>").html( "<input type=\"checkbox\" name=\"option\" >"+json.options[i]).appendTo("#section");
                }	
         $("<div>").html("<button type=\"submit\" class=\"btn btn-primary\" onclick=\"getQuestion('"+escapeHtml(json.sym)+"')\">Submit Answer</button>").appendTo("#section");
	
		//$( "<div class=\"content\">").html( json.html ).appendTo( "body" );
    },
 
    // Code to run if request fails; the raw request and
    // status codes are passed to the function
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
 
    // Code to run regardless of success or failure
    complete: function( xhr, status ) {
        alert( "The request is complete!" );
    }


});
};
window.getQuestion('check');

});
