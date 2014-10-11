<?php
/**
 * Pagination code  adapted from "Pages List Limited" server behavior,
 * a subset of Tom Muck's Recordset Navigation Suite for Adobe Dreamweaver
 * that I used a lot in my old procedural days: please thank him, not me :-)
 *
 * http://www.tom-muck.com/extensions/help/RecordsetNavigationSuite/
 */

namespace Ivanhalen\Pagination;

use \Illuminate\Pagination\Paginator;
use \Config;


class FramePresenter extends EdgePresenter {

    /*
     * Init the start and end links
     *
     * @ return void
     */
    function __construct(Paginator $paginator){
        parent::__construct($paginator);
        $this->linksCount = Config::get('pagination::frame.links');
        $this->startLink = max(1, $this->currentPage - intval($this->linksCount / 2));
        $this->tmpLink = $this->startLink + $this->linksCount - 1;
        $this->endLink = min($this->tmpLink, $this->lastPage);
        if ($this->endLink != $this->tmpLink){
            $this->startLink = max(1, $this->endLink - $this->linksCount + 1);
        }
    }

    /**
     * Render the Pagination contents.
     *
     * @return string
     */
    public function render()
    {
        // Get the page range based on constructor properties and build the main pagination
        $content = $this->getPageRange($this->startLink, $this->endLink);

        // Build the edge links
        $prev = $this->getPrevious(Config::get('pagination::frame.prev_link_text'));
        $next = $this->getNext(Config::get('pagination::frame.next_link_text'));
        $first = $this->getFirst(Config::get('pagination::frame.first_link_text'));
        $last = $this->getLast(Config::get('pagination::frame.last_link_text'));

        // Build the whole pagination
        return Config::get('pagination::show_first_last')
            ? $first . $prev . $content . $next . $last
            : $prev . $content . $next;
    }

} 