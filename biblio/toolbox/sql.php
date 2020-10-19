<?php

/**
 * @param string $table nom de la table
 * @param string $where condition format sql (id = %d)
 * @param array $value tableau des valeurs de la condition
 */
function delete($table, $where = null, array $value = []) {

    $sql = "delete from `".$table."`";
    
    if ($where != null) {
        $sql .= sprintf(" where ".$where, ...$value);
    }

    return $sql;
}

/**
 * @param string $table nom de la table
 * @param string $where chaine de caractère avec les conditions "id = 1 and ... or ..."
 * @return string
 */
function _delete($table, $where = null){
    $sql = "delete from `".$table."`";

    if( $where != null ){
        $sql .= " where ".$where;
    }

    return $sql;
}