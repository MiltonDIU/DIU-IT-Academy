<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonType extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const IS_ACTIVE_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public $table = 'lesson_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function lessonTypeLessons()
    {
        return $this->hasMany(Lesson::class, 'lesson_type_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
