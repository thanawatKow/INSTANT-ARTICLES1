<?php
namespace Facebook\InstantArticles\Transformer;
require_once('vendor/autoload.php');

use Facebook\InstantArticles\Elements\InstantArticle;
use Facebook\InstantArticles\Client\Client;
$the_html = '<!doctype html>
<html lang="en" prefix="op: http://media.facebook.com/op#">
<head>
  <meta charset="utf-8">
  <meta property="op:markup_version" content="v1.0">
  <link rel="canonical" href="http://myarticle">
  <meta property="fb:article_style" content="default">
</head>
<body>
  <article>
    <header>
      <h1> test title</h1>
      <h2> test subtitle </h2>

       <time class="op-published" dateTime="2016-06-20T08:00">June 17th 2016, 8:00 AM</time>
      <time class="op-modified" dateTime="2016-06-20T08:00">June 17th 2016, 8:00 AM</time>

      <p> Test test test </p>
    </header>
  </article>
</body>
</html>';

 $fb = Client::create(
    '1335396193222019',
    '45cb6b14299eafb282bdf42f4315ea33',
    'EAACEdEose0cBAPXWhCFHglBEKeg7CRURbHgkNsIojSOLW5FZAdHnZBbTGTZAr6AO0EjgsimSL4zRGQqoUqfFlo7gvpweFZBQIStt2ZCJiTAKwHMZCqjec47fq62scGLQf6WR7rcaS1NsleEjWOC6sx3lOoS9hAGnC7Whnh2wnnArsl5JbkyqV8Yq9GP4QTrBYZD',
    '1920957664803342',
     true //development env
 );



$rules = file_get_contents( "simple-rules.json", true);
$instant_article = InstantArticle::create();
$transformer = new Transformer();
$transformer->loadRules($rules);
libxml_use_internal_errors(true);
$document = new \DOMDocument();
$document->loadHTML($the_html);
libxml_use_internal_errors(false);

$transformer->transform($instant_article, $document);

$fb->importArticle($instant_article, true);
?>
