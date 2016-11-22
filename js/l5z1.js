function addInfo() {

	var paragraph = document.createElement("article");
  var info = document.createTextNode("texttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttexttext");
  paragraph.appendChild(info);
  document.body.appendChild(paragraph);

}

function addHeader() {
	var header = document.createElement("H1");
  var headerText = document.createTextNode("Dodatkowe informacje");
	header.appendChild(headerText);

	 var list = document.getElementById("carList");
	 document.body.insertBefore(header, list);
}

function listLength() {
	return document.getElementById("carList").getElementsByTagName("li").length;
}

function addElement() {
	var list = getCarListObject();
	var item = createLiNode();

	list.insertBefore(item, list.childNodes[0]);

}

function replaceElement() {
	var item = createLiNode();
	var list = getCarListObject();
	list.replaceChild(item, list.childNodes[0]);

}

function removeElement() {
	var list = document.getElementById("carList");
  list.removeChild(list.childNodes[0]);
}

function createLiNode() {
	var cars = ["audi", "bmw", "skoda", "renault", "citroen", "peugeot"]
	var index = Math.floor(Math.random() * cars.length);
	var itemText = document.createTextNode(cars[index]);

	var item = document.createElement("LI");

	item.appendChild(itemText);
	return item;
}

function getCarListObject() {
	return list = document.getElementById("carList")
}
