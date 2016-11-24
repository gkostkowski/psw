/*
*	zad 4, DOM
*	funkcjonalnosc 2: zmiana predkosci animacji przy ruchu myszka (info.html) oraz zmiana 
*	przezroczystosci przy najechaniu/zjechaniu myszka
*/
var onMove = function onMouseMove(e)
{
	wait(timeout, onMouseStop);
	updateAnimationDuration('2s');
}

window.addEventListener("mousemove", onMove, false);

window.addEventListener("load", onLoad, false);

var timeout = {val: 0},timeout2 = {val: 0};
var animation, opacity=1;

function onLoad() 
{
	animation = document.getElementById('grad_linear');
	animation.addEventListener("mouseover", onMouseOver, false);
	animation.addEventListener("mouseout", onMouseOut, false);
	animation.addEventListener("click", onClick, false);
}

function onMouseOver()
{
	updateAnimationOpacity('-');
	
}

function onMouseOut()
{
	updateAnimationOpacity('+');
}

function onClick(e)
{
	animation.style.width  = e.screenX+'px';
	animation.style.height  = e.screenY+'px';
	console.log(e.screenX + ' '+e.screenY);
}

function updateAnimationOpacity(operation)
{
	opacity = operation === '+' ? opacity+0.3:opacity-0.3;
	if (opacity > 1) opacity =1;
	animation.style.opacity  = opacity;
}
function updateAnimationDuration(time)
{
	animation.style.animationDuration  = time;
}

function onMouseStop() 
{
	updateAnimationDuration('8s');
}


function wait(timer, fun, delay) //przekazuje referencje do obiektu, zeby moc zmodyfikowac wartosc w obiekcie
{
	if (!delay) delay = 1000;
	clearTimeout(timer.val);
	timer.val = setTimeout(fun, delay);
}