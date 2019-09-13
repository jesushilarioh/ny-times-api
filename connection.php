<?php
if(isset($_POST['search_term'])) {
  $search_term = htmlspecialchars($_POST['search_term']);

$curl = curl_init(); // AJax

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$query = array(
    "api-key" => "<!-- Your API Key Here -->",
    "q"       => $search_term,
    "sort"    => "newest",
);
curl_setopt($curl, CURLOPT_URL,
    "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query) // api-key=092384093&q=hello&sort=newest
);
$result = json_decode(curl_exec($curl));

curl_close($curl);

} else {
  echo "Time to go <a href='./index.php'>home</a>.";
}