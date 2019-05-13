<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Example extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'examples';

    const SECRET_RADIO = [
        'M' => 'Male',
        'F' => 'Female',
    ];

    const MEAL_PREFERENCE_SELECT = [
        'veg'    => 'Veg',
        'nonveg' => 'Non-Veg',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_of_birth',
        'discharge_date',
    ];

    protected $fillable = [
        'email',
        'notes',
        'secret',
        'height',
        'fullname',
        'created_at',
        'updated_at',
        'deleted_at',
        'hospital_id',
        'date_of_birth',
        'time_of_birth',
        'no_of_siblings',
        'discharge_date',
        'meal_preference',
        'terms_agreement',
        'expected_salary',
    ];

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDischargeDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDischargeDateAttribute($value)
    {
        $this->attributes['discharge_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getuploadDocsAttribute()
    {
        return $this->getMedia('upload_docs')->last();
    }

    public function getadditionalDocumentsAttribute()
    {
        return $this->getMedia('additional_documents');
    }

    public function getprofilePictureAttribute()
    {
        $file = $this->getMedia('profile_picture')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }

    public function getadditionalPhotosAttribute()
    {
        $files = $this->getMedia('additionalPhotos');

        $files->each(function ($item) {
            $item->url = $item->getUrl();
        });

        return $files;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}
