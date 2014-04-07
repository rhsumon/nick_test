<?php
use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $collection = 'users';
        
        public function networks()
        {
            return $this->embedsMany('Network');
        }
        
        public function hostnames()
        {
            return $this->embedsMany('Hostname');
        }

}