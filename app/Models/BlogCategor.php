<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategor
 *
 * @package App\Models
 *
 * @property-read BlogCategor $parentCategory
 * @property-read string $parentTitle
 *
 */
class BlogCategor extends Model
{
    use HasFactory;
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable
    =   [      'title',
            'slug',
            'parent_id',
            'description',
        ];
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategor::class, 'parent_id', 'id');
    }


    /**
     * Создаем аксессор
     * @return string
     */

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
            ? 'Корень'
            : '???');
        return $title;
    }
    public function isRoot()
    {
        return $this->id === BlogCategor::ROOT;
    }


}
