<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manageTicket extends Model
{
    protected $table = 'tbl_order_detail';
    protected $primaryKey = 'id';
    protected $fillable =['username_order, email, phone_number, quantity_ticket, total_price, package_id, package_code,package_name, status, date_use,status_use, Gate'];
}
