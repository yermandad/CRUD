$(document).ready(function () {
  console.log("jQuery is working");
  $('#emailC').keyup(function(){
    let consulta = $('#emailC').val();
    console.log(consulta); 
  });
  $('#emailG').keyup(function(){
    let consulta2 = $('#emailG').val();
    console.log('email de consulta general es '+consulta2); 
  });

  
  $('#btnDelete').click(function () {
    const id = $(this).value();
    console.log (id);
    if(confirm('Are you sure you want to delete it?')) {
      $.post('eliminar.php', {id}, function (response){
        console.log(response);
      });
      
  }
    e.preventDefault();
       
  });
});
