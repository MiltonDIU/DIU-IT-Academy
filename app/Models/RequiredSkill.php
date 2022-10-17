<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredSkill extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;
protected $table = "required_skills";
    public const IS_ACTIVE_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];


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

    public function RequiredSkillCourses()
    {
        return $this->belongsToMany(Course::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
