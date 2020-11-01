<?php

function select_with_join($table, array $join, $fields = null, $where = null, array $orders = null) {
    $sql = "select ";

    if( null == $fields ){
        $sql .= "*";
    } elseif( is_array($fields)){
        foreach ($fields as $field => $alias) {
            $sql .= (is_int($field)) ? "`".$alias."`, " : "`".$field."` as ".$alias.", ";
        }

        $sql = substr($sql, 0, -2);
    } else {
        $sql .= $fields;
    }

    list($join_table, $foreign_key, $primary_key) = $join;

    $sql .= " from `".$table."` join `$join_table` on `".$table."`.`".$foreign_key."` = `".$join_table."`.`".$primary_key."` ";


    if(null != $where) {
        $sql .= " where ".$where;
    }

    if( null != $orders ) {
        $sql .= " order by ";
        foreach ($orders as $field => $order) {
            $sql .= (is_int($field)) ? "`".$order."`, " : "`".$field."` ".$order.", ";
        }

        $sql = substr($sql, 0, -2);
    }

    return $sql;
}

function select($table, $fields = null, $where = null, array $orders = null) {
    $sql = "select ";

    if( null == $fields ){
        $sql .= "*";
    } elseif( is_array($fields)){
        foreach ($fields as $field => $alias) {
            $sql .= (is_int($field)) ? "`".$alias."`, " : "`".$field."` as ".$alias.", ";
        }

        $sql = substr($sql, 0, -2);
    } else {
        $sql .= $fields;
    }

    $sql .= " from `".$table."`";

    if(null != $where) {
        $sql .= " where ".$where;
    }

    if( null != $orders ) {
        $sql .= " order by ";
        foreach ($orders as $field => $order) {
            $sql .= (is_int($field)) ? "`".$order."`, " : "`".$field."` ".$order.", ";
        }

        $sql = substr($sql, 0, -2);
    }

    return $sql;
}

function insert($table, array $values) {
    $sql = "insert into `".$table."` (`".implode("`, `", array_keys($values))."`)".
    " value ('".implode("', '", array_values($values))."')";

    return $sql;
}

function update($table, array $set, $where = null) {
    $sql = "update `".$table."` set ";

    foreach ($set as $field => $value) {
        $sql .= "`".$field."` = '".$value."', ";
    }

    $sql = substr($sql, 0, -2);

    if ($where != null) {
        $sql .= " where ".$where;
    }

    return $sql;
}

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