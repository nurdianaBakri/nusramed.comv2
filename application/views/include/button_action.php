
        <button type="button" class="btn btn-success waves-effect reset"  onclick="reset_form()">
            <i class="material-icons">cached</i>
            <span>Reset</span>
        </button>

        <button type="button" class="btn btn-success waves-effect" disabled>
            <i class="material-icons">cached</i>
            <span>Inquiry</span>
        </button>  
        
        <button type="submit" id="submit" class="btn btn-success waves-effect" onclick="update_and_save()" disabled>
            <i class="material-icons saveupdate"><?php if ($jenis_aksi=="edit"){ echo "update"; } else { echo "save"; } ?></i>
            <span><?php if ($jenis_aksi=="edit"){ echo "Update"; } else { echo "Save"; } ?></span>
        </button> 

         <button type="button" class="btn btn-danger waves-effect"  <?php if ($jenis_aksi=="edit"){ echo ""; } else { echo "disabled"; } ?>>
            <i class="material-icons">delete_sweep</i>
            <span>Delete</span>
        </button>  
 
        <button type="button" class="btn btn-success waves-effect" disabled>
            <i class="material-icons">print</i>
            <span>Print</span>
        </button>    

        <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal" aria-label="Close">
           <i class="material-icons">close</i>
            <span>Close</span>
        </button>

        <script type="text/javascript">  

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

        </script>