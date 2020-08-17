<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleApplication extends Model
{
	public $timestamps = false;

    public function getApplicantNameAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setApplicantNameAttribute($value)
    {
        $this->attributes['applicant_name'] = $value? encrypt($value) : null;
    }

    public function getAddressAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = $value? encrypt($value) : null;
    }

    public function getSupplierAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setSupplierAttribute($value)
    {
        $this->attributes['supplier'] = $value? encrypt($value) : null;
    }

    public function getInvoiceAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setInvoiceAttribute($value)
    {
        $this->attributes['invoice'] = $value? encrypt($value) : null;
    }

    public function getContactAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setContactAttribute($value)
    {
        $this->attributes['contact'] = $value? encrypt($value) : null;
    }

    public function getScheduleRentAttribute($value)
    {
        return \App\ScheduleRent::where('schedule_application_id', $this->id)->first();
    }

    public function getScheduleItemsAttribute($value)
    {
        return \App\ScheduleItem::where('schedule_application_id', $this->id)->get();
    }

    public function getItemsAttribute($value)
    {
        $list = [
            'item' => '',
            'quantity' => '',
            'cost' => '',
        ];

        $items = $this->schedule_items;
        $total = 0;
        if ($items) {
            foreach ($items as $item ) {
                $list['item'] .= $item->item.'<hr>';
                $list['quantity'] .= $item->quantity.'<hr>';
                $list['cost'] .= number_format($item->cost, 2).'<hr>';
                $total += $item->cost;
            }
        }
        $list['item'] .= '<br><br>VAT 12.5%<br>Total';
        $list['cost'] .= '<br><br>'.number_format($total * 0.125, 2).'<br>'.number_format($total * 1.125, 2);

        // dd($list);

        return $list;
    }
}
