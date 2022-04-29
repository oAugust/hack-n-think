var coll = document.getElementsByClassName("btndown");
var i;

for (i=0; i < coll.length; i++){
    coll[i].addEventListener("click", function(){
        this.classList.toggle("active");
        var content = this.nextElementSiblings;
        if (content.style.display === "block"){
            content.style.display - "none"
        } else{
            content.style.display = "block";
        }
    });
}

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}