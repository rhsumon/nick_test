<?php
use Jenssegers\Mongodb\Model as Eloquent;
/**
 * Class for Hostname Model
 * 
 * 
 */
class Hostname extends Eloquent
{
        /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $collection = 'hostnames';
}
