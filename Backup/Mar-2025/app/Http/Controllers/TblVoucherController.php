<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblVoucher;

class TblVoucherController extends Controller
{
    
    public function insert_sale_credit_voucher($Narration, $Comment, $COAID, $amnt_type,$amnt = null, $referenceNo, $reVID,$payment_insert_id)
    {
        $VDate = date('Y-m-d');
        $coaController = new TblAccCoaController();
        $maxid = $coaController->getMaxFieldNumber('id', 'tbl_acc_vaucher', 'Vtype', 'CV', 'VNo');
        $u_id = auth()->user()->id;
        $vaucherNo = "CV-". ($maxid +1);

        $debitinsert = array(
            'fyear'          =>  0,
            'VNo'            =>  $vaucherNo,
            'Vtype'          =>  'CV',
            'referenceNo'    =>  $payment_insert_id,
            'VDate'          =>  $VDate,
            'approvedDate'   =>  $VDate,
            'COAID'          =>  $COAID,
            'Narration'      =>  $Narration,     
            'ledgerComment'  =>  $Comment,   
            'RevCodde'       =>  $reVID,
            'isApproved'     =>  1,
            'approvedBy'     =>  $u_id,
        );

        if($amnt_type == 'Debit'){
            $debitinsert['Debit']  = $amnt;
            $debitinsert['Credit'] =  0.00;    
        }else{
            $debitinsert['Debit']  = 0.00;
            $debitinsert['Credit'] =  $amnt; 
        }

        $voucherCreate = TblVoucher::create($debitinsert);
        // $voucherCreate = DB::table('tbl_acc_vaucher')->insert($debitinsert);
        // make a model query TblVoucher

        if($voucherCreate){
            
        }
        
    return true;
    }
}
