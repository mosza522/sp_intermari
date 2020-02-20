<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InitModel extends Model
{
    use SoftDeletes;
    public function newQuery($excludeDeleted = true)
    {
		if( request('withTrashed') == 'true' ){
			return parent::newQuery()->withTrashed();
		}else if( request('onlyTrashed') == 'true' ){
			return parent::newQuery()->onlyTrashed();
		}else{
			return parent::newQuery();
		}
    }
	
    public static function boot()
    {
        parent::boot();

        static::creating(function($sData)
        {
			$sData->created_by	= \Auth::user()->id;
			$sData->created_at	= \Carbon\Carbon::now();
        });

        static::updating(function($sData)
        {
			//$sData->updated_by	= \Auth::user()->id;
			//$sData->updated_at	= \Carbon\Carbon::now();
        });
		
        static::saving(function($sData)
        {
			$sData->updated_by	= \Auth::user()->id;
			$sData->updated_at	= \Carbon\Carbon::now();
        });

        static::deleting(function($sData)
        {
			//$sData->updated_by	= \Auth::user()->id;
			//$sData->updated_at	= \Carbon\Carbon::now();
        });

        static::restoring(function($sData)
        {
			//$sData->updated_by	= \Auth::user()->id;
			//$sData->updated_at	= \Carbon\Carbon::now();
        });
    }
}
