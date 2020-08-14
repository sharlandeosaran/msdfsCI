<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationGrant extends Model
{

    public function application()
    {
        return $this->hasOne('App\Application', 'id', 'application_id');
    }
}
