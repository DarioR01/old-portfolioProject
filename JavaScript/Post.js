document.getElementById("Submit").addEventListener("click", function(event){
  if(document.getElementById("title").value.length==0){
      document.getElementById("title").style.border="2px solid yellow"
      event.preventDefault()
  }
  if(document.getElementById("post").value.length==0){
    document.getElementById("post").style.border="2px solid yellow"
    event.preventDefault()
  }
})

document.getElementById("title").addEventListener("click",function(){
  document.getElementById("title").style.borderStyle="none"
})

document.getElementById("post").addEventListener("click",function(){
  document.getElementById("post").style.borderStyle="none"
})
