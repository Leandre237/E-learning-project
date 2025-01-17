<!-- Start Include Admin Dashboard Header -->
<?php
// Locking Admin file 
if(!isset($_SESSION)){
    session_start();
}

include('./admininclude/header.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];

}else{
    echo "<script> location.href='../index.php'; </script>";
}
?>
<!-- End Include Admin Dashboard Header -->

<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()){
           echo '<tr>';
           echo '<th scope="row">'.$row['stu_id'].'</th>';
           echo '<td>'.$row['stu_name'].'</td>';
           echo '<td>'.$row['stu_email'].'</td>';
           echo '<td>';
           echo '
           
           <form action="editstudent.php" method="post" class="d-inline">
            <input type="hidden" name="id" value='.$row["stu_id"].'>
                <button type="submit" class="btn btn-info mr-3" name="view"       value="View">
                <i class="fas fa-pen"></i>
                </button>
           </form>
            
            <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["stu_id"].'>
                <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                <i class="fas fa-trash-alt"></i>
                </button>
            </form>
                </td>
             </tr>';
            }?>
        </tbody>
    </table>
    <?php } else {
        echo "0 Result";
    }

// deleting Data from courses table
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    }else {
        echo "Unable to Delete Data";
    }
}


        ?>
</div>
</div> <!-- div Row Close from header -->



<div>
    <a class="btn btn-danger box" href="./addnewstudent.php">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div>  <!-- div container-fluid close from header -->


<!-- Start Include Admin Dashboard Footer -->
<?php
include('./admininclude/footer.php');
?>
<!-- End Include Admin Dashboard Footer -->