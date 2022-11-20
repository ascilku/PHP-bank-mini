<?php

namespace App\Http\Controllers\deposit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Crypt;

use App\Models\User                 as User;
use App\Models\Deposit              as Deposit;
use App\Models\RiwDeposit           as RiwDeposit;

class C_Deposit extends Controller
{
    //
    public function index($key, Request $request)
    {   
        if($request->input('key') != null){

            $course_id = Crypt::decrypt($request->input('key')); 

            if(isset($_COOKIE['cookie-storage'])){
                $cookie = $_COOKIE['cookie-storage'];
                $data['query_nik'] = User::where('nik', $cookie)->first();
                if($data['query_nik']){
                    $data['edit_deposit'] = Deposit::with('user')->where('id', $course_id)->first();

                    $data['query_deposit'] = Deposit::with('user')->with('riwDeposit')->get();
                
                    $data['query_user'] = User::where('akses', "Users")->get();
                    
                    $data['key'] = $key;
                    return view('deposit.menu-deposit', $data);
                }
            }else{
                Session::flash('alert-login', 'You are forced to logout because there is no access.');
                return redirect('/login');
            }

        }else{
            if(isset($_COOKIE['cookie-storage'])){
                $cookie = $_COOKIE['cookie-storage'];
                $data['query_nik'] = User::where('nik', $cookie)->first();
                if($data['query_nik']->akses == "Users"){
                    $data['query_deposit'] = Deposit::with('user')->whereHas('user', 
                                                                            function($query) use ($cookie){
                                                                                $query->where('nik', $cookie);  
                                                                    })->with('riwDeposit')->get();
                }else{
                    $data['query_deposit'] = Deposit::with('user')->with('riwDeposit')->get();
                }
                
                $data['query_riw_deposit'] = RiwDeposit::
                                                                with([
                                                                    'deposit' => function($query){
                                                                        $query->with('user');
                                                                    }
                                                                ])->get();
                if($data['query_nik']){
                    $data['key'] = $key;
                    $data['query_user'] = User::where('akses', "Users")->get();
                    return view('deposit.menu-deposit', $data);
                }
            }else{
                Session::flash('alert-login', 'You are forced to logout because there is no access.');
                return redirect('/login');
            }
        }
       
        
    }

    public function depositPost(Request $request)
    {  
        $this->validate($request, [
            
            'nasabah'      => 'required|max:30',
            'jumlah'      => 'required|max:30',
        ]);

        $nasabah           = $request->input('nasabah');
        $jumlah           = $request->input('jumlah');
      
        if(isset($request->id)){
            $deposit  = Deposit::where('id', $request->id)
                                ->update([
                                    'total_deposit'              => $jumlah,
                                ]);


            $riw_deposit = new RiwDeposit();
                $riw_deposit->deposit_id        = $request->id;
                $riw_deposit->riw_deposit       = $jumlah;
            $riw_deposit->save();

            Session::flash('alert-success', 'Berhasil Edit Deposit.');
            return redirect('/deposit/deposit');

        }else{
            
            $deposit = Deposit::where('user_id', $nasabah)->first();
            if(isset($deposit)){
                $deposit = Deposit::find($deposit->id);
                    $deposit->total_deposit       = $deposit->total_deposit + $jumlah;
                $deposit->save();
            }else{
                $deposit = new Deposit();
                    $deposit->user_id             = $nasabah;
                    $deposit->total_deposit       = $jumlah;
                $deposit->save();
            }
            

            $riw_deposit = new RiwDeposit();
                $riw_deposit->deposit_id        = $deposit->id;
                $riw_deposit->riw_deposit       = $jumlah;
            $riw_deposit->save();

            Session::flash('alert-success', 'Berhasil Tambah Deposit.');
            return redirect('/deposit/data-deposit');
                
        }
    }

    public function depositPostUser(Request $request)
    {  
        $this->validate($request, [
            
            'nasabah'      => 'max:30',
            'jumlah'      => 'required|max:30',
        ]);
        if(isset($_COOKIE['cookie-storage'])){
            $cookie = $_COOKIE['cookie-storage'];
           
            $nasabah           = $request->input('nasabah');
            $jumlah           = $request->input('jumlah');
            
            if(isset($request->id)){
                $deposit_id = $request->id;
                $deposit  = Deposit::where('id', $request->id)
                ->update([
                    'total_deposit'              => $jumlah + $request->total_deposit,
                ]);
            }else{
                $data['query_nik'] = User::where('nik', $cookie)->first();

                $deposit  = new Deposit();
                    $deposit->user_id = $data['query_nik']->id;
                    $deposit->total_deposit = $jumlah;
                $deposit->save();

                $deposit_id = $deposit->id;
                
            }
            


            $riw_deposit = new RiwDeposit();
            $riw_deposit->deposit_id        = $deposit_id;
            $riw_deposit->riw_deposit       = $jumlah;
            $riw_deposit->save();

            Session::flash('alert-success', 'Berhasil Tambah Deposit Anda.');
            return redirect('/');

        }else{
            Session::flash('alert-login', 'You are forced to logout because there is no access.');
            return redirect('/login');
        }
    }


    public function depositDelete(Request $request)
    {  
        $course_id = Crypt::decrypt($request->input('key')); 

        $pengarangDelete = RiwDeposit::find($course_id); 
        $pengarangDelete->delete();
        Session::flash('alert-success-deposit', 'Berhasil Delete Riwayat Deposit.');
        return redirect('/deposit/data-deposit');
    }
}
