<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = 'ck_alert';
    public static function Msg($sMode = 'success', $sCode = NULL )
	{
		$sAction	= ctype_alnum($sCode)?$sCode:NULL;
		$sMode 		= ucfirst($sMode);
		if( !empty($sCode) && !ctype_alnum($sCode) ) return array('status'=>$sMode, 'msg'=>$sCode);
		list($sController, $sMethod) = explode('@', str_replace('App\Http\Controllers\\', '', \Route::getCurrentRoute()->getActionName()));
		$sRow = Alert::select(['id', 'sMessages'])
				->where('sController', $sController)
				->where('sMethod', $sMethod)
				->where('sAction', $sAction)
				->where('sMode', $sMode)
				->first();
				
		if( !$sRow ){
			$sData 					= new Alert;
			$sData->sMode			= $sMode;
			$sData->sController		= $sController;
			$sData->sMethod			= $sMethod;
			$sData->sAction			= $sAction;
			$sData->sMessages		= '';
			$sData->created_at		= \Carbon\Carbon::now();
			$sData->updated_at		= \Carbon\Carbon::now();
			$sData->save();
			return array(
				'status'=>$sMode,
				'msg' =>'
				<b>Controller : </b> '.$sController.'<br/>
				<b>Method : </b> '.$sMethod.'<br/>
				'.(empty($sAction)?'':'<b>Action : </b> '.$sAction.'<br/>').'
				<b>Status : </b> '.$sMode.'<br/>
				<b>หมายเหตุ : </b>รอกำหนดข้อความแจ้งเตือนการทำงาน'
			);
		}else{
			if( $sRow->sMessages ){
				return array('status'=>$sMode, 'msg'=>$sRow->sMessages);
			}else{
				return array(
					'status'=>$sMode,
					'msg' =>'
					<b>Controller : </b> '.$sController.'<br/>
					<b>Method : </b> '.$sMethod.'<br/>
					'.(empty($sAction)?'':'<b>Action : </b> '.$sAction.'<br/>').'
					<b>Status : </b> '.$sMode.'<br/>
					<b>หมายเหตุ : </b>รอกำหนดข้อความแจ้งเตือนการทำงาน'
				);
			}
		}
	}
}
