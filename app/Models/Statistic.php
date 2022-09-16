<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Statistic extends Model
{
	use HasFactory,Sortable;
	
	protected $guarded = [];

	public $sortable = ['country',
	'confirmed',
	'recovered',
	'deaths',
'created_at'];

}
