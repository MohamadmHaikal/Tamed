<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class WalletController extends Controller
{
   
    public function _getChargeAccount()
    {
        return view('Wallet.recharge');
    }
    public function _getAccountStatement()
    {
        return view('Wallet.account-statement');
    }
    public function _getRefund()
    {
        return view('Wallet.Refund');
    }
 
}
