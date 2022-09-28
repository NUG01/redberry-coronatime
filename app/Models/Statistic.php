<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasFactory;

	use HasTranslations;

	public $translatable = ['name'];

	protected $guarded = ['id'];

	public function scopeFilter($query)
	{
		if (request('search'))
		{
			$query
			->where('country', 'LIKE', '%' . request('search') . '%')
			->get();
		}
	}
}
