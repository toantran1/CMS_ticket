<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComboTicket extends Model
{
    protected $table = 'tbl_comboTicket';
    protected $primaryKey = 'combo_id';
    protected $fillable =['combo_code,combo_name,res_date, EXP, priceTicket, priceCombo, qty, status'];
}
