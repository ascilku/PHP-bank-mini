<?php

namespace App\Http\Controllers\transfer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\RiwTransfer        as RiwTransfer;
use App\Models\Deposit           as Deposit;

class C_Transfer extends Controller
{
    //

    public function depositTransfer(Request $request)
    {  
        $this->validate($request, [
            
            'nasabah'      => 'required|max:30',
            'jumlah'      => 'required|max:30',
        ]);

        $id_user           = $request->input('id_user');
        $nasabah           = $request->input('nasabah');
        $jumlah           = $request->input('jumlah');
        $deposit           = $request->input('deposit');
        if($jumlah > $deposit){
            Session::flash('alert-peringatan', 'Uang Anda Input Melebihi Saldo Anda.');
            return redirect('/');
        }else{

            $data['query_deposit'] = Deposit::whereHas('user', 
                                                                            function($query) use ($nasabah){
                                                                                $query->where('id', $nasabah);  
                                                                    })->first();
            if($data['query_deposit']){
                
                $update_deposit  = Deposit::where('user_id', $nasabah)
                    ->update([
                        'total_deposit'              => $data['query_deposit']->total_deposit + $jumlah,
                    ]);
                if($update_deposit){
                    Deposit::where('user_id', $id_user)
                    ->update([  
                        'total_deposit'              => $deposit - $jumlah,
                    ]);

                    

                    
                }
            }else{
                $new_deposit = new Deposit();
                $new_deposit->user_id = $nasabah;
                $new_deposit->total_deposit = $jumlah;
                $new_deposit->save();

                Deposit::where('user_id', $id_user)
                    ->update([  
                        'total_deposit'              => $deposit - $jumlah,
                    ]);
                
            }
            
            $riw_transfer = new RiwTransfer();
            $riw_transfer->user_id = $id_user;
            $riw_transfer->riw_transfer = $jumlah;
            $riw_transfer->save();
            // echo $deposit - $jumlah;
            Session::flash('alert-success', 'Berhasil Transfer Uang Anda.');
            return redirect('/');
            
    
           
        }
      
     

    }
}
