<?php namespace Mrcore\Wiki\Models;

use Mrcore\Foundation\Support\Cache;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'types';

	/**
	 * This table does not use automatic timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * A type has many posts
	 * ex: $type->posts->all();
	 * @return mixed
	 */
	public function posts()
	{
		return $this->hasMany('Mrcore\Wiki\Models\Post');
	}	

	/**
	 * Find a model by its primary key.  Mrcore cacheable eloquent override.
	 *
	 * @param  mixed  $id
	 * @param  array  $columns
	 * @return \Illuminate\Database\Eloquent\Model|static|null
	 */
	public static function find($id, $columns = array('*'))
	{
		return Cache::remember(strtolower(get_class()).":$id", function() use($id, $columns) {
			return static::query()->find($id, $columns);
		});		
	}

	/**
	 * Get all of the models from the database.
	 *
	 * @param  array  $columns
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public static function all($columns = array('*'))
	{
		return Cache::remember(strtolower(get_class()).":all", function() use($columns) {
			return static::orderBy('constant')->get($columns);
		});
	}

	/*
	 * Clear all cache
	 *
	 */
	public static function forgetCache($id = null)
	{
		Cache::forget(strtolower(get_class()).':all');
		if (isset($id)) Cache::forget(strtolower(get_class()).":$id");
	}

}