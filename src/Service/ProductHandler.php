<?php

namespace App\Service;

class ProductHandler
{
    /**
     * 获取商品总金额
     * @param $goods
     * @return int
     */
    public function getTotalPrice($goods) :int{
        $totalPrice = 0;
        foreach ($goods as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }

    /**
     * 筛选商品类型并按照金额排序
     * @param $goods
     * @param string $search
     * @return array
     */
    public function searchGoodsPriceSort($goods,$search='') :array{
        $list = [];
        if($search != ''){
            $search = strtolower($search);
            foreach ($goods as $product){
                if(strtolower($product['type']) == $search){
                    $list[] = $product;
                }
            }
        }else{
            $list = $goods;
        }
        if(!empty($list)){
            $price = [];
            foreach ($list as $product){
                $price[$product['price']][] = $product;
            }
            krsort($price);
            $newList = [];
            foreach ($price as $product){
                $newList = array_merge($newList,$product);
            }
            return $newList;
        }else{
            return [];
        }
    }

    /**
     * 商品的日期转化为unix timestamp
     * @param $goods
     * @return array
     */
    public function dateToTime($goods) :array{
        if(!empty($goods)){
            foreach ($goods as &$product){
                $product['create_time'] = strtotime($product['create_at']);
            }
            return $goods;
        }else{
            return  [];
        }
    }
}