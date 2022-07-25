var editData = function(id){
    $('#table-container').load('update-form.php')
 
     $.ajax({    
         type: "GET",
         url: "update-data.php", 
         data:{editId:id},            
         dataType: "html",                  
         success: function(data){   
 
           var userData=JSON.parse(data);  
           $("input[name='id']").val(userData.id);               
           $("input[name='fullName']").val(userData.fullName);
           $("input[name='emailAddress']").val(userData.emailAddress);
           $("input[name='city']").val(userData.city);
           $("input[name='country']").val(userData.country);
            
         }
 
     });
 };
 
 
 
 $(document).on('submit','#updateForm',function(e){
         e.preventDefault();
          var id= $("input[name='id']").val();               
          var fullName= $("input[name='fullName']").val();
          var emailAddress= $("input[name='emailAddress']").val();
          var city= $("input[name='city']").val();
          var country= $("input[name='country']").val();
         $.ajax({
         method:"POST",
         url: "update-data.php",
         data:{
           updateId:id,
           fullName:fullName,
           emailAddress:emailAddress,
           city:city,
           country:country
 
         },
         success: function(data){
         $('#table-container').load('show-data.php');
         $('#msg').html(data);
    
     }});
 });