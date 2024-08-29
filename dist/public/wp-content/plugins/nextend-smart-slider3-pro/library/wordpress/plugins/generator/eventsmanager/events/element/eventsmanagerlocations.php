<?php

N2Loader::import('libraries.form.element.list');

class N2ElementEventsManagerLocations extends N2ElementList
{

    function fetchElement() {
        $args   = array(
            'posts_per_page'   => -1,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'post_status'      => 'publish',
            'suppress_filters' => true,
            'post_type'        => 'location'
        );
        $venues = get_posts($args);

        $this->_xml->addChild('option', 'All')
                   ->addAttribute('value', 0);

        if (count($venues)) {
            foreach ($venues AS $option) {
                $title   = ' - ' . $option->post_title;
                $town = get_post_meta($option->ID, '_location_town', true);
                if (!empty($town)) {
                    $title .= ', ' . $town;
                }
                $address = get_post_meta($option->ID, '_location_address', true);
                if (!empty($address)) {
                    $title .= ', ' . $address;
                }
                $this->_xml->addChild('option', htmlspecialchars($title))
                           ->addAttribute('value', $option->ID);
            }
        }

        return parent::fetchElement();
    }
}
