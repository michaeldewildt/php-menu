<?php
require 'MenuItem.php';

$searchLinks = new MenuItem("Search", 1);
$searchLinks->addItem(
        new MenuItem("Google", 2, "http://www.google.com")
);
$searchLinks->addItem(
        new MenuItem("Yahoo", 2, "http://www.yahoo.com")
);

$socialLinks = new MenuItem("Social", 1);
$socialLinks->addItem(
        new MenuItem("Facebook", 2, "http://www.facebook.com")
);
$socialLinks->addItem(
        new MenuItem("Twitter", 2, "http://www.twitter.com")
);

$menu = new MenuItem("Links", 0);
$menu->addItem($searchLinks);
$menu->addItem($socialLinks);

echo $menu->serialize();
