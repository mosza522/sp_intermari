<?php

namespace App\Models;

use Cache;
use Config;
use Session;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table		= 'ck_menu';
    protected $primaryKey	= 'id';

    public function setMenu($path)
	{

		$setMenu = array();
		$txtMenu = '
					<li'.(($path=='admin')?' class="active"':'').'><a href="'.asset(Config::get('app.admin_path')).'/">
						<i class="fa fa-home"></i> <span>Dashboard</span></a>
					</li>';
		$pid = array();
		$row = Cache::remember('Menu', 0, function() {
			$sGroup	= \Auth::user()->emp_group;
			if( empty(\Auth::user()->emp_auth_authen) ){
				$Menu = Menu::select(['id','pid','menu_name','menu_link','menu_icon','menu_sort'])->where('menu_active', '<>', 'N')->orderBy('menu_sort', 'asc');
			}else{
				$sAuthen 	= explode(',', \Auth::user()->emp_auth_authen);
				$Menu 		= Menu::select(['id','pid','menu_name','menu_link','menu_icon','menu_sort'])->where('menu_active', '<>', 'N')->whereIn('id', $sAuthen)->orderBy('menu_sort', 'asc');
			}
			return $Menu->get();
		});
		if( $row ){
			foreach( $row AS $r ){
				if( Session::get('UserGroup') > 2 ){
					$r->pid = 0;
				}
				if( !isset($setMenu[$r->pid][$r->id]) )
				{
					$setMenu[$r->pid][$r->menu_sort] = (object) [];
					$setMenu[$r->pid][$r->menu_sort]->id 		= $r->id;
					$setMenu[$r->pid][$r->menu_sort]->name 		= $r->menu_name;
					$setMenu[$r->pid][$r->menu_sort]->link 		= $r->menu_link;
					$setMenu[$r->pid][$r->menu_sort]->icon 		= $r->menu_icon;
					$setMenu[$r->pid][$r->menu_sort]->active 	= substr_count($path, (empty($r->menu_link)?'1':$r->menu_link)) > 0?'Y':'N';
				}
			}
		}


		if( $setMenu[0] ){
			/**
			 *---------------------------------------------------------------------------------------------------------------------------------------------------------
			 */
			foreach( $setMenu[0] AS $key => $mMenu ){
				$subMenu 	= '';
				$subActive 	= '';
				if( empty($setMenu[$mMenu->id]) ){
					$txtMenu .= '
					<li'.(($mMenu->active=="Y")?' class="active"':'').'><a href="'.asset($mMenu->link).'/"><i class="'.$mMenu->icon.'"></i> <span>'.$mMenu->name.'</span></a></li>';
				}else{
					/**
					 *---------------------------------------------------------------------------------------------------------------------------------------------------------
					 */
					foreach( $setMenu[$mMenu->id] AS $sMenu ){
						if( empty($setMenu[$sMenu->id]) ){
							$subMenu .= '
								<li'.(($sMenu->active=="Y")?' class="active"':'').'><a href="'.asset($sMenu->link).'/">'.$sMenu->name.'</a></li>';
							if( $sMenu->active=="Y" ) $subActive = ' active';
						}else{
							/**
							 *---------------------------------------------------------------------------------------------------------------------------------------------------------
							 */
							$subMenu2 	= '';
							$subActive2	= '';
							foreach( $setMenu[$sMenu->id] AS $sMenu2 ){
								if( empty($setMenu[$sMenu2->id]) ){
									$subMenu2 .= '
										<li'.(($sMenu2->active=="Y")?' class="active"':'').'><a href="'.asset($sMenu2->link).'/">'.$sMenu2->name.'</a></li>';
									if( $sMenu2->active=="Y" ){
										$subActive = ' active';
										$subActive2 = ' active';
									}
								}else{
									/**
									 *---------------------------------------------------------------------------------------------------------------------------------------------------------
									 */
									$subMenu3 	= '';
									$subActive3	= '';
									foreach( $setMenu[$sMenu2->id] AS $sMenu3 ){
										$subMenu3 .= '
											<li'.(($sMenu3->active=="Y")?' class="active"':'').'><a href="'.asset($sMenu3->link).'/">'.$sMenu3->name.'</a></li>';
										if( $sMenu3->active=="Y" ){
											$subActive = ' active';
											$subActive2 = ' active';
											$subActive3 = ' active';
										}
									}

									$subMenu2 .= '
									<li class="has-sub'.$subActive3.'">
										<a href="javascript:;">
											<b class="caret pull-right"></b>
											<span>'.$sMenu2->name.'</span>
										</a>
										<ul class="sub-menu">'.$subMenu3.'
										</ul>
									</li>
									';
								}
							}

							$subMenu .= '
							<li class="has-sub'.$subActive2.'">
								<a href="javascript:;">
									<b class="caret pull-right"></b>
									<span>'.$sMenu->name.'</span>
								</a>
								<ul class="sub-menu">'.$subMenu2.'
								</ul>
							</li>
							';
						}
					}

					$txtMenu .= '
					<li class="has-sub'.$subActive.'">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
							<i class="'.$mMenu->icon.'"></i>
						    <span>'.$mMenu->name.'</span>
						</a>
						<ul class="sub-menu">'.$subMenu.'
						</ul>
					</li>
					';
				}
			}
		}

		return $txtMenu;
	}
}
