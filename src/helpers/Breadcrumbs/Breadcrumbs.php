<?php

namespace Jakubsacha\Adminlte\Helpers;

use Illuminate\Support\Facades\URL;

/**
 * Breadcrumb class
 */
class Breadcrumbs extends \MrJuliuss\Syntara\Helpers\Breadcrumbs {

    /**
     * Create breadcrumb
     * @param array $items breadcrumb items
     * @return string
     */
    public static function create($items) {
        if (empty($items)) {
            return;
        }

        $crumbs = array();
        foreach ($items as $key => $item) {
            $active = false;
            if ((count($items) - 1) === $key) {
                $active = true;
            }
            $crumbs[] = static::renderItem($item, $active);
        }

        $html = '<ol class="breadcrumb">';
        $html .= implode('', $crumbs);
        $html .= '</ol>';

        return $html;
    }

    /**
     * Render the current item
     * @param array $item part of the breadcrumb
     * @param boolean $active current breadcrumb is active
     * @return string
     */
    public static function renderItem($item, $active) {
        $class = "";
        if ($active === true) {
            $class = "active";
        }

        $html = '<li><a href="' . URL::to($item["link"]) . '" class="' . $class . '">';
        if ($item["icon"] !== '') {
            if (strpos($item["icon"], 'glyphicon') !== false) {
                $html .= '<i class="glyphicon ' . $item["icon"] . '"></i> ';
            } else {
                $html .= '<i class="fa ' . $item["icon"] . '"></i> ';
            }
        }

        $html .= $item["title"] . '</a></li>';

        return $html;
    }

}
