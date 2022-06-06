<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
    ];

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
