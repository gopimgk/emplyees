$(document).ready(function(){
  $(".search").keyup(function(){
    var search=$(".search").val();
    console.log(search);
    if(search==""){
      window.location.reload();
    }
    if(search!=""){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
      $.ajax({
      type:"POST",
      url: 'searchnonAdmin',
      data:{search:search},
        dataType:'json',
      success: function(data){
        console.log(data);
        if(data){
          $("#tb").empty();
      for(let item of data){
        var tr=`<tr>
                <td>${item.EmployeeId}</td>
        <td>${item.FirstName}</td>
        <td>${item.LastName}</td>
        <td>${item.Skills}</td>
        <td>${item.StartDate}</td>
        <td>${item.createdBy}</td>
        <td>${item.updatedBy}</td>
        </tr>`;
        $("#tb").append(tr);

        }

      }},
      error: function(data){
      console.log(data);
      }
      });
    }
  });
});