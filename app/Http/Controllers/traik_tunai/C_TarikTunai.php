<?php

namespace App\Http\Controllers\traik_tunai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Deposit              as Deposit;
use App\Models\RiwTarikTunai              as RiwTarikTunai;

use Session;
class C_TarikTunai extends Controller
{
    public function depositPostTarikTunai(Request $request)
    {  
        $this->validate($request, [
            'jumlah'      => 'required|max:30',
        ]);

        $jumlah           = $request->input('jumlah');
        $deposit_sekarang = $request->total_deposit;
        if($jumlah > $deposit_sekarang){
            Session::flash('alert-peringatan', 'Uang Anda Input Melebihi Saldo Anda.');
            return redirect('/');
        }else{

            $deposit  = Deposit::where('id', $request->id)
            ->update([
                'total_deposit'              => $deposit_sekarang - $jumlah,
            ]);

            $riw_tariktunai = new RiwTarikTunai();
                $riw_tariktunai->user_id = $request->id_user;
                $riw_tariktunai->riw_tariktunai = $jumlah;
            $riw_tariktunai->save();
    
            Session::flash('alert-success', 'Berhasil Tarik Tunai Anda. Silahkan Ambil Uang Anda.');
            return redirect('/');
        }
      
     

    }
}
