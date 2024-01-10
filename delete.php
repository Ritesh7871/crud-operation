<?php
include "db.php";
$id = $name = $title = $description = "";
// insert into database 
if (isset($_POST['delete'])){
    // print_r($_POST);
    // die();
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    $sql="Delete from user where id =$id ";
    $result=mysqli_query($con,$sql);

    if($result){
            echo "<script>
                    alert('Data Deleted successfully!');
                    window.location.href = 'index.php';
                  </script>";
        exit();
    }else{
       
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the data based on the ID
    $fetch_sql = "SELECT * FROM user WHERE id='$id'";
    $fetch_result = mysqli_query($con, $fetch_sql);

    if ($fetch_result) {
        $row = mysqli_fetch_assoc($fetch_result);
        $name = $row['name'];
        $title = $row['title'];
        $description = $row['description'];
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }
}
// fetching 
// $sql="select * from user";
// $result=mysqli_query($con,$sql);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4 mt-5">
                <form action="" method="post">
                    <h4 class="text-danger text-bold">Delete Post</h4>
                    <hr>
                <div class="conatiner mb-3">
                    <input type="hidden"name="id"value="<?php echo $id; ?>"/>
                    <label for="">Name</label>
                    <input type="text"name="name"class="form-control"placeholder="Enter your name"value="<?php echo $name; ?>"/>
                </div>
                <div class="conatiner mb-3">
                    <label for="">Title</label>
                    <input type="text"name="title"class="form-control"placeholder="Enter your title" value="<?php echo $title ;?>"/>
                </div>
                <div class="conatiner mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="4" rows="4"class="form-control"><?php echo $description; ?></textarea>
                </div>
                <button type="submit"name="delete"class="form-control btn btn-primary">Delete</button>
            </div>
            </form>
            <div class="col-md-5">
              
            </div>
        </div>
    </div>
</body>
</html>