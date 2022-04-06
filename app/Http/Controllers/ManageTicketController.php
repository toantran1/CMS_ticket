<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComboTicket;
use App\manageTicket;
class ManageTicketController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function manage_ticket(){
        $manageTicket = manageTicket::all();
        return view('pages.manageTicket')->with(compact('manageTicket')); 
    }
    public function list_ticket(){
        return view('pages.listComboTicket'); 
    }

    public function add_new_ticket(){
        $data = request()->validate([
            'ticket_name' => 'required',
            'ticket_code' => 'required',
            'apply_date' => 'required',
            'exp' => 'required',
            'price_ticket' => 'required',
            'price_combo' => 'nullable',
            'qty_ticket' => 'nullable',
            'status' => 'required',
        ]);

        $comboTicket = new ComboTicket;

        $comboTicket->combo_name = $data['ticket_name'];
        $comboTicket->combo_code = $data['ticket_code'];
        $comboTicket->res_date = $data['apply_date'];
        $comboTicket->EXP = $data['exp'];
        $comboTicket->priceTicket = $data['price_ticket'];  
        $comboTicket->priceCombo = isset($data['price_combo'])? $data['price_combo'] : "-";
        $comboTicket->qty = isset($data['qty_ticket'])? $data['qty_ticket'] : null;
        $comboTicket->status = $data['status'];
        $comboTicket->save();

        return redirect('/list-ticket');
    }

    // public function filter_index(){
    //     return view('pages.filter');
    // }
    public function filter(Request $request){
        $manageTicketFilter = manageTicket::query();
        // if($request->has('apply_date')){
        //     $manageTicketFilter->where('created_at','LIKE', '2022-04-05');
        // }
        if($request->has('exp')){
            $manageTicketFilter->where('date_use','LIKE', '%'.$request->exp.'%');
        }
        if($request->has('optradio')){
            $manageTicketFilter->where('status_use','LIKE', '%'.$request->optradio.'%');
        }
        if($request->has('gate')){
            $manageTicketFilter->where('Gate','LIKE', '%'.$request->gate.'%');
        }
        $filters = $manageTicketFilter->get();
        
        return view('pages.filter',['filters'=>$filters]);
    }
}
