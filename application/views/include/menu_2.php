
            <?php
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            ?> 

             <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url()."assets/" ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nama');; ?></div>
                    <div class="email"><?php echo $this->session->userdata('email');; ?></div> 
                </div>
            </div>
            <!-- #User Info --> 

            <div class="menu">  
                <ul class="list">
                    <li class="header">MAIN UTAMA</li>
                    <li class="<?php if(strpos($actual_link, 'Home') !== false){  echo "active";} ?> ">
                        <a href="<?php echo base_url('Home')?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                     <li class="<?php if(strpos($actual_link, 'Obat') !== false || strpos($actual_link, 'Detail_obat') !== false){  echo "active";} ?> ">
                        <a href="<?php echo base_url('Obat')?>">
                            <i class="material-icons">folder</i>
                            <span>Obat</span>
                        </a>
                    </li>
                      <li class="<?php if(strpos($actual_link, 'PegawaiNusraMed') !== false){  echo "active";} ?> ">
                        <a href="<?php echo base_url('PegawaiNusraMed')?>">
                            <i class="material-icons">folder</i>
                            <span>Pegawai Nusramed</span>
                        </a>
                    </li>
                    <li class="<?php if(strpos($actual_link, 'Industri') !== false){  echo "active";} ?> ">
                        <a href="<?php echo base_url('Industri')?>">
                            <i class="material-icons">folder</i>
                            <span>Industri Obat</span>
                        </a>
                    </li>
                     <li class="<?php if(strpos($actual_link, 'Suplier') !== false){  echo "active";} ?> ">
                        <a href="<?php echo base_url('Suplier')?>">
                            <i class="material-icons">folder</i>
                            <span>Suplier Obat</span>
                        </a>
                    </li>
                     <li class="<?php if(strpos($actual_link, 'Outlet') !== false){  echo "active";} ?> ">
                        <a href="<?php echo base_url('Outlet')?>">
                            <i class="material-icons">folder</i>
                            <span>Outlet</span>
                        </a>
                    </li>
                     
                    <li class="<?php 
                    if(strpos($actual_link, 'transaksi') !== false  ){ echo "active";} 

                    ?>"> 
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>Transaksi</span>
                        </a>
                        <ul class="ml-menu"> 
                             <li class="<?php if(strpos($actual_link, 'transaksi/Penjualan') !== false){  echo "active";} ?> ">
                                <a  href="<?php echo base_url('transaksi/Penjualan')?>">Penjualan</a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'transaksi/Pembelian') !== false){  echo "active";} ?> ">
                                <a  href="<?php echo base_url('transaksi/Pembelian')?>">Pembelian</a>
                            </li>  
                        </ul>
                    </li>

                    <li class="<?php 
                    if(strpos($actual_link, 'report') !== false  ){ echo "active";} 

                    ?>"> 
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>Report Transaksi</span>
                        </a>
                        <ul class="ml-menu"> 
                             <li class="<?php if(strpos($actual_link, 'report/Penjualan') !== false){  echo "active";} ?> ">
                                <a  href="<?php echo base_url('report/Penjualan')?>">Penjualan</a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'report/Pembelian') !== false){  echo "active";} ?> ">
                                <a  href="<?php echo base_url('report/Pembelian')?>">Pembelian</a>
                            </li>  
                        </ul>
                    </li>  
                      
                </ul> 
            </div>