<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const IS_ACTIVE_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public $table = 'courses';

    protected $appends = [
        'picture',
    ];

    protected $dates = [
        'class_start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'course_category_id',
        'title',
        'slug',
        'introduction',
        'about_this_course',
        'duration',
        'class_start_date',
        'class_end_date',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function courseLessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }

    public function course_category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function getClassStartDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setClassStartDateAttribute($value)
    {
        $this->attributes['class_start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function course_content_types()
    {
        return $this->belongsToMany(CourseContentType::class);
    }

    public function skill_covereds()
    {
        return $this->belongsToMany(SkillsCovered::class);
    }

    public function required_skills()
    {
        return $this->belongsToMany(RequiredSkill::class);
    }

    public function getPictureAttribute()
    {
        $file = $this->getMedia('picture')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
