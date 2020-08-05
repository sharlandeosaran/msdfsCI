<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
	public $timestamps = false;

    public function getDocumentUrlAttribute($value)
    {
        return $this->attributes['document']? asset('/storage/uploads').'/'.$this->applicant_id.'/'.$this->attributes['document'] : null;
        // **** change back - remove '!' ****
        // if (file_exists(public_path().'/storage/uploads/'.$this->id.'/'.$this->attributes['upload1'])){
            return $this->attributes['document'];
        // }else
            return;
    }

    public function getFileIconAttribute($value)
    {
        switch ($this->attributes['upload_type']) {
            case 'application/msword':
                return 'fa-file-word-o';
            break;
            
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                return 'fa-file-word-o';
            break;
            
            case 'application/pdf':
                return 'fa-file-pdf-o';
            break;
            
            case 'text/plain':
                return 'fa-file-text-o';
            break;
                                    
            default:
                return 'fa-file-text-o';
                break;
        }
        return $value? decrypt($value) : null;
    }
}
