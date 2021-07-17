<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 850px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Tasks Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Task</a>
                    </div>
                    <?php
                    // Include config file
                    //Source: https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php
                    require_once('../controller/db.php');
                    try {
                        $writeDB = DB::connectWriteDB();
                        $readDB = DB::connectReadDB();
                    }
                    catch(PDOException $ex) {
                        // log connection error for troubleshooting and return a json error response
                        error_log("Connection Error: ".$ex, 0);
                        echo "Unable to connect DB  ";
                        exit;
                      }
                    
                    // Attempt select query execution
                    $query = $readDB->prepare('SELECT id, title, description, DATE_FORMAT(deadline, "%d/%m/%Y %H:%i") as deadline, completed from tbltasks ORDER by id');
                    $query->bindParam(':taskid', $taskid, PDO::PARAM_INT);
                    $query->execute();
                    
                    // get row count
                    $rowCount = $query->rowCount();
                    
                    // If empty records
                    if($rowCount === 0) {
                        // set up response for unsuccessful return
                        echo "<p class='lead'><em>No records were found.</em></p>";
                        exit;
                    }

                    //if got record              
                        //HEADINGS 
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>TITLE</th>";
                            echo "<th>DESCRIPTION</th>";
                            echo "<th>DEADLINE</th>";
                            echo "<th>COMPLETED</th>";
                            echo "<th>ACTIONS</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['deadline'] . "</td>";
                        echo "<td>" . $row['completed'] . "</td>";
                        echo "<td>";
                        echo "<a href='read.php?id=". $row['id'] ."' title='View Task' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                        echo "<a href='update.php?id=". $row['id'] ."' title='Update Task' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                        echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Task' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                        echo "</td>";
                      }
                        echo "</tbody>";
                        echo "</table>";

                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>