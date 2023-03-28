$(document).ready(function (e) {
         
    $('#image').change(function(){
             
     let reader = new FileReader();
  
     reader.onload = (e) => { 
  
       $('#preview-image-before-upload').attr('src', e.target.result); 
     }
  
     reader.readAsDataURL(this.files[0]); 
    
    });
    
});


$(document).ready(function (e) {           
    $('#file').change(function(){
             
     let reader = new FileReader();
  
     reader.onload = (e) => { 
  
       $('#preview-file-before-upload').attr('src', e.target.result); 
     }
     reader.readAsDataURL(this.files[0]);
    });
});


var b = document.getElementById('close');
var input = document.getElementById("search");
b.style.display = "none";

input.addEventListener('input', function() {

if(input.value == ""){
    b.style.display = "none";
}
else{
    b.style.display = "inline-block";
}
});

function closeButton(){
  document.getElementById('close').style.display = 'none';
  document.getElementById('search').value='';
}

document.getElementById("clear").addEventListener("click", function () {
  document.getElementById("fileinput").value = "";
}, false);

window.addEventListener("dropcontainer",function(e){
  e = e || event;
  e.preventDefault();
},false);
window.addEventListener("drop",function(e){
  e = e || event;
  e.preventDefault();
},false);

dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
  file.files = evt.dataTransfer.files;

  const dT = new DataTransfer();
  dT.items.add(evt.dataTransfer.files[0]);
  dT.items.add(evt.dataTransfer.files[3]);
  file.files = dT.files;

  evt.preventDefault();
};

function pauseFile(id){
  document.getElementById(id).pause();
}