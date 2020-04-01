<?php
$news_1_query = mysql_query("SELECT id, title, image, shortstory, date FROM cms_news ORDER BY id DESC LIMIT 1");
$news_2_query = mysql_query("SELECT id, title, image, shortstory, date FROM cms_news ORDER BY id DESC LIMIT 1, 2");
$news_3_query = mysql_query("SELECT id, title, image, shortstory, date FROM cms_news ORDER BY id DESC LIMIT 2, 3");
$news_4_query = mysql_query("SELECT id, title, image, shortstory, date FROM cms_news ORDER BY id DESC LIMIT 3, 4");

$news_1_row = mysql_fetch_assoc($news_1_query);
$news_2_row = mysql_fetch_assoc($news_2_query);
$news_3_row = mysql_fetch_assoc($news_3_query);
$news_4_row = mysql_fetch_assoc($news_4_query);

$news_1_title = isset($news_1_row['title']) ? ($news_1_row['title']) : 'Nada para ler...';
$news_1_snippet = isset($news_1_row['shortstory']) ? ($news_1_row['shortstory']) : 'Esta notícia ainda não existe.';
$news_1_date = isset($news_1_row['date']) ? ($news_1_row['date']) : 'Esta notícia ainda não existe.';
$news_1_topstory = isset($news_1_row['image']) ? ($news_1_row['image']) : '/web-gallery/images/top-story/shabbolin_300x187_A.gif';
$news_1_id = isset($news_1_row['id']) ? ($news_1_row['id']) : 0;

$news_2_title = isset($news_2_row['title']) ? ($news_2_row['title']) : 'Nada para ler...';
$news_2_snippet = isset($news_2_row['shortstory']) ? ($news_2_row['shortstory']) : 'Esta notícia ainda não existe.';
$news_2_date = isset($news_2_row['date']) ? ($news_2_row['date']) : 'Esta notícia ainda não existe.';
$news_2_topstory = isset($news_2_row['image']) ? ($news_2_row['image']) : '/web-gallery/images/top-story/shabbolin_300x187_A.gif';
$news_2_id = isset($news_2_row['id']) ? ($news_2_row['id']) : 0;

$news_3_title = isset($news_3_row['title']) ? ($news_3_row['title']) : 'Nada para ler...';
$news_3_snippet = isset($news_3_row['shortstory']) ? ($news_3_row['shortstory']) : 'Esta notícia ainda não existe.';
$news_3_date = isset($news_3_row['date']) ? ($news_3_row['date']) : 'Esta notícia ainda não existe.';
$news_3_topstory = isset($news_3_row['image']) ? ($news_3_row['image']) : '/web-gallery/images/top-story/shabbolin_300x187_A.gif';
$news_3_id = isset($news_3_row['id']) ? ($news_3_row['id']) : 0;

$news_4_title = isset($news_4_row['title']) ? ($news_4_row['title']) : 'Nada para ler...';
$news_4_snippet = isset($news_4_row['shortstory']) ? ($news_4_row['shortstory']) : 'Esta notícia ainda não existe.';
$news_4_date = isset($news_4_row['date']) ? ($news_4_row['date']) : 'Esta notícia ainda não existe.';
$news_4_topstory = isset($news_4_row['image']) ? ($news_4_row['image']) : '/web-gallery/images/top-story/shabbolin_300x187_A.gif';
$news_4_id = isset($news_4_row['id']) ? ($news_4_row['id']) : 0;
?>