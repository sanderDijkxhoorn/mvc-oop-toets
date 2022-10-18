<?php
class People extends Controller
{

  public function __construct()
  {
    $this->personModel = $this->model('Person');
  }

  public function index()
  {
    $people = $this->personModel->getPeople();

    // Maak de inhoud voor de tbody in de view
    $rows = '';
    foreach ($people as $value) {
      $rows .= "<tr>
                  <td>$value->id</td>
                  <td>" . htmlentities($value->MyName, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . number_format($value->Networth, 0, ',', '.') . "</td>
                  <td>" . htmlentities($value->Age, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td>" . htmlentities($value->Company, ENT_QUOTES, 'ISO-8859-1') . "</td>
                  <td><a href='" . URLROOT . "/people/delete/$value->id'>delete</a></td>
                </tr>";
    }

    $data = [
      'title' => '<h1>RichestPeople</h1>',
      'people' => $rows
    ];
    $this->view('people/index', $data);
  }

  public function delete($id)
  {
    $this->personModel->deletePerson($id);

    $data = ['deleteStatus' => "De persoon met id $id is verwijderd"];

    $this->view('people/delete', $data);

    header('Refresh: 2; URL=' . URLROOT . '/people/index');
  }
}
