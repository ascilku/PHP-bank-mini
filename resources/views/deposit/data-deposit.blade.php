<div class="container-xl">
          <!-- Page title -->
            
        </div>

 
<?php if (session()->has('alert-success')): ?>
    <div class="alert-success" data-flashdata="{{session()->get('alert-success')}}">
<?php endif ?>

<?php if (Session::get('alert-success-deposit')): ?>
    <div class="alert alert-danger alert-dismissible">
        <strong class="alert-login-success">Info! </strong> {{Session::get('alert-success-deposit')}}
    </div>
<?php endif ?>


        <div class="card-header">
            <h4 class="card-title">List Deposit Nasabah</h4> 
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">

                <!-- ======================== hapus data deposit ======================== -->
                <div class="modal modal-blur fade" id="model_hapus_deposit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-title">Yakin Mau Hapus Data Riwayat deposit.?</div>
                            <div>Menghapus Riwayat Deposit, Maka Akan Menghapus Permanen Riwayat Deposit Yang di Hapus.</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="btn-hapus-deposit" data-bs-dismiss="modal">Ya, Hapus Riwayat Deposit</button>
                        </div>
                        </div>
                    </div>
                </div>


              <div class="col-12">
                <div class="card font-size-cv-">
                  <div class="table-responsive">
                    <!-- <table class="table table-vcenter card-table" > -->
                    <table id="example" class="table table-striped table-bordered padding-top padding-bottom" cellspacing="0" width="100%">
                             
                      <thead>
                        <tr>
                            <th>Nama Nasabah</th>
                            <th>Deposit</th>
                            <th>Jadwal Create</th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>

                          <?php if (count($query_deposit) > 0): ?>
                              <?php foreach ($query_deposit as $key_query_deposit): ?>
                                

                                



                                    <tr>
                                        <td data-label="Name" >
                                          {{$key_query_deposit->user->name}}
                                        </td>
                                        <td data-label="Name" >
                                            {{$key_query_deposit->total_deposit}}
                                          </td>
                                        <td data-label="Name" >
                                          {{$key_query_deposit->created_at}}
                                        </td>
                                      
                                    
                                       
                                        <?php if ($query_nik->akses == 'Admin' || $query_nik->akses == 'Admin Super' ): ?>
                                            

                                            <td>  
                                                <a href="{{route('deposit', 'deposit')}}?key={{Crypt::encrypt($key_query_deposit->id)}}">
                                                    <span class="badge bg-warning me-1 center-foto ">
                                                        <div class="ringht-jabatan">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg> 
                                                        </div>
                                                    </span>
                                                </a>
                                                <a class="hapus_deposit" data-bs-toggle="modal" data-bs-target="#model_hapus_deposit" href="{{route('deposit_hapus')}}??key={{Crypt::encrypt($key_query_deposit->id)}}">
                                                    <span class="badge bg-danger me-1 center-foto ">
                                                        <div class="ringht-jabatan">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                        </div>
                                                    </span>
                                                </a>
                                            </td>
                                        <?php else: ?>
                                        <?php endif ?>
                                    </tr>
                                  
                              <?php endforeach ?>
                          <?php else: ?>
                                <tr>
                                  <td colspan='9' class="center-"> Tidak Ada Data Pengarang </td>
                                </tr>
                          <?php endif ?>
                        

                      </tbody>
                    </table>
                   
                    
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            
          </div>
          
        </div>
