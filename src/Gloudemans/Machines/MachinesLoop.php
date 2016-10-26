<?php

namespace Gloudemans\Machines;

use WP_Query;

class MachinesLoop
{
    private static $query = null;

    public static function getQuery()
    {
        if(is_null(self::$query))
        {
            self::createQuery();
        }

        return self::$query;
    }

    protected static function createQuery()
    {
        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

        $query = [
            'post_type' => ['machine'],
            'posts_per_page' => 21,
            'paged' => $paged
        ];

//        if(is_tax(['product-department', 'product-color', 'product-category', 'product-tags']))
//        {
//            $obj = get_queried_object();
//            $query['tax_query'][] = [
//                'taxonomy' => $obj->taxonomy,
//                'field'    => 'slug',
//                'terms'    => $obj->slug,
//            ];
//        }

        if(isset($_GET['orderBy']))
        {
            if($_GET['orderBy'] == 'title')
            {
                $query['orderby'] = $_GET['orderBy'];
            }
            else if($_GET['orderBy'] == 'price')
            {
                $query['orderby'] = 'meta_value_num';
                $query['meta_key'] = 'product-price';
            }

            $query['order'] = isset($_GET['order']) ? $_GET['order'] : 'asc';
        }

        if(isset($_GET['perPage']))
        {
            if(in_array($_GET['perPage'], [9, 18, 27]))
            {
                $query['posts_per_page'] = $_GET['perPage'];
            }
        }
//
//        if(isset($_GET['priceMin']) && isset($_GET['priceMax']))
//        {
//            $min = floatval($_GET['priceMin']);
//            $max = floatval($_GET['priceMax']);
//
//            $query['meta_query'][] = [
//                'key'     => 'product-price',
//                'value'   => [$min, $max],
//                'type'    => 'DECIMAL',
//                'compare' => 'BETWEEN',
//            ];
//        }

        self::$query = new WP_Query($query);
    }
}