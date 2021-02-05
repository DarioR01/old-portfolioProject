let Post="Temp";
let Author="Temp";
let Root='<section><h2 class="PostAuthor">Author: '+Author+'</h2><p class="PostSample">'+Post+'</p></section>';
let Completed="";

//function setup(){
//}

function loadFile() {
  var result = null;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "../Resources/Text/BlogData.txt", false);
  xmlhttp.send();
  if (xmlhttp.status==200) {
    result = xmlhttp.responseText;
  }
  return result;
}

Completed=loadFile();l







document.getElementById("BlogCreation").innerHTML =Completed;
