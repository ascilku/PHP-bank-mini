@include('dashboard.header')
@include('dashboard.menu')





<!-- ======================== Modal deposit ============================== -->
<div class="modal modal-blur fade" id="modal_tambah_deposit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Deposit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('deposit-post-users')}}" method="post">
            {{ csrf_field() }}
                <div class="modal-body">
                            <input type="hidden" class="form-control" id="id_deposit" name="id">
                            <input type="hidden" class="form-control" id="total_deposit" name="total_deposit">
                      

                            <div class="mb-3">
                                <label class="form-label required">Input Penambahan Deposit</label>
                                <input type="text" class="form-control " name="jumlah" id="rupiah2" required>
                            </div>

                        
                            
                    
                </div>
            
                <div class="modal-footer">
                    <!-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a> -->
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Deposit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ======================== Akhir ======================== -->

<!-- ======================== Modal tarik tunai ============================== -->
<div class="modal modal-blur fade" id="modal_tarik_tunai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tarik Tunai</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('deposit-tarik-tunai')}}" method="post">
                <input type="hidden" class="form-control" id="tarik_id_deposit" name="id">
                <input type="hidden" class="form-control" name="id_user" value="{{$query_nik->id}}">
                            <input type="hidden" class="form-control" id="tarik_total_deposit" name="total_deposit">
            {{ csrf_field() }}
                <div class="modal-body">
                            

                            <div class="mb-3">
                                <label class="form-label required">Masukkan Jumlah</label>
                                <input type="text" class="form-control " name="jumlah"  required>
                            </div>

                        
                            
                    
                </div>
            
                <div class="modal-footer">
                    <!-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a> -->
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Tarik
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ======================== Akhir ======================== -->

