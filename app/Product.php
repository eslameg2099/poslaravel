<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = [];

	protected $appends = [ 'profit_percent'];



    public function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price;
        return number_format($profit_percent, 2);

    }//end of get profit attribute

	public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'product_order');

    }

   
}
