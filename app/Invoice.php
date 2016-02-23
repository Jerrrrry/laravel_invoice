<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $fillable = ['name','address','email','date','time','description','hourly','total'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
