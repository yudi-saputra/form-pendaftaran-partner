<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';


    public function district()
    {
        return $this->belongsTo(District::class);
    }
}


// $parterner->village->district->regency->province->name;
// $parterner->village->district->regency->name;
// $parterner->village->district->name;
// $parterner->village->name;
