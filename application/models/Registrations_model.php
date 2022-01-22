<?php

/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 11/3/2019
 * Time: 2:31 PM
 */
class Registrations_model extends MY_Model
{
	public $_table = 'registrations';
	public $primary_key = 'user_id';
	//public $soft_delete = TRUE;

	public $translate_to = [
		'service' => ['model' => 'Services_trans_model',
			'primary_key_fild' => 'service_id_fk',
			"primary_key" => 'service_id',
			"language_fild" => "lang"],
		'specialty' => ['model' => 'Specialties_trans_model',
			'primary_key_fild' => 'specialty_id',
			"primary_key" => 'specialty_id',
			"language_fild" => "lang"],
		'area' => ['model' => 'Areas_trans_model',
			'primary_key_fild' => 'area_id',
			"primary_key" => 'area_id',
			"language_fild" => "lang"],
	];

	public $belongs_to = [
		'service_data' => ['model' => 'Services_model', "primary_key" => 'service_id'],
		'specialty' => ['model' => 'Specialties_model', "primary_key" => 'specialty_id']
	];


	// public $has_many = ['subs' => array( 'model' => 'News_images_model','primary_key' => 'main_id' )];

	public $before_create = array('timestamps_in');
	public $before_update = array('timestamps_up');
	public $after_get = array('calculate_rating');

	protected function timestamps_in($row)
	{
		$row['created_at'] = $row['updated_at'] = time();
		return $row;
	}

	protected function timestamps_up($row)
	{
		$row['updated_at'] = time();
		return $row;
	}

	protected function calculate_rating($row)
	{
		if ($this->return_type == "array") {
			if (isset($row['rating_num_count']) && isset($row['rating_person_count'])) {
				if ($row['rating_person_count'] != 0) {
					$row['user_rating'] = (double)($row['rating_num_count'] / $row['rating_person_count']);
				} else {
					$row['user_rating'] = 0;
				}
				unset($row['rating_num_count']);
				unset($row['rating_person_count']);
			}
		} else {
			if (isset($row->rating_num_count) && isset($row->rating_person_count)) {
				if ($row->rating_person_count != 0) {
					$row->user_rating = (double)($row->rating_num_count / $row->rating_person_count);
				} else {
					$row->user_rating = 0;
				}
				unset($row->rating_num_count);
				unset($row->rating_person_count);
			}
		}
		return $row;
	}


} // END CLASS


?>
