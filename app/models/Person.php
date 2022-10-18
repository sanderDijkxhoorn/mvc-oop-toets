<?php
class Person
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getPeople()
  {
    $this->db->query("SELECT * FROM `RichestPeople` ORDER BY `RichestPeople`.`Networth` ASC;");
    $result = $this->db->resultSet();

    return $result;
  }

  public function getSinglePerson($id)
  {
    $this->db->query("SELECT * FROM `RichestPeople` WHERE `id` = :id;");
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->single();
  }

  public function deletePerson($id)
  {
    $this->db->query("DELETE FROM `RichestPeople` WHERE `id` = :id;");
    $this->db->bind(':id', $id, PDO::PARAM_INT);

    return $this->db->execute();
  }
}
