              
                <form id="myForm" action="<?php echo base_url()."obat/serchbyname"?>"  method="post">  
                  <div class="row">
                      <div class="col-md-12"> 
                        Sebelum menambah data, silahkan cari obat terlebih dahulu agar tidak ada data obat yang sama
                      </div> 
                  </div> 

                  <div class="row">
                    <div class="col-md-2">
                        <label for="nama">Nama Obat</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="nama" name="nama" class="form-control input-visible" placeholder="masukkan nama obat">
                    </div>

                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success" name="submit" value="Cari">
                    </div>
                  </div>  
              </form> 