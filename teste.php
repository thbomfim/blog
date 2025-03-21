<?php
require 'vendor/autoload.php';

use League\CommonMark\GithubFlavoredMarkdownConverter;

$converter = new GithubFlavoredMarkdownConverter();
$html = $converter->convert('# Hello World!');

echo $html;