<?php defined('SYSPATH') or die('No direct script access.');

class Model_Location extends ORM {

    
    public function validator($data) {
        return Validation::factory($data)
            ->rule('name', 'not_empty')
            ->rule('name', 'min_length', array(':value', 3))
            ->rule('image', 'not_empty');
    }

    
}