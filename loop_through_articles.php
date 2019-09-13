<?php
function loop_through_articles($results, $minNumber, $maxNumber)
{
 $article = (object) [
  $article_results,
  $publication_date => [
   $article_publication_date,
   $timestamp,
   $month,
   $day,
   $year,
  ],
  $article_url,
  $article_headline,
  $article_snippit,
  $article_image,
 ];

 echo "<div class='flex-rows'>";
 for ($i = $minNumber; $i < $maxNumber; $i++) { //min: 1 max: 2
  $article_results          = $results->{"response"}->{"docs"}[$i];
  $article_image            = $article_results->{'multimedia'}[0]->{'url'};
  $article_url              = $article_results->{'web_url'};
  $article_publication_date = $article_results->{'pub_date'};
  $article_headline         = $article_results->{'headline'}->{'main'};
  $article_snippit          = $article_results->{'snippet'};

  if (isset($article_results)) {
   echo "<div class='box_" . ($i + 1) . " boxes'>"; // 0
   echo "<a href='" . $article_url . "' target='_blank'>";
   echo "<div>";

   echo "<h3>";
   echo $article_headline;
   echo "</h3>";

   echo "<p>";
   echo $article_snippit;
   echo "</p>";

   if (isset($article_image)) {
    echo "<img src='https://www.nytimes.com/" . $article_image . "'>";
   }

   echo "<p class='article_date'>";
   # print_r(date_parse($article_results -> {'pub_date'}));

   $timestamp = strtotime($article_publication_date); //1072915200
   $month     = idate('m', $timestamp);
   $day       = idate('d', $timestamp);
   $year      = idate('y', $timestamp);

   echo $month . '/' . $day . '/' . $year;
   echo "</p>";

   echo "</div>";
   echo "</a>";
   echo "</div>"; // boxes
  }
 } // for loop end
 echo "</div>"; // flex-rows

}