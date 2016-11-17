window.addEventListener("load", onLoad, false);

var lastTime = localStorage["lastTime"];
//localStorage.removeItem("lastTime");

function onLoad () 
{
	var commentBtn = document.getElementById("commentBtn");
	commentBtn.addEventListener("click", onCommentPrompt, false);
	document.getElementById("last_comment").innerHTML = checkLastActivity ();
}

function onCommentPrompt() 
{
	localStorage["lastTime"]=Date.parse(Date.now());	
	var question = window.prompt('Wprowadź treść pytania. Nasz konsultant odpowie Ci w przeciągu 24 godzin!');	
	
	var message = ' ';
	var lastComment = document.getElementById("last_comment");
	if (question != null || question == undefined)
	{
		message+="Twoje pytanie: " + question + "\n" + checkLastActivity();
	}
	lastComment.innerHTML = message;
	checkLastActivity();
	
}

function getTimeDiff(time1, time2) 
{
	var diff = Math.abs(time1 - time2 );
	return Number(diff);
}

function checkLastActivity ()
{
	var lastComment;
	var lastTime = localStorage["lastTime"];	
	var message = ' ';
	if (lastTime != undefined)
	{
		
		
		lastComment = "Twoje ostatnie pytanie zostało zadane "+getTimeDiff(Date.parse(Date.now()), lastTime)+" minut temu";
	} else 
	{
		lastComment = "Nie zadałeś żadnego pytania.";
	}	
	return lastComment;
}