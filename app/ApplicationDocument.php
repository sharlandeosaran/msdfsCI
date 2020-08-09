<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
	public $timestamps = false;

    public function getPathAttribute($value)
    {
        return $value? decrypt($value) : null;
    }
    public function setPathAttribute($value)
    {
        $this->attributes['path'] = $value? encrypt($value) : null;
    }

    public function getDocumentUrlAttribute($value)
    {
        return $this->attributes['path']? url('/storage/'. $this->path) : null;
    }

    public function type()
    {
        return $this->hasOne('App\DocumentType', 'id', 'document_type_id');
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
    }
}
