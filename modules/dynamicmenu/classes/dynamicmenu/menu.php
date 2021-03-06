<?php defined('SYSPATH') or die('No direct script access.');

class DynamicMenu_Menu {

    private $position;

    private $links = array();

    /**
     * These will be used as the html attributes for all 
     * anchor tags for this link
     */
    private $attributes = array();

    /**
     * @param String $position will be used to identify the menu
     */
    public function __construct($position) {
        $this->position = $position;
        $this->extend_links(Arr::get(DynamicMenu::$extended, $position, array()));
    }

    /**
     * Method for adding a link to the menu
     * @param String $url - url that the link points to
     * @param String $title - title that appears
     * @param int $sort_order - order at which the link should appear in menu
     * @param array $attributes - html attributes for this link only.\
     * the global attributes specified by the instance variable will be overridden by this
     */
    public function add_link($url, $title, $sort_order=NULL, $attributes=array()) {
        $args = func_get_args();
    	$filter_pass = DynamicMenu_Filter::apply_filters('add_link', $args);
        if (!$filter_pass) {
            return $this;
        }
        $attributes = array_merge($this->attributes, $attributes);
        $anchor = Html::anchor($url, $title, $attributes);
        $key = self::slugify($title);
        $this->links[$key] = array(
            'html' => $anchor,
            'title' => $title,
            'sort_order' => (int) $sort_order,
        );
        return $this;
    }

    public function set_attributes($attributes) {
        $this->attributes = $attributes;
    }

    public function get_attributes() {
        return $this->attributes;
    }

    public function get_links() {
        return $this->links;
    }

    /**
     * Add the links specified by the modules in init.php files
     */
    private function extend_links($links) {
        if (!$links) {
            return True;
        } 
        foreach ($links as $link) {
            list($url, $title, $sort_order, $attributes) = $link;
            $this->add_link($url, $title, $sort_order, $attributes);
        }
    }

    /**
     * Return the links in the menu as an array
     * @return Array 
     */
    public function as_array() {
        uasort($this->links, 'DynamicMenu_Menu::sort_by');
        return $this->links;
    }

    /**
     * Method to find out if a link is present in the menu
     * This will be used before rendering in the views
     * @param String $key should be slugified title
     * @param Boolean
     */
    public function has_link($key) {
        return isset($this->links[$key]);
    }

    private static function sort_by($a, $b) {
        if ($a['sort_order'] === $b['sort_order']) {
            return 0;
        }
        return ($a['sort_order'] < $b['sort_order']) ? -1 : 1;
    }

    /**
     * Slugify a String using underscores 
     * eg. vineetnaik's blog will be slugified to,
     * vineetnaiks_blog
     */
    public static function slugify($str) {
        $str = Url::title($str);
        return str_replace(array('-', '.'), '_', $str);        
    }    

    public function __get($key) {
        return $this->links[$key]['html'];
    }
}