 </div>
    <!-- /#wrapper -->
<!-- load dash board graph -->
<script type = 'text/javascript' src = 'https://www.gstatic.com/charts/loader.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    
    <script>
        
        $(function(){

            $('#selectAllBoxes').click(function() {

                if(this.checked) {

                    $('.checkBoxes').each(function() {

                        this.checked = true;
                    });
                    
                }else {
                    
                    $('.checkBoxes').each(function() {

                        this.checked = false; 
                
                    });
                };
            });
            
       // controlo apply button in view all posts            
            
         $('#apply_bulk_option').css({
             
             'cursor':'not-allowed', 
             'opacity': '0.65',

            });
            
            
         $('#apply_bulk_option').click(function(event) {

             if(!$('#select_bulk_option').val()) {
                 

                      event.preventDefault();    

             }
             
         });  
            
         $('#select_bulk_option').change(function(event) {
  
             if($('#select_bulk_option').val()) {
                 
                  $('#apply_bulk_option').css({
                         'cursor':'default', 
                         'opacity': '1',

                     });
                 
             }
             
             else {
           
                 $('#apply_bulk_option').css({
                         'cursor':'not-allowed', 
                         'opacity': '0.65',

                     });      
                 
             }
             
         });
            
});
          

  </script>
  
  

</body>
  <script src="./js/nav_highlight.js"></script>
  <!--<script src="../js/ckeditor/ckeditor.js"></script>-->
</html>