

function editarCurso(id){




 }
 function pesquisarCurso(id){


}

$(document).ready(function(){
    $('#import_form').on('submit', function(event){
     event.preventDefault();

     $.ajax({
      url:"import.php",
      method:"POST",
      data: new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
       $('#submit').attr('disabled','disabled'),
       $('#submit').val('Importing...');
      },
      success:function(data)
      {
       $('#message').html(data);
       $('#import_form')[0].reset();
       $('#submit').attr('disabled', false);
       $('#submit').val('Import');
      }
     })

     setInterval(function(){
      $('#message').html('');
     }, 5000);

    });
   });



