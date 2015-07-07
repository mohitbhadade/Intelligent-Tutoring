window.ch =1 ;
window.temp=[];
window.inputstring="";
window.rowstring="";
window.permanentMovesstk=[];
window.rowstringcount=0;
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

function printTable(json){

	var table = $('#tablediv').clone().show().appendTo("#section").find("#tablebody");
	//		var arr= [["A","i12","1GB","0","0","0","0","0","0"],["B","20","100","0","0","0","0","0","0"],["C","30","40","0","0","0","0","0","0"]];
	var arr= json.printedlltable;
	var row= $('<tr>');
	row.append($('<th>').html("<pre>Parsing\nTable</pre>"));	
	if(json.keys)
		for (i=0; i<json.keys.length; i++){
			row.append($('<th>').html(json.keys[i]));
		}
	if(json.symbols){
		var index=[];
		for(var x in json.symbols)
			index.push({'key':json.symbols[x],'value':x});
		index.sort(function(a,b){
			return a['key']==b['key']?0 : (a['key']>b['key']? 1: -1);			
		});
		
		for (i=0; i<index.length; i++){
			row.append($('<th>').html(index[i].value));
		}

	}

	table.append(row);
	for(i in arr){
		var rowdata= arr[i];
		var index=0;

		if(json.keys)
			for(k=0;k< json.keys.length;k++){
				if(json.tablecol == json.keys[k])
					index=k;
			}



		var row=$('<tr>');
		var rowhead = $('<th>');
		rowhead.html(i);
		row.append(rowhead);		
		for(j=0; j< rowdata.length; j++){

			if(rowdata[j]=="ERROR" || rowdata[j]=="")	
				if(j==index && i==json.tablerow)
					row.append($('<td class=\'thigh\' ondrop=\"drop(event)\" ondragover=\"allowDrop(event)\">').html(""));
				else
					row.append($('<td>').html(""));

			else
				if(json.ch==3 || json.ch==4 || json.ch==9)
				row.append($('<td>').html(i+" -> "+rowdata[j]));
				else
				row.append($('<td>').html(rowdata[j]));


		}
		table.append(row);
	}


}

function printStatictable(json){
	if(json.ch==9){
		if(json.llparsinganswercounter==4){
			var statictable = $('#statictablediv').clone().show().appendTo("#section").find('#statictablebody');
			var arr1= [["Obj1","Obj2","3"],["Obj3","obj4","3"],["Obj3","Obj4","4"]];
			var row1= $('<tr>');

			var headarr=["Stack","Input String","Output"];

			for(i in headarr)
				row1.append($('<th class=\"statictable\" class=\"text-left\">').html(headarr[i]));	

					statictable.append(row1);

			for(i in arr1){
				var row = $('<tr class=\"statictable\">');
				var rowdata= arr1[i];
				for(j in rowdata){
					row.append($('<td class=\"statictable\" class=\"text-left\">').html(rowdata[j]));
				}
				statictable.append(row);
			}
		}
	}

	if((json.ch==4 || json.ch==7)&& json.state==1){

		if(json.multipopflag==1)
			window.permanentMovesstk = json.movesstk;
		else 
			window.permanentMovesstk = json.permanentMovesstk;
		var statictable = $('#statictablediv').clone().show().appendTo("#section").find('#statictablebody');
		var arr1=[[]];
		var moveindex= json.nextmoveindex-1;
		var rowcount=moveindex;
		var row=[];
		var i, j=0;
		for(i=window.permanentMovesstk.length-1;moveindex>0 && i>=0;i--){

			row =window.permanentMovesstk[i].split("  ");
			moveindex--;
			arr1[j++] = row;
		}

		json.nextmoveindex+=1;
		if(json.ch==4)
			arr1[j]=["","",""];
		else
			arr1[j]=["",""];
		var row1= $('<tr>');
		var headarr=[];
		if(json.ch==4)
			headarr=["Stack","Input String","Output"];
		else
			headarr=["stack","Input String"];
		for(i in headarr)
			row1.append($('<th class=\"statictable\" class=\"text-left\">').html(headarr[i]));	

				statictable.append(row1);

		for(i in arr1){
			var row = $('<tr class=\"statictable\">');
			var rowdata= arr1[i];
			for(j in rowdata){
				if(i!=rowcount)
					row.append($('<td class=\"statictable\" class=\"text-left\">').html(rowdata[j]));
				else
					row.append($('<td style=\"background-color: grey; border:6px solid black;\" class=\"statictable\" class=\"text-left \"ondrop=\"drop(event)\" ondragover=\"allowDrop(event)\">').html(rowdata[j]));

			}
			if(i==rowcount)
				row.attr("id","highlightedrow");

			statictable.append(row);
		}


	}




}

