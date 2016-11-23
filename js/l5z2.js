function countPictures() {
    var len = document.images.length;
    alert("ilość zdjęć na stronie: " + len);
}

function randomLink() {
  var len = document.links.length;
  var index = Math.floor(Math.random() * len);
  window.location.href = document.links[index];
}

function anchor() {
  var len = document.anchors.length;
  console.log("12");
  document.getElementById("duplicatedAnchor").innerHTML = "ilosc 'kotwic': " + len;
}


function check() {
  var form = document.forms[0];
  console.log("im here");
  var string = "";
  for (var i = 0; i < form.length; i++) {
      string += form.elements[i].value + ", ";
  }
  alert(string);
}

function getFirstSrc() {
  alert(document.images.item(1).src);
}

function getSecoundSrc() {
  alert(document.images.namedItem("magnifier").src);
}
