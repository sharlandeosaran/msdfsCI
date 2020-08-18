<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    public function restore()
    {
        return \App\Status::find($this->restore_id);
    }

    public function getRestoreAttribute($value)
    {
        return $this->restore()->status;
    }
}
