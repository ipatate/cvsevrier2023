<?php
$siteUrl = site_url();
$siteName = get_bloginfo('name');
// logo png
$logo = file_get_contents(__DIR__ . '/logo.svg');

echo '<a href="' . $siteUrl . '" title="' . $siteName . '" class="site-logo-wrapper">' . $logo . '</a>';
