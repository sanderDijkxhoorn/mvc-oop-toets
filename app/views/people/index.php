<?php echo $data["title"]; ?>

<table>
  <thead>
    <th>id</th>
    <th>MyName</th>
    <th>Networth</th>
    <th>Age</th>
    <th>Company</th>
    <th>delete</th>
  </thead>
  <tbody>
    <?= $data['people'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">terug</a>