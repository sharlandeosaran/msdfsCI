<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Applicant extends Model
{

    public function application()
    {
        return $this->belongsTo('App\Application');
    }

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
