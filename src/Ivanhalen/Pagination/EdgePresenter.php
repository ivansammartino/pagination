<?php
/**
 * Adds First and Last page functionality to default Laravel Bootstrap pagination
 */

namespace Ivanhalen\Pagination;

use \Illuminate\Pagination\BootstrapPresenter;


class EdgePresenter extends BootstrapPresenter {

    /**
     * Get the first page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getFirst($text = '&laquo;')
    {
        // If the current page is less than or equal to one, it means we can't go any
        // further back in the pages, so we will render a disabled "first" button
        // when that is the case. Otherwise, we will give it an active "status".
        if ($this->currentPage <= 1)
        {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->getUrl(1);

        return $this->getPageLinkWrapper($url, $text, 'first');
    }

    /**
     * Get the last page pagination element.
     *
     * @param  string  $text
     * @return string
     */
    public function getLast($text = '&raquo;')
    {
        // If the current page is greater than or equal to the last page, it means we
        // can't go any further into the pages, as we're already on this last page
        // that is available, so we will make it the "last" link style disabled.
        if ($this->currentPage >= $this->lastPage)
        {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->getUrl($this->lastPage);

        return $this->getPageLinkWrapper($url, $text, 'last');
    }

} 