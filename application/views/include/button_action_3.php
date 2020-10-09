
        <button type="button" class="btn btn-success waves-effect reset"  onclick="reset_form()">
            <i class="material-icons">cached</i>
            <span>Reset</span>
        </button>

        <button type="button" class="btn btn-success waves-effect" onclick="Inquiry()"  disabled>
            <i class="material-icons">cached</i>
            <span>Inquiry</span>
        </button>  
        
        <button type="submit" id="submit" class="btn btn-success waves-effect" onclick="update_and_save_pemeliharaan_rek_koran()">
            <i class="material-icons saveupdate">save</i>
            <span>Save</span>
        </button>  
 
        <button type="button" class="btn btn-success waves-effect" disabled>
            <i class="material-icons">print</i>
            <span>Print</span>
        </button>     

        <script type="text/javascript">  

            var idarray=[]; 

            $(document).ready(function() { 

                //set button menjadi dissable 
                $("#submit").attr('disabled', 'disabled');

                //cek form ketika user memasukkan data ke dalamnya 
                $("input").keyup(function() {     
                    // To Disable Submit Button
                    $("#submit").attr('disabled', 'disabled');
                    cek_validasi(); 
                }); 

                $("select").change(function() {   
                    // To Disable Submit Button
                    $("#submit").attr('disabled', 'disabled');
                    cek_validasi(); 
                });  
 
            });

            function arrayRemove(arr, value) { 
               return arr.filter(function(ele){
                   return ele != value;
               }); 
            }

            function Inquiry() {  
                var data  = $("#myForm").serialize(); 
                var url2 = $('#url_inquery').val();
                var url = "<?php echo base_url() ?>"+url2; 
                var url2 = "<?php echo base_url() ?>"+url2+'/'+$('#KD_KASDA').val(); 
                console.log(url2);
                $.ajax( {
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "html",
                    success: function( response ) {  
                        console.log(response);
                        try{   
                            $('.table-responsive').html(response); 
                        }catch(e) {  
                            alert('Exception while request..');
                        }  
                    }
                } );  
            }

            function reset_form(){
                $('.input-visible').val(""); 
            }  

        </script>