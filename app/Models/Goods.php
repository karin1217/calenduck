<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Goods extends Model
{
     /**
* Add a left join to the query.
*
* @param  string  $table
* @param  string  $first
* @param  string|null  $operator
* @param  string|null  $second
* @return \Illuminate\Database\Query\Builder|static
*/
//    public function leftJoin($table, $first, $operator = null, $second = null)


//
//        SELECT * FROM goods
//LEFT JOIN `goods_attributes`
//	ON goods.id = goods_attributes.goods_id
//LEFT JOIN `goods_attribute_names`
//	ON `goods_attributes`.`attribute_name_id`=`goods_attribute_names`.`id`
//LEFT JOIN `goods_attribute_values`
//	ON `goods_attributes`.`attribute_value_id`=`goods_attribute_values`.`id`
//LEFT JOIN `goods_attribute_filters` AS `gaf`
//	ON `gaf`.`goods_id`=`goods`.`id`
//        -- WHERE -- goods.category_id = 2
//    -- AND
//-- `goods_attribute_filters`.`attributes`
//WHERE MATCH (`gaf`.`attributes`)
//	AGAINST ('4,' IN NATURAL LANGUAGE MODE);

    public function searchName()
    {
        return $this::select('*', 'goods.id', 'goods.name', 'goods_attribute_names.name AS attribute_name','goods_attribute_values.value AS attribute_value')
            ->rightJoin('goods_skus', 'goods.id', '=', 'goods_skus.goods_id')
            ->leftJoin('goods_attributes', 'goods.id', '=', 'goods_attributes.goods_id')
            ->leftJoin('goods_attribute_names', 'goods_attributes.attribute_name_id', '=', 'goods_attribute_names.id')
            ->leftJoin('goods_attribute_values', 'goods_attributes.attribute_value_id', '=', 'goods_attribute_values.id')
            ->match(['`goods`.`name`'])->againstWhere('子名')->get();

    }
}
