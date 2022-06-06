<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
    ];

    /**
     * イベントリレーション
     */
    public function events()
    {
        return $this->hasMany(Event::class, 'category_id', 'category_id');
    }


    /**
     * categoriesテーブルのレコードを全件取得
     * 
     * @param void
     * @return Category categoriesテーブル
     */

    public function allCategoriesData()
    {
        return $this->get();
    }
}
