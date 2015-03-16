

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }

function printcheckedlist(json){
		var len= json.options.length;
	        var temp=[];
		var j=0;
                for (var i = 0; i < len; i++) {
			if(document.getElementById(i).checked==true)
				temp[j++] = document.getElementById(i).value;
				
		}	
var returnjson = {'questionReturned': json.sym, 'useranswer':temp, 'nonterminals':json.nonterminals, 'incorrect':json.incorrect, 'correct':json.correct, 'wrong':json.wrong, 'right': json.right};
getQuestion(returnjson);

}

$(document).ready(function(){
window.getQuestion=function(sample){
	$.ajax({
 
    // The URL for the request
    url: "/question",
 
    // The data to send (will be converted to a query string)
    data: JSON.stringify(sample),
 
    // Whether this is a POST or GET request
    type: "POST",
 
    // The type of data we expect back
    contentType : "application/json",
 
    // Code to run if the request succeeds;
    // the response is passed to the function
    success: function( json ) {
        $('#section').html("");
        $( "<div>").html( "<h3>"+json.qcontent+"</h3>" ).appendTo( "#section" );
        
	var len = json.options.length;
                for (var i = 0; i < len; i++) {
                    $("<div>").html( "<input type=\"checkbox\" id=\""+i+"\"name=\"option\" value=\""+json.options[i]+"\" >"+json.options[i]).appendTo("#section");
                }	
         $("<div>").html("<button type=\"submit\" class=\"btn btn-primary\" >Submit Answer</button>").click(function() {printcheckedlist(json);}).appendTo("#section");
	
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
window.getQuestion({'questionReturned':'', 'useranswer':[], 'nonterminals':[],'incorrect':[], 'correct':[],'wrong':'', 'right':''});

});