<!-- ======================== Modal transfer ============================== -->
<div class="modal modal-blur fade" id="modal_transfer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Transfer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('transfer')}}" method="post">
                <input type="hidden" class="form-control" id="tarik_id_deposit" name="id">
                            <input type="hidden" class="form-control" name="id_user" value="{{$query_nik->id}}">
                            <input type="hidden" class="form-control" id="transfer_total_deposit" name="deposit" value="{{$query_nik->id}}">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label  required">Pilih Nasabah</label>
                        <div>
                              <select class="form-select pilih_deposit" name="nasabah"  required>
                                  <option selected hidden></option>

                                  <?php foreach ($query_user as $key_query_user): ?>
                                  {{--  --}}
                                    <?php if ($query_nik->name == $key_query_user->name): ?>
                                    <?php else: ?>
                                        <option value="{{$key_query_user->id}}">      {{$key_query_user->name}}</option>
                                    <?php endif ?>
                                    
                                  <?php endforeach ?>
                              </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Masukkan Jumlah</label>
                        <input type="text" class="form-control " name="jumlah"  required>
                    </div>

                        
                            
                    
                </div>
            
                <div class="modal-footer">
                    <!-- <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a> -->
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Transfer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ======================== Akhir ======================== -->



            {{-- <?php if (session()->has('alert-peringatan')): ?>
                <div class="alert-peringatan" data-flashdata="{{session()->get('alert-peringatan')}}">
            <?php endif ?> --}}

            <?php if (session()->has('alert-success')): ?>
                <div class="alert-success" data-flashdata="{{session()->get('alert-success')}}">
            <?php endif ?>
                        
        <div class="py-4">
        
            <div class="container-xl">
                    <?php if ($query_nik->akses == "Users"): ?>
               
                            <?php if (isset($query_nik->deposit)): ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <h1><strong class="alert-login-success">DEPOSIT SAYA {{$query_nik->deposit->total_deposit}}</strong> <a href="#" class="tambah-deposit" data-id_deposit="{{$query_nik->deposit->id}}" data-total_deposit="{{$query_nik->deposit->total_deposit}}"  ><strong style="color: rgb(22, 189, 133); font-size: 40px">+</strong></a></h1>
                                </div>

                                <div class="alert alert-info alert-dismissible">
                                    <h1> <a href="#" class="transfer" data-id_deposit="{{$query_nik->deposit->id}}" data-total_deposit="{{$query_nik->deposit->total_deposit}}"  ><strong style="color: rgb(22, 189, 133); font-size: 20px">TRANSFER +</strong></a></h1> <hr>
                                    <h1> <a href="#" class="tarik-tunai" data-id_deposit="{{$query_nik->deposit->id}}" data-total_deposit="{{$query_nik->deposit->total_deposit}}"><strong style="color: rgb(22, 189, 133); font-size: 20px">TARIK TUNAI +</strong></a></h1>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <h1><strong class="alert-login-success">DEPOSIT SAYA 0</strong> <a href="#" class="tambah-deposit" data-id_deposit="" data-total_deposit=""  ><strong style="color: rgb(22, 189, 133); font-size: 40px">+</strong></a></h1>
                                </div>

                                <div class="alert alert-info alert-dismissible">
                                    <h1> <a href="#" class="transfer" data-id_deposit="" data-total_deposit=""  ><strong style="color: rgb(22, 189, 133); font-size: 20px">TRANSFER +</strong></a></h1> <hr>
                                    <h1> <a href="#" class="tarik-tunai" data-id_deposit="" data-total_deposit=""><strong style="color: rgb(22, 189, 133); font-size: 20px">TARAIK TUNAI +</strong></a></h1>
                                </div>
                            <?php endif ?>
                            
                            <div class="row" style="margin-top: 5%">
                                <div class="col-md-6 col-xl-6">
                                
                            
                                        <h3> Riwayat Transfer</h1> <hr>
                                        <div class="table-responsive">
                                            <!-- <table class="table table-vcenter card-table" > -->
                                            <table id="" class="table table-striped table-bordered padding-top padding-bottom" cellspacing="0" width="100%">
                                                        
                                                <thead>
                                                <tr>
                                                    {{-- <th>Nama Nasabah</th> --}}
                                                    <th>Jumlah Transfer</th>
                                                    <th>Jadwal Transfer</th>
                                                    {{-- <th></th> --}}
                                                </tr>
                                                </thead>
                                                <tbody>
                        
                                                    <?php if (count($query_nik->riw_transfer) > 0): ?>
                                                        <?php foreach ($query_nik->riw_transfer as $key_query_riwtransfer): ?>
                                                        
                        
                                                        
                        
                        
                        
                                                            <tr>
                                                                {{-- <td data-label="Name" >
                                                                    {{$key_query_riwtransfer->user->name}}
                                                                </td> --}}
                                                                <td data-label="Name" >
                                                                    {{$key_query_riwtransfer->riw_transfer}}
                                                                    </td>
                                                                <td data-label="Name" >
                                                                    {{$key_query_riwtransfer->created_at}}
                                                                </td>
                                                                
                                                            
                                                                
                                                                {{-- <?php if ($query_nik->akses == 'Admin' || $query_nik->akses == 'Admin Super' ): ?>
                                                                    
                        
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
                                                                <?php endif ?> --}}
                                                            </tr>
                                                            
                                                        <?php endforeach ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan='9' class="center-"> Tidak Ada Data </td>
                                                        </tr>
                                                    <?php endif ?>
                                                
                        
                                                </tbody>
                                            </table>
                                            
                                            
                                        </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                        <h3> Riwayat Tarik Tunai</h1> <hr>
                                        <div class="table-responsive">
                                            <!-- <table class="table table-vcenter card-table" > -->
                                            <table id="" class="table table-striped table-bordered padding-top padding-bottom" cellspacing="0" width="100%">
                                                        
                                                <thead>
                                                <tr>
                                                    {{-- <th>Nama Nasabah</th> --}}
                                                    <th>Jumlah Penarikan</th>
                                                    <th>Jadwal Penarikan</th>
                                                    {{-- <th></th> --}}
                                                </tr>
                                                </thead>
                                                <tbody>
                        
                                                    <?php if (count($query_nik->riw_tariktunai) > 0): ?>
                                                        <?php foreach ($query_nik->riw_tariktunai as $key_query_riw_tariktunai): ?>
                                                        
                        
                                                        
                        
                        
                        
                                                            <tr>
                                                                {{-- <td data-label="Name" >
                                                                    {{$key_query_riwtransfer->user->name}}
                                                                </td> --}}
                                                                <td data-label="Name" >
                                                                    {{$key_query_riw_tariktunai->riw_tariktunai}}
                                                                    </td>
                                                                <td data-label="Name" >
                                                                    {{$key_query_riw_tariktunai->created_at}}
                                                                </td>
                                                                
                                                            
                                                                
                                                                {{-- <?php if ($query_nik->akses == 'Admin' || $query_nik->akses == 'Admin Super' ): ?>
                                                                    
                        
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
                                                                <?php endif ?> --}}
                                                            </tr>
                                                            
                                                        <?php endforeach ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan='9' class="center-"> Tidak Ada Data </td>
                                                        </tr>
                                                    <?php endif ?>
                                                
                        
                                                </tbody>
                                            </table>
                                            
                                            
                                        </div>
                                </div>
                            </div>

                    <?php endif ?>
                <div class="row align-items-center ">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                                <?php if (Session::get('alert-success-karyawan_')): ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <strong class="alert-login-success">Info! </strong> {{Session::get('alert-success-karyawan_')}}
                                    </div>
                                <?php endif ?>
                                <?php if (session()->has('alert-peringatan')): ?>
                                    <div class="alert-peringatan" data-flashdata="{{session()->get('alert-peringatan')}}">
                                <?php endif ?>
                                <div >
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>



    
@include('dashboard.footer')


