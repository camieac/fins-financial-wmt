<?php
class RssHelper extends AppHelper {

    var $helpers = array('Xml');

    function parseRss($limit = 3) {
        // Parse the RSS feed
        $xml = Xml::build('http://feeds.bbci.co.uk/news/business/rss.xml');
        $data = Xml::toArray($xml);

        // Filter any non-news items
        $items = $data;//$items = $this->filterItems($data);
        // Prepare output array
        $output = array();

        // Loop over the results
        for($i = 0;$i < $limit;$i++) {
            $output[$i] = $items[$i];
        }

        // Return the filtered and limited items list
        return $output;
    }

    function filterItems($data) {
        // Prepare results array
        $results = array();

        // Filter any non-news items
        foreach($data['Rss']['Channel']['Item'] as $item) {
            if($item['category'] == 'News') {
                $results[] = $item;
            }
        }

        return $results;
    }

}
?>
