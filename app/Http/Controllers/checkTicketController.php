<?php

namespace App\Http\Controllers;
use App\ComboTicket;
use App\manageTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class checkTicketController extends Controller
{
    public function check_ticket(){
        $checkTicket = manageTicket::all();
        return view('pages.checkTicket')->with(compact('checkTicket'));
    }
    public function check_ticket_filter(Request $request){
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
        // if($request->has('gate')){
        //     $manageTicketFilter->where('Gate','LIKE', '%'.$request->gate.'%');
        // }
        $filters = $manageTicketFilter->get();
        
        return view('pages.checkTicketFilter',['checkFilters'=>$filters]);
    }

    public function update_status(Request $req){
        $data=[
            'status_use' => $req->status_use
        ];
// dd($req->id);
        DB::table('tbl_order_detail')->where('id',$req->id)->update($data);

        return redirect('/manage-ticket');
    }
}
