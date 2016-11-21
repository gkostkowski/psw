window.addEventListener("load", onLoad, false);

var lastTime = localStorage["lastTime"];


function onLoad () 
{
	var commentBtn = document.getElementById("commentBtn");
	commentBtn.addEventListener("click", onCommentPrompt, false);
	document.getElementById("last_comment").innerHTML = checkLastActivity();

	var date = new Date();
}

function onCommentPrompt() 
{
	
	var question = window.prompt('Wprowadź treść pytania. Nasz konsultant odpowie Ci w przeciągu 24 godzin!');	
	
	var message = ' ';
	var lastComment = document.getElementById("last_comment");
	if (question != null && question != undefined)
	{
		localStorage["lastTime"]=new Date(Date.now());
		message+="Twoje pytanie: " + question + '. ' + checkLastActivity();
	} else 
	{
		message='';
	}
	lastComment.innerHTML = message;
	checkLastActivity();
	
}

function getTimeDiff(time1, time2) 
{
	var diff = Math.abs(getSeconds(time1) - getSeconds(time2) );
	return diff;
}

function getSeconds (time)
{
	return time.getHours()*60*60 + time.getMinutes()*60+ time.getSeconds();
}

function checkLastActivity ()
{
	var lastComment;
	var lastTime = new Date(localStorage["lastTime"]);	

	var message = ' ';
	if (lastTime != undefined )
	{
		var timeVal =0;
		lastComment = "Twoje ostatnie pytanie zostało zadane ";
		var timeDiff = getTimeDiff(new Date(Date.now()), lastTime);
		lastComment+= timeDiff <= 60 ? timeDiff+" sekund"+getCorrectNumberName(timeDiff)+" temu":
			(timeDiff <= 3600 ? timeVal = Math.floor(timeDiff/60)+" minut"+getCorrectNumberName(timeVal)+" temu":
			 timeVal = Math.floor(timeDiff/3600)+" godzin"+getCorrectNumberName(timeVal)+" temu");
	} else 
	{
		lastComment = "Nie zadałeś żadnego pytania.";
	}	
	return lastComment+'.';
}

function getCorrectNumberName (number) 
{
	var ending;
	switch (number)
	{
		case 1: ending = 'ę'; break;
		case 2:
		case 3:
		case 4: ending =  'y'; break;
		default: ending =  ''; break;
	}
	return ending;
}