<?php
include "db.php";

// insert into database 
if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    $sql="insert into user (name,title,description)values ('$name','$title','$description')";
    $result=mysqli_query($con,$sql);

    if(!$result){
        echo"data inserted successfull!!!";
    }
}
// fetching 
$sql="select * from user";
$result=mysqli_query($con,$sql);




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
                    <h4 class="text-success text-bold">Post</h4>
                    <hr>
                <div class="conatiner mb-3">
                    <label for="">Name</label>
                    <input type="text"name="name"class="form-control"placeholder="Enter your name"/>
                </div>
                <div class="conatiner mb-3">
                    <label for="">Title</label>
                    <input type="text"name="title"class="form-control"placeholder="Enter your title"/>
                </div>
                <div class="conatiner mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="4" rows="4"class="form-control"></textarea>
                </div>
                <button type="submit"name="submit"class="form-control btn btn-primary">Submit</button>
            </div>
            </form>
            <div class="col-md-5">
                <table class="table-hover">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $count=1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$count}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['title']}</td>";
                            echo "<td>{$row['description']}</td>";
                            echo "<td><a href='edit.php?id={$row['id']}'class='btn btn-sm btn-success'>Edit</a> 
                            <a href='delete.php?id={$row['id']}'class='btn btn-sm btn-danger'>Delete</a></td>";
                            echo "</tr>";
                            $count++;
                        }
                        ?>
                
                                                
        
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</body>
</html>