function changeChoice(id){
	if(id==4 || id==7){
		window.inputstring = prompt("Enter a 'SPACE SEPARATED' string for parsing", "");
		if(window.inputstring==null)
		{
			alert("Please enter a string first");
			changeChoice(id);
		}
		else{
			setCh(id);
			firstCall();
		}
	}
	else{
		setCh(id);
		firstCall();
	}
}

function optionDrag(ev){
	ev.dataTransfer.setData("sample data", ev.target.id);
}
function submitDraggedOptions(json){
	
	var tempcount;
	if(ch==9)
		tempcount= json.llparsinganswercounter+1;
	//	alert("tempcount"+tempcount);
	var highlightedCells = $('#highlightedrow td');	

	if(json.ch==4 || json.ch==7){
		
		if(json.ch==4 && window.rowstringcount!=3)
			alert("Please fill all the entries before you submit");

		else if (json.ch==7 && window.rowstringcount!=2)
			alert("Please fill all the entries before you submit");

		else{
			window.rowstringcount=0;
			highlightedCells.each(function(i,elem) {
				window.rowstring += document.getElementById(elem.childNodes[0].childNodes[0].id).value + "  ";
			});

			window.rowstring= $.trim(window.rowstring);
			var returnjson = {'questionReturned': json.qcontent, 'useranswer':[], 'nonterminals':json.nonterminals, 'incorrect':json.incorrect, 'correct':json.correct, 'wrong':json.wrong, 'right': json.right,'state': json.state,'sym':json.sym, 'uname':json.uname,'dname':json.dname, 'ch':json.ch,'llcellstk':json.llcellstk, 'llcell':json.llcell, 'cellnoset':json.cellnoset, 'tableanswer':window.temp,'tablerow':json.tablerow, 'tablecol':json.tablecol, 'llparsinganswercounter': tempcount,'sizeitem':json.sizeitem, 'sizestk':json.sizestk,'flag':json.flag,'inputstring':json.inputstring, 'rowstring':window.rowstring, 'movesstk':json.movesstk,'nextmove':json.nextmove,'nextmoveindex':json.nextmoveindex, 'multipopflag':json.multipopflag,'movesoptions':json.movesoptions,'permanentMovesstk':window.permanentMovesstk/*,'userdefinedlltable':json.userdefinedlltable*/};
			window.rowstring="";
			getQuestion(returnjson);
		}
	}
	else{

		var returnjson = {'questionReturned': json.qcontent, 'useranswer':[], 'nonterminals':json.nonterminals, 'incorrect':json.incorrect, 'correct':json.correct, 'wrong':json.wrong, 'right': json.right,'state': json.state,'sym':json.sym, 'uname':json.uname,'dname':json.dname, 'ch':json.ch,'llcellstk':json.llcellstk, 'llcell':json.llcell, 'cellnoset':json.cellnoset, 'tableanswer':window.temp,'tablerow':json.tablerow, 'tablecol':json.tablecol, 'llparsinganswercounter': tempcount,'sizeitem':json.sizeitem, 'sizestk':json.sizestk,'flag':json.flag,'inputstring':json.inputstring, 'rowstring':window.rowstring, 'movesstk':json.movesstk,'nextmove':json.nextmove,'nextmoveindex':json.nextmoveindex, 'multipopflag':json.multipopflag,'movesoptions':json.movesoptions,'permanentMovesstk':window.permanentMovesstk/*,'userdefinedlltable':json.userdefinedlltable*/};
		getQuestion(returnjson);

	}

}
function drop(ev) {
	ev.preventDefault();
	var data = ev.dataTransfer.getData("sample data");
	var maindiv = $('#optionsdiv'); 
	if(maindiv[0].contains(ev.target)){
		maindiv[0].appendChild(document.getElementById(data));
	}
	else{
		if(ev.target.nodeName == "TD" && ev.target.childElementCount==0)
			ev.target.appendChild(document.getElementById(data));
		else 
			return false;
	}
	var inputdata = document.getElementById(data).children;
	var highlightedCells = $('#highlightedrow td');
	var selectedOptions = 0;
	//	alert(inputdata[0].value);
	highlightedCells.each(function(i,elem) {
		selectedOptions += elem.childElementCount;
	});
	window.rowstringcount = selectedOptions;
	window.temp[0]= inputdata[0].value;

}
function allowDrop(ev) {
	ev.preventDefault();
}
function getFname(){
	var fname; 
	$.ajax({
		type: 'POST',
		url: 'filename.php',
		async : false,	                
		success: function(data){ 
			fname = data;
		}

	});
	return fname;
}
function getDname(){
	var dname; 
	$.ajax({
		type: 'POST',
		url: 'dirname.php',
		async : false,	                
		success: function(data){ 
			dname = data;
		}

	});

	dname = dname.replace('\n',"");
	return dname;
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
	var returnjson = {'questionReturned': json.qcontent, 'useranswer':temp, 'nonterminals':json.nonterminals, 'incorrect':json.incorrect, 'correct':json.correct, 'wrong':json.wrong, 'right': json.right,'state': json.state,'sym':json.sym, 'uname':json.uname, 'dname':json.dname, 'ch':json.ch,'llcellstk':json.llcellstk, 'llcell':json.llcell, 'cellnoset':json.cellnoset,'tableanswer':[],'tablerow':json.tablerow, 'tablecol':json.tablecol,'inputstring':json.inputstring,'movesstk':json.movesstk,'nextmove':json.nextmove,'nextmoveindex':json.nextmoveindex, 'multipopflag':json.multipopflag,'movesoptions':json.movesoptions,'permanentMovesstk':window.permanentMovesstk};
	getQuestion(returnjson);

}

