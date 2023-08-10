<?php

/**
 * Helper DAO para administrar en sesión los perfiles de un 
 * usuario.
 *  
 * @author Marcos
 * @since 11-11-2013
 */
class UserUserGroupSessionDAO extends EntityDAO {

	public function getFieldsToAdd($entity){}
	
	public function getFieldsToUpdate($entity){}
	
	public function getId($entity){}
		
	public function getIdFieldName(){}
	
	public function setId($entity, $id){}
	
	public function getTableName(){}
	
	public function getEntityFactory(){}
	
	public function getVariableSessionName(){
		return "user_usergroups";
	}
	
    /**
     * se persiste la nueva entity
     * @param $entity entity a persistir.
     */
    public function addEntity( $entity, $idConn=0 ) {
    	
    	$registros = unserialize( $_SESSION[ $this->getVariableSessionName() ] );
    	
    	if( empty($registros) )
    		$registros = new ItemCollection();
    	if (!$registros->existObjectComparator($entity, new UserGroupComparator())) {	
        	$registros->addItem($entity);
    	}
        
        $_SESSION[$this->getVariableSessionName()] = serialize($registros);
        
    }
    
    /**
     */
    public function setEntities( $entities, $idConn=0 ) {
    	
        $_SESSION[$this->getVariableSessionName()] = serialize($entities);
        
    }
    
    /**
     * se modifica la entity
     * @param $entity entity a modificar.
     */
    public function updateEntity($entity, $idConn=0) {
        //TODO
    }

    /**
     * se elimina la entity
     * @param $id identificador de la entity a eliminar.
     */
    public function deleteEntity($oid, $idConn=0) {
    	
    	$oid = urldecode($oid);
    	
    	$registros = unserialize( $_SESSION[$this->getVariableSessionName()] );
    	
    	//el oid representaría el registro??
    	$nuevosRegistros = new ItemCollection();
    	foreach ($registros as $registro) {
    		
    		if( $registro->getUserGroup()->getCd_usergroup() != $oid ){
    			$nuevosRegistros->addItem($registro);
    		}
    	}
    	
        $_SESSION[$this->getVariableSessionName()] = serialize($nuevosRegistros);
    	
    }

    /**
     * quitamos todos los registros de sesión
     */
    public function deleteAll() {
    	unset( $_SESSION[$this->getVariableSessionName()] ) ;
    	
    }
    /**
     * se obtiene una colección de entities dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return ItemCollection
     */
    public function getEntities(CdtSearchCriteria $oCriteria, $idConn=0) {

    	if(isset($_SESSION[$this->getVariableSessionName()]))
			$registros = unserialize( $_SESSION[$this->getVariableSessionName()] );
		else 
			$registros = new ItemCollection();	

		return $registros;
    }

    /**
     * se obtiene la cantidad de entities dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return int
     */
    public function getEntitiesCount(CdtSearchCriteria $oCriteria, $idConn=0) {
        
    	$registros = unserialize($this->getVariableSessionName() );

        return $registros->size();
    }

    /**
     * se obtiene un entity dado el filtro de búsqueda
     * @param CdtSearchCriteria $oCriteria filtro de búsqueda.
     * @return Entity
     */
    public function getEntity(CdtSearchCriteria $oCriteria, $idConn=0) {
		//TODO
    }
	
	public function getEntityById($id) {
		//TODO
    }
		
}
?>