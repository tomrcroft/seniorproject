<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    $by_age = $_GET['age'];
    $by_sex = $_GET['gender'];
    $by_fee = $_GET['fee'];
    $by_group = $_GET['group'];

    $query = "SELECT * FROM donar";
    $conditions = array();

    if($by_age !="") {
      $conditions[] = "Adult_or_Child='$by_age'";
    }
    if($by_sex !="") {
      $conditions[] = "Costume_Gender='$by_sex'";
    }
    if($by_fee !="") {
      $conditions[] = "Rental_Fee='$by_fee'";
    }
    if($by_group !="") {
      $conditions[] = "e_level='$by_group'";
    }

    $sql = $query;
    if (count($conditions) > 0) {
      $sql .= " WHERE " . implode(' AND ', $conditions);
    }

?>
