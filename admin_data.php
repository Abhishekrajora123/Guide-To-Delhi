<?php
include "data_fetch.php";
 ?>
<table class="table table-hover table-sm table-responsive">
  <h3 class="text-center"><?php echo $_GET['table']; ?></h3>
  <form  method="POST" enctype="multipart/form-data" action="admin_data.php?type=<?php echo $_GET['type']; ?>&msg=run&val=n&table=<?php echo $_GET['table']; ?>">
    <input type="text"  name="n" placeholder="Search Name"/><br><br>
    <input type="submit"  name="submit" value="Submit"/>
  </form>
  <?php if ($flag == 1 && $table == 'admin'): ?>
  <thead>
    <tr>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <?php while($row = $val->fetch_assoc()){?>
  <tbody>
    <tr>
      <th><a href="update.php?type=<?php echo $_GET['type']; ?>&msg=run&table=<?php echo $_GET['table']; ?>&id=<?php echo $row['id']; ?>">edit</a>
      </th>
      <th><a href="delete.php?type=<?php echo $_GET['type']; ?>&msg=run&table=<?php echo $_GET['table']; ?>&id=<?php echo $row['id']; ?>">delete</a>
      </th>
      <th><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['password']; ?></td>
    </tr>
  </tbody>
<?php } else:?>
  <thead>
    <tr>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <?php if ($table != 'clubs_pubs'): ?>
      <th scope="col">Type</th>
      <?php endif; ?>
      <th scope="col">Map Link</th>
      <th scope="col">Description</th>
      <th scope="col">Image Name</th>

    </tr>
  </thead>
  <?php if ($flag == 1): while($row = $val->fetch_assoc()){?>
  <tbody>
    <tr>
      <th><a href="update.php?type=<?php echo $_GET['type']; ?>&msg=run&table=<?php echo $_GET['table']; ?>&id=<?php echo $row['id']; ?>">edit</a>
      </th>
      <th><a href="delete.php?type=<?php echo $_GET['type']; ?>&msg=run&table=<?php echo $_GET['table']; ?>&id=<?php echo $row['id']; ?>">delete</a>
      </th>
      <th><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <?php if ($table != 'clubs_pubs'):?>
      <td><?php echo $row['type'];?> </td>
    <?php endif; ?>
      <td><?php echo $row['map_link']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td><?php echo $row['image_name']; ?></td>

    </tr>
  </tbody>
<?php } endif; endif;?>
</table>

<?php include "footer.php"; ?>
