<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    const TYPE_DRAFT = 'DRAFT';

    const TYPE_PUBLISHED = 'PUBLISHED';

    const TYPE_UNPUBLISHED = 'UNPUBLISHED';

    public $table = 'news';

    protected $fillable = ['category_id', 'type', 'title', 'content'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function getTypeOptions() {
        return [
            self::TYPE_DRAFT => 'Draft',
            self::TYPE_PUBLISHED => 'Published',
            self::TYPE_UNPUBLISHED => 'Unpublished',
        ];
    }

    public static function getTypeName($type)
    {
        $mapped = self::getTypeOptions();

        return $mapped[constant('self::TYPE_' . $type)];
    }
}
