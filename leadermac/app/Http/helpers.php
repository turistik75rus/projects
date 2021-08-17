<?php

function catalog_url($lang, $main_category = null, $sub_category = null, $product = null) {
    if ($main_category == null) {
        return '/' . $lang . '/equipment';
    } else {
        if ($sub_category == null) {
            return '/' . $lang . '/equipment/' . $main_category->slug;
        } else {
            if ($product == null) {
                return '/' . $lang . '/equipment/' . $main_category->slug . '/' . $sub_category->slug;
            } else {

                return '/' . $lang . '/equipment/' . $main_category->slug . '/' . $sub_category->slug . '/' . $product->slug;
            }
        }
    }
}

function blocks_replace($content, $blocks) {

    $re = '/\&lt;--block:(.*?)\--&gt;/';


    preg_match_all($re, $content, $matches, PREG_SET_ORDER);

    foreach ($matches as $match) {
        if (isset($blocks[$match[1]])) {
            $content = str_replace($match[0], $blocks[$match[1]]->content, $content);
        } else {
            $content = str_replace($match[0], '', $content);
        }
    }

    return $content;
}


function paginator_link($category, $i) {
    
  
    if($i > 1) {
    return '/'.$category->slug.'/stranica-'.$i;
    } else {
        return '/'.$category->slug;
    }
}