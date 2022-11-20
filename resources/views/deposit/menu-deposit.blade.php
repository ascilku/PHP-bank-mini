@include('dashboard.header')
@include('dashboard.menu')
    <div class="py-4">
        <div class="container-xl">
            <div class="col-xl-12 col-md-12">
                <?php if (Session::get('alert-success-karyawan')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <strong class="alert-login-success">Info! </strong> {{Session::get('alert-success-karyawan')}}
                    </div>
                <?php endif ?>
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">

                        

                        <?php if ($key == 'deposit'): ?>
                            <li class="nav-item ">
                                <a href="{{route('deposit', 'deposit')}}" class="nav-link <?php  echo ($key=='deposit' ? 'active' : '');?> ">Deposit</a>
                            </li>


                            <li class="nav-item ">
                                <a href="{{route('deposit', 'data-deposit')}}" class="nav-link <?php  echo ($key=='data-deposit' ? 'active' : '');?> ">Riwayat Deposit</a>
                            </li>
                        <?php elseif ($key == 'data-deposit'): ?>
                            <li class="nav-item ">
                                <a href="{{route('deposit', 'deposit')}}" class="nav-link <?php  echo ($key=='deposit' ? 'active' : '');?> ">deposit</a>
                            </li>


                            <li class="nav-item ">
                                <a href="{{route('deposit', 'data-deposit')}}" class="nav-link <?php  echo ($key=='data-deposit' ? 'active' : '');?> ">Riwayat Deposit</a>
                            </li>
                        <?php endif ?>

                       


                    </ul>
                    <div class="card-body">
                        <div class="tab-content">

                            <?php if ($key == 'deposit'): ?>
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="tab-pane active show" id="tidak">
                                            @include('deposit.data-deposit')
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="tab-pane active show" id="tidak">
                                            @include('deposit.tambah-deposit')
                                        </div>  
                                    </div>
                                </div>
                                
                            <?php elseif ($key == 'data-deposit'): ?>
                                <div class="tab-pane active show" id="tidak">
                                    @include('deposit.data-riw-deposit')
                                </div>
                            <?php endif ?>

                            

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @include('dashboard.footer')