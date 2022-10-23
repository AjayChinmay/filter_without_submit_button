var user_approval = $('#user_approval').DataTable(
    {
      "paging": true,
      "autoWidth": false,
      "info": false,
      "searching": true,
      "pageLength": 10,
    }
    );
  
  var rangeslider = document.getElementById("sliderRange");
  var output = document.getElementById("demo");
  output.innerHTML = rangeslider.value;
    
  rangeslider.oninput = function() {
    output.innerHTML = this.value + 'TB';
    var rangeval = this.value + 'TB';

    $(".ads_Checkbox").prop("checked", false);
    $('select#hd_type option:selected').removeAttr('selected');
    $('select#location option:selected').removeAttr('selected');
  
    var _token= $('input[name="_token"]').val();
  
      $.ajax({
          url:"serviceinfo_storage_filter",
          type:"POST",
          data:
          {
          rangeval:rangeval,
         _token:_token
          },
           beforeSend: function() {
            $('#loader').removeClass('hidden')
           },
           success: function(res) {
              if(res.data == 0){
              
              }else{
                //console.log(res.data); return;
                $('#user_approval').DataTable().destroy();
                $('#user_approval_tbody').html('');
                $('#user_approval_tbody').append(res.data);
  
                $('#user_approval').DataTable({
                    "paging": true,
                    "autoWidth": false,
                    "info": false,
                    "searching": true,
                    "pageLength": 10,
                  });
  
             }
             $('#loader').addClass('hidden');
          }
      });
    }
  
    $(function(){
        $('#save_value').click(function(){
          var val = [];
          $(':checkbox:checked').each(function(i){
            val[i] = $(this).val();
          });
          //console.log(val);

          if(val != ''){

          $('select#hd_type option:selected').removeAttr('selected');
          $('select#location option:selected').removeAttr('selected');
  
          var _token= $('input[name="_token"]').val();
  
          $.ajax({
          url:"serviceinfo_ram_filter",
          type:"POST",
          data:
          {
          checkboxval:val,
         _token:_token
          },
           beforeSend: function() {
            $('#loader').removeClass('hidden')
           },
           success: function(res) {
              if(res.data == 0){
              
              }else{
                //console.log(res.data); return;
                $('#user_approval').DataTable().destroy();
                $('#user_approval_tbody').html('');
                $('#user_approval_tbody').append(res.data);
  
                $('#user_approval').DataTable({
                    "paging": true,
                    "autoWidth": false,
                    "info": false,
                    "searching": true,
                    "pageLength": 10,
                  });
  
             }
             $('#loader').addClass('hidden');
          }
      });
    }
    else
    {
      alert('Select any of the check box');
    }
  
    });   
    });
    
    
$(function(){
$('#hd_type').change(function(){

    var hdtype_val = this.value;
    //alert(hdtype_val);

    $(".ads_Checkbox").prop("checked", false);
    $('select#location option:selected').removeAttr('selected');

    var _token= $('input[name="_token"]').val();
  
      $.ajax({
          url:"serviceinfo_hdtype_filter",
          type:"POST",
          data:
          {
          hdtype_val:hdtype_val,
         _token:_token
          },
           beforeSend: function() {
            $('#loader').removeClass('hidden')
           },
           success: function(res) {
              if(res.data == 0){
              
              }else{
                //console.log(res.data); return;
                $('#user_approval').DataTable().destroy();
                $('#user_approval_tbody').html('');
                $('#user_approval_tbody').append(res.data);
  
                $('#user_approval').DataTable({
                    "paging": true,
                    "autoWidth": false,
                    "info": false,
                    "searching": true,
                    "pageLength": 10,
                  });
  
             }
             $('#loader').addClass('hidden');
          }
      });

});   
});

$(function(){
    $('#location').change(function(){
    
        var location = this.value;
        //alert(location);

        $(".ads_Checkbox").prop("checked", false);
        $('select#hd_type option:selected').removeAttr('selected');
    
        var _token= $('input[name="_token"]').val();
      
          $.ajax({
              url:"serviceinfo_location_filter",
              type:"POST",
              data:
              {
              location:location,
             _token:_token
              },
               beforeSend: function() {
                $('#loader').removeClass('hidden');
               },
               success: function(res) {
                  if(res.data == 0){
                  
                  }else{
                    //console.log(res.data); return;
                    $('#user_approval').DataTable().destroy();
                    $('#user_approval_tbody').html('');
                    $('#user_approval_tbody').append(res.data);
      
                    $('#user_approval').DataTable({
                        "paging": true,
                        "autoWidth": false,
                        "info": false,
                        "searching": true,
                        "pageLength": 10,
                      });
      
                 }
                 $('#loader').addClass('hidden');
              }
          });
    
    });   
    });