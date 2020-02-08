<script type="text/javascript">

    $(document).ready(function(){      

      var postURL = "<?php echo url('addmore'); ?>";

      var i=1;  


      $('#add').click(function(){  

           i++;  

           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td colspan="2"><input type="text" name="name[]" placeholder="Kegiatan" class="form-control name_list"/></td><td><input type="checkbox" name="number1[]" value=1 class="form-control name_list"/></td><td><input type="checkbox" name="number2[]" value=2 class="form-control name_list"/></td><td><input type="checkbox" name="number3[]" value=3 class="form-control name_list"/></td><td><input type="checkbox" name="number4[]" value=4 class="form-control name_list"/></td><td><input type="checkbox" name="number5[]" value=5 class="form-control name_list"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  

           var button_id = $(this).attr("id");   

           $('#row'+button_id+'').remove();  

      });  
    });  

</script>