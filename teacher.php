<?php include "inc/header.php"; ?>

<?php 
  spl_autoload_register(function($class){
    include "classes/".$class.".php";
  })
?>

<?php 
  $user = new Teacher();
?>

<!-- Delete Data -->
<?php
  if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    $id = (int)$_GET['id'];
    if($user->delete($id)){
      echo "<span class='delete'> Data Deleted Successfully...</span>";
    }
}
?>

<section class="mainleft">

  <!-- Data Edit / Update -->
  <?php
    if (isset($_POST['update'])){
      $id = $_POST['id'];
      $name = $_POST['name'];
      $dep = $_POST['dep'];
      $age = $_POST['age'];

      $user->SetName($name);
      $user->SetDep($dep);
      $user->SetAge($age);

      if($user->update($id)){
        echo "<span class='insert'> Data Updated Successfully...</span>";
      }

    }
  ?>

  <?php
    if (isset($_GET['action']) && $_GET['action'] == 'edit'){
      $id = (int)$_GET['id'];
      $result = $user->readById($id);
  ?>
  <form action="" method="post">
    <table>
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>"/>
        <tr>
          <td>Name: </td>
          <td><input type="text" name="name" value="<?php echo $result['name']; ?>" required="1"/></td>    
        </tr>

        <tr>
          <td>Department: </td>
          <td><input type="text" name="dep" value="<?php echo $result['dep']; ?>" required="1"/></td>
        </tr>

        <tr>
          <td>Age: </td>
          <td><input type="text" name="age" value="<?php echo $result['age']; ?>" required="1"/></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="update" value="Submit"/>
            <input type="reset" value="Clear"/>
          </td>
        </tr>
      </table>
  </form>
  <?php } else { ?>
  <!-- Data Edit End -->

  <!-- Data Insert -->
  <?php 
    if (isset($_POST['create'])){
      $name = $_POST['name'];
      $dep = $_POST['dep'];
      $age = $_POST['age'];

      $user->SetName($name);
      $user->SetDep($dep);
      $user->SetAge($age);

      if($user->insert()){
        echo "<span class='insert'> Data Inserted Successfully...</span>";
      }

    }
  ?>
  <form action="" method="post">
    <table>
        <tr>
          <td>Name: </td>
          <td><input type="text" name="name" placeholder="Enter name" required="1"/></td>    
        </tr>

        <tr>
          <td>Department: </td>
          <td><input type="text" name="dep" placeholder="Enter department" required="1"/></td>
        </tr>

        <tr>
          <td>Age: </td>
          <td><input type="text" name="age" placeholder="Enter age" required="1"/></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="create" value="Submit"/>
            <input type="reset" value="Clear"/>
          </td>
        </tr>
      </table>
  </form>
  <?php } ?>
  <!-- Data Insert End -->
</section>

<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>

    <?php
      $i=0;
      foreach ($user->readAll() as $key => $value){
        $i++;
    ?>

    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['dep']; ?></td>
        <td><?php echo $value['age']; ?></td>
        <td>
        <?php echo "<a href='teacher.php?action=edit&id=".$value['id']."'>Edit</a>" ?> ||
        <?php echo "<a href='teacher.php?action=delete&id=".$value['id']."' onclick='myFunction()'>Delete</a>" ?>
        </td>
    </tr> 
    <?php  } ?>

  </table>
</section>

<script>
  function myFunction() {
    alert("Are you confirm deleted this data?");
  }
</script>


<?php include "inc/footer.php"; ?>