<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBoard extends Model
{
    protected $table = 'user_boards';
	public $timestamps = false;

    public function local_board()
    {
        return \App\LocalBoard::where('letter', $this->attributes['local_board'])->first();
    }
}
