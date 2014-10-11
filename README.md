#Laravel 4 Alternative Pagination

An alternative pagination for Laravel 4 built on top of existing Bootstrap one. The idea came from "Pages List Limited" server behavior, a subset of [Tom Muck's Recordset Navigation Suite](http://www.tom-muck.com/extensions/help/RecordsetNavigationSuite/) for Adobe Dreamweaver that I used a lot in my old procedural days :-)

More, an infinite scroll based on [jQuery Waypoints](http://imakewebthings.com/jquery-waypoints/) is implemented as well.

This is my first Laravel package, and the first time I use GitHub as publisher: you know, there's always a "first time" for everything! :-)

##Installation

Add `ivanhalen/pagination` as a requirement to `composer.json`:

```javascript
{
    ...
    "require": {
        ...
        "ivanhalen/pagination": "dev-master"
        ...
    },
}
```

Update composer:

```
$ php composer.phar update
```

Add the provider to your `app/config/app.php`:

```php
'providers' => array(

    ...
    'Ivanhalen\Pagination\PaginationServiceProvider',

),
```

##Usage

This package provides two additional alternative paginations, named `frame` and `scroll`, to the Bootstrap ones implemented in Laravel.

###Frame

This is a sort of 'framed' navigation similar to the one found in some popular Bulletin Boards: where possible, the active page is surrounded by a fixed number of links both on the left and on the right side, like this:

... | [4](#) | [5](#) | **6** | [7](#) | [8](#) | ...

Change the default pagination style found in `app/config/view.php` with this one:
```php
'pagination' => 'pagination::frame',
```
That's all! :-)

###Scroll

This is an infinite scroll pagination based on jQuery Waypoints, very easy to implement: to get more informations and options, visit the [jQuery Waypoints Infinite Scroll](http://imakewebthings.com/jquery-waypoints/shortcuts/infinite-scroll/) page.

First include the required JavaScript files in your view:

```html
<script src="path/to/waypoints.min.js"></script>
<script src="path/to/shortcuts/infinite-scroll/waypoints-infinite.js"></script>
<script>
$(function() {
    $('.infinite-container').waypoint('infinite');
});
</script>
```

Then apply the CSS classes `.infinite-container` and `.infinite-item` respectively to container and items, like this:
```html
<ul class="infinite-container">
	<li class="infinite-item">...</li>
    ...
</ul>
```

At last change the default pagination style found in `app/config/view.php` with this one:
```php
'pagination' => 'pagination::scroll',
```

##Configuration

Of course you can customize the pagination: here are the options

* `show_first_last`: displays the 'First' and 'Last' links. Default: `true`
* `frame`:
	* `links`: set the number of links to show in the pagination. Default: `5`
    * `prev_link_text`: set the previous link text. Default: `&lsaquo;`
    * `next_link_text`: set the next link text. Default: `&rsaquo;`
    * `first_link_text`: set the first link text. Default: `&laquo;`
    * `last_link_text`: set the last link text. Default: `&raquo;`
* `scroll`:
	* `infinite_more_link_class`: set the CSS class for the link that triggers infinite scroll. Default: `infinite-more-link`

That's all: have fun!

Created by Ivan Sammartino. Copyright © 2014. Licensed under the [MIT license](LICENSE.md).
