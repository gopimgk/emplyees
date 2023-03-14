$("#StartDate").datepicker({ dateFormat: 'yy-mm-dd',
      showOn: "button",
      buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
      buttonImageOnly: true
      });
      
      $('#edit').on('click',function() {
          $('#c').prop('checked',false);          
          $('#java').prop('checked',false);          
          $('#php').prop('checked',false); 
          var name=$("#name").val();
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
       // var publicRoot = window.publicRoot;


      $.ajax({
          type:"POST",
          url: "/edit",
          data:{name:name},
          dataType:'json',
          success: function(data){
            for(let item of data){
            var data1=item.Skills.split(',');
            var d=JSON.parse(item.Skills);
            var c=$('#c');
            var java=$('#java');
            var php=$('#php');
            var skill=[c,java,php]
            for(let i=0;i<skill.length;i++){
            for(let j=0;j<skill.length;j++){
                if(d[j]==skill[i].val()){
                skill[i].prop('checked',true);          
              }}
            }
        $("#id").val(item.EmployeeId);
        $("#FirstName").val(item.FirstName);
        $("#LastName").val(item.LastName);
        $("#StartDate").val(item.StartDate);
      }
      },
      error: function(data){
      console.log(data);
      }
      });
      })