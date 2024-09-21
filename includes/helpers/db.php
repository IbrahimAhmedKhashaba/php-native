<?php

/**
* Insert Data In Database
* @param string $table
* @param array $data
* @return array as assoc
*/
if(!function_exists('db_create')){
    function db_create(string $table,array $data):mixed{
        $sql = "INSERT INTO ".$table;
        $columns = '';
        $rows = '';
        foreach($data as $key=>$value){
            $columns .= $key.",";
            $rows .= " '".$value."',";
        }
        $columns = rtrim($columns , ",");
        $rows = rtrim($rows , ",");
        $sql .= " (".$columns.") VALUES (".$rows.")";
        mysqli_query($GLOBALS['connect'],$sql);
        $id = mysqli_insert_id($GLOBALS['connect']);
        $last = mysqli_query($GLOBALS['connect'] , "SELECT * FROM ".$table." where id= ".$id);
        $data = mysqli_fetch_assoc($last);
        return $data;
    }
}

/**
* Updating Data In Database
* @param string $table
* @param array $data
* @param int $id
* @return array as assoc
*/
if(!function_exists('db_update')){
    function db_update(string $table, array $data , int $id){
        $sql = "Update ".$table." SET";
        $columns = '';
        foreach($data as $key=>$value){
            $columns .= " ".$key."="."'$value' , ";
        }
        $columns = rtrim($columns , ", ");
        $sql = $sql." ".$columns ." WHERE id = $id";
        echo $sql;
        mysqli_query($GLOBALS['connect'],$sql);
        $last = mysqli_query($GLOBALS['connect'] , "SELECT * FROM ".$table." where id= ".$id);
        $data = mysqli_fetch_assoc($last);
        return $data;
    }
}

/**
* Deleting Data From Database
* @param string $table
* @param int $id
* @return bool
*/
if(!function_exists('db_delete')){
    function db_delete(string $table , int $id):mixed{
        $query = mysqli_query($GLOBALS['connect'] , "DELETE FROM ".$table." WHERE id=".$id);
        return $query;
    }
}

/**
* Finding Data In Database
* @param string $table
* @param int $id
* @return array as assoc
*/
if(!function_exists('db_find')){
    function db_find(string $table , int $id):mixed{
        $query = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'] , "SELECT * FROM ".$table." WHERE id=".$id));
        return $query;
    }
}

/**
* Search For Single Data In Database
* @param string $table
* @param int $id
* @return array as assoc
*/
if(!function_exists('db_first')){
    function db_first(string $table , string $sql):mixed{
        $query = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'] , "SELECT * FROM ".$table." ".$sql));
        return $query;
    }
}

/**
* Search For Multiple Data In Database
* @param string $table
* @param array $data
* @return array as assoc
*/
if(!function_exists('db_get')){
    function db_get(string $table , array $data):mixed{
        $sql = "SELECT * FROM ".$table." Where";
        $columns = '';
        foreach($data as $key=>$value){
            $columns .= " ".$key."="."'$value' or ";
        }
        $columns = rtrim($columns , "or ");
        $sql .= $columns;
        $data = mysqli_fetch_all(mysqli_query($GLOBALS['connect'] , $sql));
        return $data;
    }
}