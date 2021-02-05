let link=document.getElementById("Clear")

link.onclick=function(){
  if(confirm("Clearing the text area and the title?")){
    document.getElementById('title').value=""
    document.getElementById('post').value=""
  }
  else{
  }
}
