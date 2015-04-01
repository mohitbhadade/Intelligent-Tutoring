window.ch =1 ;

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }

function setCh(id){
window.ch = id;
}

function changeChoice(id){
setCh(id);
firstCall();
}

function getUname(){
var uname; 
$.ajax({
            type: 'POST',
            url: 'username.php',
	    async : false,	                
            success: function(data){ 
		uname = data;
            }

            });
return uname;
}

function getCheckedlist(json){
		var len= json.options.length;
	        var temp=[];
		var j=0;
                for (var i = 0; i < len; i++) {
			var cur_id= "ans"+i;
			if(document.getElementById(cur_id).checked==true)
				temp[j++] = document.getElementById(cur_id).value;
				
		}	
var returnjson = {'questionReturned': json.qcontent, 'useranswer':temp, 'nonterminals':json.nonterminals, 'incorrect':json.incorrect, 'correct':json.correct, 'wrong':json.wrong, 'right': json.right,'state': json.state,'sym':json.sym, 'uname':json.uname,'ch':json.ch};
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
	if(!json.isItLastQuestion){    
        $( "<div>").html( "<h4><b><em><pre>"+json.qcontent+"</pre></em></b></h4>" ).appendTo( "#section" );
        if(json.warning)
		$("<div>").html("<p><font color=\"red\"><pre>Warning : Whoo, Look again !!</pre></font> </p>").appendTo("#section"); 
	var len = json.options.length;
        if(json.state==1)
		for (var i = 0; i < len; i++) {
                    $("<div>").html( "<input type=\"checkbox\" id=\"ans"+i+"\"name=\"option\" value=\""+json.options[i]+"\" >"+json.options[i]).appendTo("#section");
                }
	else 
		for (var i = 0; i < len; i++) {
                    $("<div>").html( "<input type=\"radio\" id=\"ans"+i+"\"name=\"option\" value=\""+json.options[i]+"\" >"+json.options[i]).appendTo("#section");
                }

         $("<div>").html("<button type=\"submit\" class=\"btn btn-primary\" >Submit</button>").click(function() {getCheckedlist(json);}).appendTo("#section");
	
	}
	else
		$("<div>").html("<h3>Quiz Complete</h3>").appendTo("#section");
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
        //alert( "The request is complete!" );
    }


});
};
window.firstCall= function() {window.getQuestion({'questionReturned':'', 'useranswer':[], 'nonterminals':[],'incorrect':[], 'correct':[],'wrong':'', 'right':'', 'state':'','sym':'', 'uname':getUname(), 'ch': window.ch});}
firstCall();
});
