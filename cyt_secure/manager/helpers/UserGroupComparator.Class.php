<?php
class UserGroupComparator implements IItemComparator{
	
	function equals( $oObjeto1, $oObjeto2){
		return ($oObjeto1->getUserGroup()->getCd_usergroup() == $oObjeto2->getUserGroup()->getCd_usergroup());
	
	}
	
}