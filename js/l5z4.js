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
/*
function showPopup() 
{
	popup.style.left = lastX;
	popup.style.top = lastY;
	popup.style.visibility = "visible";
}

function hidePopup() 
{
	popup.style.visibility = "hidden";

}

function setCustomPopup(enable) 
{
	if (document.addEventListener && enable) 
	{
        document.addEventListener('contextmenu', onContextMenu, false);
	}
	else document.removeEventListener('contextmenu', onContextMenu, false);
}

function onContextMenu(e) 
{
	e.preventDefault();
	getLastCoordinates(e);
	console.log(lastX+' '+lastY);
	spotClickTarget(e);
	showPopup();
}

function spotClickTarget(e) 
{
	if (!e) var e = window.event;
	if (e.target) 
		selectedNode = e.target;
	else if (e.srcElement) 
		selectedNode = e.srcElement;
	if (selectedNode.nodeType == 3) // defeat Safari bug
		selectedNode = selectedNode.parentNode;
	console.log("target:" + selectedNode);
}

function setBg(color) 
{
	if(selectedNode) 
	{
		selectedNode.style.backgroundColor = color;
		hidePopup();
	}
}

function setFontColor(color) 
{
	if(selectedNode) 
	{
		selectedNode.style.color = color;
		hidePopup();
	}
}

function changeFontSize(operation) 
{
	if(selectedNode) 
	{		
		var textFontSize = window.getComputedStyle(selectedNode, null).getPropertyValue('font-size');
		//selectedNode.style.fontSize nie dziala dla rozmiaru zdefiniowanego w cssie
		var fontSize = parseFloat(textFontSize); 
		if (operation === '+')
			fontSize+=1;
		if (operation === '-')
			fontSize-=1;
		selectedNode.style.fontSize = fontSize + 'px';
		hidePopup();
	}
}

function fontFamily(fontName)
{
	if(selectedNode) 
	{
		selectedNode.style.fontFamily  = fontName;
		hidePopup();
	}
}

function getLastCoordinates(e) {
	lastX = e.clientX + 'px';
	lastY=e.clientY + 'px';
}

function onCustomizeClick()
{
	if (customize)
	{
		document.getElementById("customizeBtn").style.background = 'url("../img/brush.png")';
		customize=false;
		setCustomPopup(false);
		hidePopup();
	} else
	{
		document.getElementById("customizeBtn").style.background = 'url("../img/brush.png"), red';
		customize=true;
		setCustomPopup(true);
	}

}
*/

