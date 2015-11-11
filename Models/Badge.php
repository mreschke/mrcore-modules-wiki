<?php namespace Mrcore\Wiki\Models;

use Mrcore\Foundation\Support\Cache;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'badges';

	/**
	 * This table does not use automatic timestamps
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * A badge belongs to many posts
	 * ex: $badge->posts;
	 * @return mixed
	 */
	public function posts()
	{
		return $this->belongsToMany('Mrcore\Wiki\Models\Post', 'post_badges');
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
		#for some reason this was getting a partial query without images ??
		#return Cache::remember(strtolower(get_class()).":all", function() use($columns) {
			return static::orderBy('name')->get($columns);
		#});
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
