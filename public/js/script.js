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

