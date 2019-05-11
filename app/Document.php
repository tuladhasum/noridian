<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Document extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'documents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getdocumentFileAttribute()
    {
        return $this->getMedia('document_file')->last();
    }
}
