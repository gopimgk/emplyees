$(document).ready(function(){
	$(".search").keyup(function(){
		var search=$(".search").val();
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
        url: 'searchUser',
        data:{search:search},
        dataType:'json',
        success: function(data){
      	if(data){
      		$("#tb").empty();
          for(let item of data){
      	   var tr=`<tr>
      	           <td>${item.name}</td>
                    <td>${item.email}</td>
				            <td>${item.role}</td>
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