<?php
  require './includes/header.php';
?>
</head>
<?php
  require './includes/nav.php';
  require './colinCRequest.php';
?>
<body>
  <h1>View All Courses By User ID</h1>

  <form name="form" action="" method="get">
    <input type="text" name="userInput" id="userInput">
    <input type="submit" name="submit" value="send"></input>
  </form>

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
      $i = 0;
      if($i == 0)
      {
        $request = new Request;
        $var = $request->getAllCoursesByUser('coursesByUser', 1);
        foreach($var as $item)
        {
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
      }
      ?>
    </table>
  </div>
<?php
  require './includes/footer.php';
?>
