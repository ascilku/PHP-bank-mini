 
<?php if (session()->has('alert-success')): ?>
    <div class="alert-success" data-flashdata="{{session()->get('alert-success')}}">
<?php endif ?>

<?php if (session()->has('alert-peringatan')): ?>
    <div class="alert-peringatan" data-flashdata="{{session()->get('alert-peringatan')}}">
<?php endif ?>


<div class="row row-cards">
    <div class="col-12">
                






              <?php if (isset($edit_deposit)): ?>
                
                <form  action="{{route('deposit-post')}}" method="post" class="card">
                  <div class="card-header">
                        <h4 class="card-title">Edit Deposit</h4> 
                        
                    </div>
                    <div class="card-body">
                      
                      <div class="row">
                        <div class="col-xl-12">
                          <div class="row">
                            <div class="col-md-6 col-xl-12">
                                  {{ csrf_field() }}

                                
                                  <input type="hidden" class="form-control" name="id" id="id" value="{{$edit_deposit->id}}" placeholder="Nama Pengarang..." onkeyup="this.value = this.value.toUpperCase()" required>
                                    
                                  <div class="mb-3">
                                      <label class="form-label  required">Pilih Nasabah</label>
                                      <div>
                                            <select class="form-select pilih_deposit" name="nasabah"  required>
                                              <option value="{{$edit_deposit->user->id}}">      {{$edit_deposit->user->name}}</option>

                                                <?php foreach ($query_user as $key_query_user): ?>
                                                  <?php if ($edit_deposit->user->name == $key_query_user->name): ?>
                                                  <?php else: ?>
                                                    <option value="{{$key_query_user->id}}">      {{$key_query_user->name}}</option>
                                                  <?php endif ?>
                                                  
                                                <?php endforeach ?>

                                            </select>
                                      </div>
                                  </div>



                                  <div class="mb-3">
                                    <input type="text" class="form-control" name="jumlah"  value="{{$edit_deposit->total_deposit}}"  required>

                                     
                                  </div>



                                  

                              
                              
                              
        
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="card-footer text-end">
                      <div class="d-flex">
                        <button type="submit" class="btn btn-primary ms-auto">Edit Deposit</button>
                        {{-- <input type="submit" name="save" id="save" class="btn btn-info" value="Save" /> --}}
                      </div>
                    </div>

                </form>
              <?php else: ?>

               
                <form  action="{{route('deposit-post')}}" method="post" class="card">
                  <div class="card-header">
                        <h4 class="card-title">Tambah Deposit</h4> 
                        
                    </div>

                    <?php if ($query_nik->akses == "Admin Super" || $query_nik->akses == "Admin"): ?>
                
                        <div class="card-body">
                          
                          <div class="row">
                            <div class="col-xl-12">
                              <div class="row">
                                <div class="col-md-6 col-xl-12">
                                      {{ csrf_field() }}

                                      <div class="mb-3">
                                          <label class="form-label  required">Pilih Nasabah</label>
                                          <div>
                                                <select class="form-select pilih_deposit" name="nasabah"  required>
                                                    <option selected hidden></option>

                                                    <?php foreach ($query_user as $key_query_user): ?>
                                                      <option value="{{$key_query_user->id}}">      {{$key_query_user->name}}</option>
                                                    <?php endforeach ?>
                                                </select>
                                          </div>
                                      </div>

                                      <div class="mb-3">
                                        <span class="form-check-label font-color-red-small tidakinfoo" >Form Pengisian Deposit Akan Bisa Di Isi Ketika Form Pengisian Deposit di Pilih</span>
                                      </div>

                                      <div class="mb-3">
                                        <span class="form-check-label font-color-small-info infoo" ></span>
                                      </div>

                                      <div class="mb-3">
                                          <div class="mb-3">
                                            <label class="form-label required">Jumlah Deposit</label>
                                            <div>
                                                  <select class="form-select pilih_deposit" name="jumlah" id="jumlah" disabled onkeyup="this.value = this.value.toUpperCase()" required>
                                                      <option selected hidden></option>
                                                      <option value="500000">500000</option>
                                                      <option value="1000000">1000000</option>
                                                      <option value="1500000">1500000</option>
                                                      <option value="2000000">2000000</option>
                                                      <option value="3000000">3000000</option>
                                                      <option value="5000000">5000000</option>
                                                      <option value="10000000">10000000</option>
                                                  </select>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="card-footer text-end">
                          <div class="d-flex">
                            <button type="submit" class="btn btn-primary ms-auto">Tambah Deposit</button>
                          </div>
                        </div>
                    <?php else: ?>
                      <div class="card-body">
                        
                        <div class="row">
                          <div class="col-xl-6">
                            <div class="row">
                              <div class="col-md-6 col-xl-12">
                      Akses Tidak Tersedia
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    <?php endif ?>

                </form>
              <?php endif ?>
        
    </div>
</div>