<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title>Fitzwilliam Museum news</title>
  <description>Atom Feed for Fitzwilliam Museum news </description>
  <link href="{{ URL::to('/news/feed') }}" />
  <author>
    <name>The Fitzwilliam Museum</name>
    <email>press@fitzmuseum.cam.ac.uk</email>
  </author>
  <rights>Chancellor, Masters, and Scholars of the University of Cambridge: CC-BY</rights>
  <logo>{{ URL::to('/images/logos/FV.svg') }}</logo>
  <generator>Powered by the magic of Daniel Pett</generator>
  @foreach ($items['data'] as $item)
  <entry>
    <title>{{ str_replace("&", "&amp;", $item['article_title']) }}</title>
    <summary><![CDATA[{!! $item['article_excerpt'] !!}]]></summary>
    <content type="html"><![CDATA[ @markdown($item['article_body'])]]></content>
    <pubDate>{{ date('D, d M Y H:i:s', strtotime($item['publication_date'])) }} GMT</pubDate>
    <link href="{{ route('article', $item['slug']) }}" />
    <guid>{{ url($item['slug']) }}</guid>
    <link href="{{ route('article', $item['slug']) }}" rel="alternate"  />
  </entry>
  @endforeach
  <link rel="self" type="application/atom+xml" href="http://www.syfyportal.com/atomFeed.php?page=3"/>
  <link rel="first" href="http://www.syfyportal.com/atomFeed.php"/>
  <link rel="next" href="http://www.syfyportal.com/atomFeed.php?page=4"/>
  <link rel="previous" href="http://www.syfyportal.com/atomFeed.php?page=2"/>
  <link rel="last" href="http://www.syfyportal.com/atomFeed.php?page=147"/>
</feed>
