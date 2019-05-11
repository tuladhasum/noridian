<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class CrmDocument extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'crm_documents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
        'customer_id',
        'description',
    ];

    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'customer_id');
    }

    public function getdocumentFileAttribute()
    {
        return $this->getMedia('document_file')->last();
    }
}
