<?php
/**
 * Uses jQuery Waypoints Infinite scroll default settings
 * http://imakewebthings.com/jquery-waypoints/shortcuts/infinite-scroll/
 */

namespace Ivanhalen\Pagination;

use \Illuminate\Pagination\BootstrapPresenter;
use \Config;


class ScrollPresenter extends BootstrapPresenter {

    /**
     * Get HTML wrapper for an infinite scroll page link.
     *
     * @param  string  $url
     * @param  int  $page
     * @param  string  $rel
     * @return string
     */
    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';
        $class = Config::get('pagination::scroll.infinite_more_link_class');

        return '<li><a class='.$class.' href="'.$url.'"'.$rel.'>'.$page.'</a></li>';
    }

} 