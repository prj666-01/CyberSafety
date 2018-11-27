<?php
  require './includes/header.php';
?>
</head>
<?php
  require './includes/nav.php';
  require './colinCRequest.php';

  $request = new Request;
  $var = $request->getAllApproved('courses');
?>
<body>
  <h1>View All Approved Courses</h1>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Course Title</th>
          <th>Description</th>
          <th>Author</th>
          <th>Date Created</th>
          <th>Last Updated</th>
          <th>Teaching Level</th>
          <th>Approved</th>
          <th>Course Status</th>
        </tr>
      </thead>
      <?php
        foreach($var as $item) {
      ?>
      <tbody>
        <tr>
          <td><?php print_r($item['courseTitle']) ?></td>
          <td><?php print_r($item['courseDescription']) ?></td>
          <td>This User First + Last Name</td>
          <td><?php print_r($item['dateCreated']) ?></td>
          <td><?php print_r($item['dateLastUpdated']) ?></td>
          <td><?php print_r($item['courseTeachingLevel']) ?></td>
          <td><?php print_r($item['approved']) ?></td>
          <td><?php print_r($item['courseStatus']) ?></td>
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
