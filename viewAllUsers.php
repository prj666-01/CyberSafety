<?php
  require './includes/header.php';
?>
</head>
<?php
  require './includes/nav.php';
  require './includes/Request.php';

  $request = new Request;
  $var = $request->getAll('users');
?>
<body>
  <h1>View All Users</h1>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Username</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Last Logged In</th>
          <th>Date Joined</th>
          <th>Approved</th>
          <th>Badge</th>
        </tr>
      </thead>
      <?php
        foreach($var as $item) {
      ?>
      <tbody>
        <tr>
          <td><?php print_r($item['userId']) ?></td>
          <td><?php print_r($item['username']) ?></td>
          <td><?php print_r($item['firstName']) ?></td>
          <td><?php print_r($item['lastName']) ?></td>
          <td><?php print_r($item['email']) ?></td>
          <td><?php print_r($item['lastLogin']) ?></td>
          <td><?php print_r($item['dateJoined']) ?></td>
          <td><?php print_r($item['approved']) ?></td>
          <td><?php print_r($item['badge']) ?></td>
        </tr>
      </tbody>
      <?php
      // Ends the foreach
        }
      ?>
    </table>
  </div>
<?php
  require './includes/footer.php';
?>
