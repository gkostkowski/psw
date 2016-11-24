/*
*	zad 4, DOM
*	funkcjonalnosc 1: powiekszanie/pomniejszanie strony:
*	Shift + LPM / Ctrl + LPM / Alt + 0- powrot do domyslnego (100%)
*/

window.addEventListener("load", onLoad, false);
document.addEventListener("keyup", onKeyUp, false);
document.addEventListener("keydown", onKeyDown, false);
document.addEventListener("mousedown", onClick, false);

var shiftPressed=false, 
	ctrlPressed=false, 
	altPressed =false,
	pageZoom = 1,
	allowRestore=false;

function onLoad() 
{
	popup = document.getElementById("popup");
	setCustomPopup();
	document.getElementById("customizeBtn").addEventListener("click", onCustomizeClick, false);
}



function onKeyDown(e)
{
	updateFlags(e, 'down');
}

function onKeyUp(e)
{
	updateFlags(e, 'up');
}

function onClick(e) 
{
	//e.preventDefault();
	if (shiftPressed)
	{
		changeZoom('+');
	}
	if (ctrlPressed)
	{
		changeZoom('-');
	}
}
function updateFlags(e, eType) 
{
	var msg = "pressed: "+e.keyCode + ' '+e.key;
	var newState = false, newCursor='default';
	if (eType === 'down')
	{
		newState = true;
		newCursor='ne-resize';
	}
	if (shiftPressed !== e.shiftKey) 
	{
		shiftPressed=newState;
		updateCursor(newCursor);
	}
	if (ctrlPressed !== e.ctrlKey)
		{
		ctrlPressed=newState;
		updateCursor(newCursor);
	}
	if (altPressed !== e.altKey && allowRestore)
		changeZoom('0');
	if (e.keyCode == 48) //'0' na klaw. alfanumerycznej
		allowRestore = true;
	else allowRestore = false;
}

function updateCursor(state)
{
	getRoot().style.cursor = state;
}

function getRoot() 
{
	return document.getElementById('root');
}

function changeZoom (operation)
{
	pageZoom = operation === '+' ? pageZoom+0.1:operation === '-' ? pageZoom-0.1:1;
	getRoot().style.transform = "scale("+pageZoom+")";
}

