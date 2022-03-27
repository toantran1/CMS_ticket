<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComboTicket;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class ShowComboController extends Controller
{
  
    public function show_combo(){
        $comboTicket = ComboTicket::all();
        return view('pages.listComboTicket')->with(compact('comboTicket'));
    }
    // public function show_detail_ticket($id){
    //     $show_detail = ComboTicket::findOrFail($id);
        
    //     return redirect('/edit-ticket',compact('show_detail'));
       
    // }
    public function update_ticket(Request $req){
        $data = [
        'combo_name' => $req->uticket_name,
        'combo_code' => $req->uticket_code,
        'res_date' => $req->uapply_date,
        'EXP' => $req->uexp,
        'priceTicket' => $req->uprice_ticket,
        'priceCombo' => $req->uprice_combo,
        'qty' => $req->uqty_ticket,
        'status' => $req->ustatus
        ];
dd($req->id);
        DB::table('tbl_comboTicket')->where('combo_id',$req->id)->update($data);
        return redirect()->back();

    }
}
