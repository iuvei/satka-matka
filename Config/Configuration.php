<?php

class Configuration
{

  public $conn;
  public $apikeyauthconsent = "AIzaSyDvNAqBSoNZbm6msvhz20sr6uoI7h73S2o";
  public $clientid = "1086193827988-o0pcar678li9fn9lufb35ane3qb7en1v.apps.googleusercontent.com";
  public $client_secret = "MbFllpafRM2vMNbnwd8cYuPZ";

  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  /*
    create_relate ="creation/relation"
    operation="change/drop" add :drop before table name  to drop table or add : newname to rename after table
    to drop the column set drop: before column and change operation =drop
   */

  function tablesdata()
  {
    $tables = array(
      // "user" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:20:default 'NA'", "last_name" => "varchar:50", "contact" => "varchar:11:unique", "userid" => "varchar:100:unique NOT NULL default 'NA'", "email" => "varchar:50:unique NOT NULL default 'NA'", "password" => "text", "api_key" => "text", "role" => "varchar:50", "created_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP", "updated_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP", "image" => "varchar:100", "about" => "varchar:200", "blocked" => "int:1:default 0"),
      // "incentives" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "criteria_type" => "varchar:50:default 'NA'", "min_criteria" => "float", "max_criteria" => "float", "incentive_type" => "varchar:50", "incentive_value" => "varchar:50", "description" => "varchar:255"),
      // "userbankdetail" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:20:default 'NA'", "ifsccode" => "varchar:20:unique", "bankname" => "varchar:100:unique NOT NULL default 'NA'", "accountnumber" => "int:50:unique NOT NULL default 'NA'", "state" => "varchar:50", "city" => "varchar:50", "address" => "varchar:50", "mobile" => "varchar:50", "email" => "varchar:100", "upiaccount" => "int:30","account_no"=>"varchar:50"),
      // "useraddress" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:20:default 'NA'", "mobile" => "varchar:20", "pincode" => "varchar:20", "state" => "varchar:20", "city" => "varchar:50", "address" => "varchar:50"),
      // "complaints" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "type" => "varchar:20:default 'NA'", "whatsapp" => "varchar:100", "description" => "varchar:200"),
      // "game_types" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:20"),
      // "game_colors" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:20"),
      // "game_numbers" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "varchar:20"),
      // "game_rules" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT","numbers" => "varchar:100", "profit" => "float"),
      // "notifications" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "name" => "text"),
      // "number_game_rules" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "profit" => "float"),
      // "wallet_transactions" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT", "amount" => "float", "txn_type" => "varchar:50", "description" => "varchar:250", "created_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP","updated_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",),
      "periods" => array("id" => "int:11: PRIMARY KEY AUTO_INCREMENT","period" => "int:11: AUTO_INCREMENT", "price" => "float", "nuumber" => "int:11", "result" => "varchar:250", "created_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP","updated_at" => "timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP",),
      

    );
    return $tables;
  }

  /*
    To create the relation
   * (parenttable:primary_key_id(optional)=>childtable:ondelete:onupdate:foreign_key_column_name(optional))
    To drop foreign key without droping foreign key column  put drop: before child table
   * (parenttable:primary_key_id(optional)=>drop:childtable:ondelete:onupdate:foreign_key_column_name(optional))
    To drop foreign key with droping foreign key column  put dropcol: before child table
   * (parenttable:primary_key_id(optional)=>dropcol:childtable:ondelete:onupdate:foreign_key_column_name(optional))
   */

  function tableRelation()
  {
    $rtable = array(

      // "user" => "userbankdetail:cascade:cascade",
      // "user" => "useraddress:cascade:cascade",
      // "user" => "complaints:cascade:cascade",
      // "user" => "userbankdetail:cascade:cascade",
      // "game_colors" => "game_rules:cascade:cascade",
      "user" => "wallet_transactions:cascade:cascade",
      
    );
    return $rtable;
  }

  function configure($create_relate = "creation", $operation = "change")
  {
    $info2 = array();
    $db = new DB($this->conn);
    ini_set('max_execution_time', 300);
    if ($create_relate == "creation") {
      $info = $db->loadTables($this->tablesdata(), $operation);
      array_push($info2, $info);
      array_push($info2, $this->tablesdata());
    } else if ($create_relate == "relation") {
      $info = $db->relateTable($this->tableRelation());
      array_push($info2, $info);
      array_push($info2, $this->tableRelation());
    }
    return $info2;
  }

  function loadPages()
  {
  }
}