$(document).ready(function(){
	$(document).ajaxStart(function(){
		$("#loader").css("display","block");
	});
	$(document).ajaxComplete(function(){
		$("#loader").css("display","none");
	});
	toastr.options = {
		"closeButton": false,
"debug": false,
"newestOnTop": false,
"progressBar": false,
"positionClass": "toast-top-center",
"preventDuplicates": false,
"onclick": null,
"showDuration": "100",
"hideDuration": "1000",
"timeOut": "3000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
	};
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
				$(document.getElementById('naviright')).hide();
				if(!json.valid)
					window.location=('/pages/tutorial.php?invalid=Please upload a valid grammar !!');
				if(json.leftrecursive && (json.ch==3 || json.ch==9 || json.ch==4))
					toastr["info"]("Your grammar is left recursive. Cannot generate quiz for that link. Please navigate to some other link");
					
				else if(!json.isItLastQuestion){    
					if(json.warning)
						toastr["warning"]("Whoo: Look Again");
				
					if(json.repeatNotifier)
						toastr["info"]("Lets try it again");
					
					if(json.correctNotifier && json.ch!=9)
						toastr["success"]("Bingo.. Its correct");
					
					if(json.leftfactor)
						toastr["success"]("Your uploaded GRAMMAR required left factoring. We present you a quiz for the left factored grammar.");


					
					$( "<div>").html( "<em><pre><h4><b>"+json.qcontent+"</b></h4></pre></em>" ).appendTo( "#section" );
					if(json.ch==3 || json.ch==9 || json.ch==4 || json.ch==7){

						if(json.ch==4 || json.ch==7){
							printTable(json);
							printStatictable(json);
						}
						else if(json.ch==9){
							printStatictable(json);
							printTable(json);

						}
						else if(json.ch==3)
							printTable(json);
						

						$('#naviright').html("");
						$('#naviright').show();
						/*	$("<div>").html("<h3><p><em>FIRST SET</em></p></h3>").appendTo("#naviright");
							$("<div>").html("<pre>"+json.firstSet+"</pre>").appendTo("#naviright");
							$("<div>").html("<h3><p><em>FOLLOW SET</em></p></h3>").appendTo("#naviright");
							$("<div>").html("<pre>"+json.followSet+"</pre>").appendTo("#naviright");
							*/
						if(json.ch==6 || json.ch==7)
						$('<div/>',{id:'accordion', 'class':'panel-group'}).append(' <div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#accordion\" href="#collapseCanonical">Canonical Set</a></h4></div><div id="collapseCanonical" class=\"panel-collapse collapse\"><div class=\"panel-body\" style=\"color:black\"><pre>'+json.canSet+'</pre></div></div></div><div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#accordion\" href="#collapseFirst">First Set</a></h4></div><div id="collapseFirst" class=\"panel-collapse collapse\"><div class=\"panel-body\" style=\"color:black\"><pre>'+json.firstSet+'</pre></div></div></div><div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#accordion\" href="#collapseFollow">Follow Set</a></h4></div><div id="collapseFollow" class=\"panel-collapse collapse\"><div class=\"panel-body\" style=\"color:black\"><pre>'+json.followSet+'</pre></div></div></div>').appendTo("#naviright");

						else	
						$('<div/>',{id:'accordion', 'class':'panel-group'}).append(' <div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#accordion\" href="#collapseFirst">First Set</a></h4></div><div id="collapseFirst" class=\"panel-collapse collapse\"><div class=\"panel-body\" style=\"color:black\"><pre>'+json.firstSet+'</pre></div></div></div><div class=\"panel panel-info\"><div class=\"panel-heading\"><h4 class\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#accordion\" href="#collapseFollow">Follow Set</a></h4></div><div id="collapseFollow" class=\"panel-collapse collapse\"><div class=\"panel-body\" style=\"color:black\"><pre>'+json.followSet+'</pre></div></div></div>').appendTo("#naviright");


					}


					var len = json.options.length;
					if(json.ch==1 || json.ch==2){
						if(json.state==1){
							for (var i = 0; i < len; i++) {
								$("<div>").html( "<pre><input type=\"checkbox\" id=\"ans"+i+"\"name=\"option\" value=\""+json.options[i]+"\" >"+json.options[i]+"</pre>").appendTo('#section');
							}
						}
						else 
							for (var i = 0; i < len; i++) {
								$("<div>").html( "<input type=\"radio\" id=\"ans"+i+"\"name=\"option\" value=\""+json.options[i]+"\" >"+json.options[i]).appendTo("#section");
							}

					}

					else {
						if(json.state==1){
							var maindiv= $('<div/>',{id:'optionsdiv', ondrop:'drop(event)', ondragover:'allowDrop(event)'});
							for (var i = 0; i < len; i++) {
								$("<div class=\"col-md-3\" id=\"divans"+i+"\" draggable=\"true\" ondragstart=\"optionDrag(event)\">").html( "<input id=\"ans"+i+"\"name=\"option\" style=\"background:#363B36; color:white; padding: 4px\" readonly value=\""+json.options[i]+"\" >").appendTo(maindiv);
							}
							maindiv.appendTo('#section');
						}
						else 
							for (var i = 0; i < len; i++) {
								$("<div>").html( "<input type=\"radio\" id=\"ans"+i+"\"name=\"option\" value=\""+json.options[i]+"\" >"+json.options[i]).appendTo("#section");
							}


					}	
					if(json.state!=1 || (json.ch!=3 && json.ch!=9 && json.ch!=4 && json.ch!=7))			
						$("<div>").html("<button type=\"submit\" class=\"btn btn-primary\" >Next</button>").click(function() {getCheckedlist(json);}).appendTo("#section");
					else 
						$("<div class=\"col-md-12\">").html("<button  type=\"submit\" class=\"btn btn-primary\" >Next</button>").click(function() {submitDraggedOptions(json);}).appendTo("#section");

				}


				else
					$("<div>").html("<h3>Quiz Complete</h3><br><h4><font color=\"blue\">Please navigate to another link in order to play for other category of questions.</font></h4>").appendTo("#section");
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
	window.firstCall= function() {window.getQuestion({'questionReturned':'', 'useranswer':[], 'nonterminals':[],'incorrect':[], 'correct':[],'wrong':'', 'right':'', 'state':'','sym':'', 'uname':getFname(),'dname':getDname(), 'ch': window.ch, 'llcellstk':[], 'llcell':[], 'cellnoset':[], 'tableanswer':[], 'tablerow':'', 'tablecol':'', 'llparsinganswercounter':0, 'sizeitem':-1, 'sizestk':[], 'flag':0, 'rowstring':"",'inputstring':window.inputstring, 'multipopflag':0/*, 'userdefinedlltable':[]*/});}
	firstCall();
});
