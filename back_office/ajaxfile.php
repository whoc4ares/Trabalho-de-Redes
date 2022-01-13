
<?php
include 'config.php';

$request = 1;
if(isset($_POST['request'])){
    $request = $_POST['request'];
}

// DataTable data
if($request == 1){
    ## Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

    $searchValue = mysqli_escape_string($con,$_POST['search']['value']); // Search value

    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (name like '%".$searchValue."%' or 
            email like '%".$searchValue."%' or 
            city like'%".$searchValue."%' ) ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($con,"SELECT count(*) as allcount from dados");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = mysqli_query($con,"select count(*) as allcount from dados WHERE 1 ".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "SELECT * from dados WHERE status='0' AND  1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
    $empRecords = mysqli_query($con, $empQuery);
    $data = array();

    while ($row = mysqli_fetch_assoc($empRecords)) {

        // Update Button
        $updateButton = "<button class='btn btn-sm btn-info updateUser' data-id='".$row['id']."' data-toggle='modal' data-target='#updateModal' >Editar</button>";

        // Delete Button
        $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['id']."'>Delete</button>";

        $idk = "<button class='btn btn-sm btn-warning confirmarUser' data-id='".$row['id']."'>Confirmar</button>";


    
        
        $action = $updateButton." ".$deleteButton. " ".$idk;

        $data[] = array(
                "name" => $row['name'],
                "email" => $row['email'],
                "tipo" => $row['tipo'],
                "raca" => $row['raca'],
                "genero" => $row['genero'],
                "city" => $row['city'],
                "action" => $action
            );
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}


// Fetch user details
if($request == 2){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($con,$_POST['id']);
        
    }

    $record = mysqli_query($con,"SELECT * FROM dados WHERE id=".$id);

    $response = array();

    if(mysqli_num_rows($record) > 0){
        $row = mysqli_fetch_assoc($record);
        $response = array(
            "name" => $row['name'],
            "email" => $row['email'],
            "tipo" => $row['tipo'],
            "raca" => $row['raca'],
            "genero" => $row['genero'],
            "city" => $row['city'],
        );

        echo json_encode( array("status" => 1,"data" => $response) );
        exit;
    }else{
        echo json_encode( array("status" => 0) );
        exit;
    }
}

// Update user
if($request == 3){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($con,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($con,"SELECT id FROM dados WHERE id=".$id);
    if(mysqli_num_rows($record) > 0){

        $name = mysqli_escape_string($con,trim($_POST['name']));
        $email = mysqli_escape_string($con,trim($_POST['email']));
        $tipo = mysqli_escape_string($con,trim($_POST['tipo']));
        $raca = mysqli_escape_string($con,trim($_POST['raca']));
        $genero = mysqli_escape_string($con,trim($_POST['genero']));
        $city = mysqli_escape_string($con,trim($_POST['city']));

        if( $name != '' && $email != '' && $tipo != '' && $city != '' ){

            mysqli_query($con,"UPDATE dados SET name='".$name."',email='".$email."',tipo='".$tipo."',raca='".$raca."',genero='".$genero."',city='".$city."' WHERE id=".$id);

            echo json_encode( array("status" => 1,"message" => "Record updated.") );
            exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
            exit;
        }
        
    }else{
        echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
        exit;
    }
}

// Delete User
if($request == 4){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($con,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($con,"SELECT id FROM dados WHERE id=".$id);
    if(mysqli_num_rows($record) > 0){

        mysqli_query($con,"DELETE FROM dados WHERE id=".$id);

        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }
}


// Confirmar User
if($request == 5){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($con,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($con,"SELECT id FROM dados WHERE id=".$id);
    if(mysqli_num_rows($record) > 0){

        mysqli_query($con,"UPDATE dados SET status='1' WHERE id=".$id);

        $res=mysqli_query($con,"SELECT * from dados where id=".$id);
        $row=mysqli_fetch_assoc($res);

        $name=$row['name'];
        $email=$row['email'];
        $tipo=$row['tipo'];
        $raca=$row['raca'];
        $genero=$row['genero'];
        $city=$row['city'];

            require 'phpmailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            $mail->Username='13933@espamol.pt';
            $mail->Password='comerfrango13933';

            $mail->setFrom($email);
            $mail->addAddress($email);
            $mail->addReplyto($email);

            $mail->isHTML(true);
            $mail->Subject="A sua compra foi confirmada";
            $mail->Body="Olá $name, a sua compra de:<br>
             $tipo<br>
             $raca<br>
             $genero<br>
             foi confirmada e será enviada para $city";

            if(!$mail->send()){
                echo "Message could not be sent!";
            }

        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }
}