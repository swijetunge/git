<?php

$url = 'https://www.codecourse.com:8080/tutorials/tutorial/1?pretty=true&umber=1#top';

$parseUrl = parse_url($url);

echo '<pre>', print_r($parseUrl, true), '</pre>';