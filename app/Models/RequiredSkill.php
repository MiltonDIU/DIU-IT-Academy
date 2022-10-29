<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredSkill extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Auditable;

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

    protected $table = "required_skills";

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


}
