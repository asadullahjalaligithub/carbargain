<?php 
require('../includes/connection.php');
// login authentication 
session_start();
if(isset($_POST['actionString']) && $_POST['actionString']=='loginAuthentication')
{
   $username = $_POST['username'];
   $password = $_POST['password'];
   $query = "select * from user where (user_username='$username' or user_phone='$username' or user_email='$username') and user_password='$password'";
  
   $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result)==1)
    {
        $row= mysqli_fetch_assoc($result);
        $_SESSION['username']=$row['user_username'];
        $_SESSION['password']=$row['user_password'];
        $_SESSION['id']=$row['user_id'];
        $_SESSION['phone']=$row['user_phone'];
        $_SESSION['email']=$row['user_email'];
        $_SESSION['firstname']=$row['user_firstname'];
        $_SESSION['lastname']=$row['user_lastname'];
        $_SESSION['privilage']=$row['privilage'];
        $_SESSION['loginStatus']=true;
        echo $_SESSION['privilage'];
    }
    else 
    echo "false";
}


// car model process codes


// insert record to model table
if(isset($_POST['actionString']) && $_POST['actionString']=='insertModel')
{
    $value = $_POST['value'];
    $query="insert into model (model_name) values('$value')";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}
// retrieve all the records of the model
if(isset($_POST['actionString']) && $_POST['actionString']=='viewModel'){
    $query="select * from model";
    $result=mysqli_query($connection,$query);
    $html="";
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $html.="<tr>
        <td>$i</td>
        <td>".$row['model_name']."</td>
        <td><button class='btn btn-warning editButton' value='".$row['model_id']."'>Edit</button>
        <button class='btn btn-danger deleteButton' value='".$row['model_id']."'>Delete</button></td>
        </tr>";
        $i++;
    }
    echo $html;
}
// delete model record
if(isset($_POST['actionString']) && $_POST['actionString']=='deleteModel'){
   $id = $_POST['id'];
   $query ="delete from model where model_id=".$id;
   if(mysqli_query($connection,$query))
   echo "true";
   else 
   echo "false";
}

// retrieve one record of the model
if(isset($_POST['actionString']) && $_POST['actionString']=='modelRecord'){
    $id = $_POST['id'];
    $query ="select * from model where model_id=".$id;
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);    
}


// update model record

if(isset($_POST['actionString']) && $_POST['actionString']=='updateModel'){
    $id = $_POST['model_id'];
    $name = $_POST['model_name'];
    $query ="update model set model_name='$name' where model_id=$id";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}



// car colors process codes

// insert record to color table
if(isset($_POST['actionString']) && $_POST['actionString']=='insertColor')
{
    $value = $_POST['value'];
    $query="insert into color (color_name) values('$value')";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}
// retrieve all the records of the color
if(isset($_POST['actionString']) && $_POST['actionString']=='viewColor'){
    $query="select * from color";
    $result=mysqli_query($connection,$query);
    $html="";
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $html.="<tr>
        <td>$i</td>
        <td>".$row['color_name']."</td>
        <td><button class='btn btn-warning editButton' value='".$row['color_id']."'>Edit</button>
        <button class='btn btn-danger deleteButton' value='".$row['color_id']."'>Delete</button></td>
        </tr>";
        $i++;
    }
    echo $html;
}
// delete color record
if(isset($_POST['actionString']) && $_POST['actionString']=='deleteColor'){
   $id = $_POST['id'];
   $query ="delete from color where color_id=".$id;
   if(mysqli_query($connection,$query))
   echo "true";
   else 
   echo "false";
}

// retrieve one record of the color
if(isset($_POST['actionString']) && $_POST['actionString']=='colorRecord'){
    $id = $_POST['id'];
    $query ="select * from color where color_id=".$id;
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);    
}


// update color record

if(isset($_POST['actionString']) && $_POST['actionString']=='updateColor'){
    $id = $_POST['color_id'];
    $name = $_POST['color_name'];
    $query ="update color set color_name='$name' where color_id=$id";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}




// car Engine process codes

// insert record to engine table
if(isset($_POST['actionString']) && $_POST['actionString']=='insertEngine')
{
    $value = $_POST['value'];
    $query="insert into engine (engine_name) values('$value')";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}
// retrieve all the records of the engine
if(isset($_POST['actionString']) && $_POST['actionString']=='viewEngine'){
    $query="select * from engine";
    $result=mysqli_query($connection,$query);
    $html="";
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $html.="<tr>
        <td>$i</td>
        <td>".$row['engine_name']."</td>
        <td><button class='btn btn-warning editButton' value='".$row['engine_id']."'>Edit</button>
        <button class='btn btn-danger deleteButton' value='".$row['engine_id']."'>Delete</button></td>
        </tr>";
        $i++;
    }
    echo $html;
}
// delete engine record
if(isset($_POST['actionString']) && $_POST['actionString']=='deleteEngine'){
   $id = $_POST['id'];
   $query ="delete from engine where engine_id=".$id;
   if(mysqli_query($connection,$query))
   echo "true";
   else 
   echo "false";
}

// retrieve one record of the color
if(isset($_POST['actionString']) && $_POST['actionString']=='engineRecord'){
    $id = $_POST['id'];
    $query ="select * from engine where engine_id=".$id;
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);    
}


// update engine record

if(isset($_POST['actionString']) && $_POST['actionString']=='updateEngine'){
    $id = $_POST['engine_id'];
    $name = $_POST['engine_name'];
    $query ="update engine set engine_name='$name' where engine_id=$id";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}


//************************************************************* */
// company server codes

// insert company records
if(isset($_POST['actionString']) && $_POST['actionString']=='insertCompany'){
   
    $name = $_POST['companyName'];
    $email = $_POST['companyEmail'];
    $address=$_POST['companyAddress'];
    $realCompanyName = $_FILES['companyLogo']['name'];
    $tempName = $_FILES['companyLogo']['tmp_name'];
    $finalDatabaseName = time().".jpg";
    $destination = "../images/".$finalDatabaseName;
    move_uploaded_file($tempName,$destination);
    $query = "insert into company (company_name,company_address,company_logo,company_email) values ('$name','$address','$finalDatabaseName','$email')";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}


// view company records

// retrieve all the records of the company
if(isset($_POST['actionString']) && $_POST['actionString']=='viewCompany'){
    $query="select * from company";
    $result=mysqli_query($connection,$query);
    $html="";
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $html.="<tr>
        <td>$i</td>
        <td>".$row['company_name']."</td>
        <td>".$row['company_email']."</td>
        <td>".$row['company_address']."</td>
        <td><img src='images/".$row['company_logo']."' height='80px' width='80px'></td>
        <td><button class='btn btn-warning editButton' value='".$row['company_id']."'>Edit</button>
        <button class='btn btn-danger deleteButton' value='".$row['company_id']."'>Delete</button></td>
        </tr>";
        $i++;
    }
    echo $html;
}



// retrieve one record of the company
if(isset($_POST['actionString']) && $_POST['actionString']=='companyRecord'){
    $id = $_POST['id'];
    $query ="select * from company where company_id=".$id;
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);    
}


// delete company record
if(isset($_POST['actionString']) && $_POST['actionString']=='deleteCompany'){
    $id = $_POST['id'];
    $q="select * from company where company_id=".$id;
    $result=mysqli_query($connection,$q);
    $row=mysqli_fetch_assoc($result);
    $query ="delete from company where company_id=".$id;
    if(mysqli_query($connection,$query))
    {
    echo "true";
    if(file_exists('../images/'.$row['company_logo']))
            unlink('../images/'.$row['company_logo']);
}
    else 
    echo "false";
 }


 // updating company record
if(isset($_POST['actionString']) && $_POST['actionString']=='updateCompany'){
   
    $name = $_POST['companyName'];
    $email = $_POST['companyEmail'];
    $address=$_POST['companyAddress'];
    $id=$_POST['companyId'];
    if(isset($_FILES['companyLogo']) && $_FILES['companyLogo']['error']==UPLOAD_ERR_OK)
    {
        // retrieving older company logo name to delete it from folder in case of image update
        $q="select * from company where company_id=".$id;
        $result=mysqli_query($connection,$q);
        $row=mysqli_fetch_assoc($result);
        
        // updating the image
        $realCompanyName = $_FILES['companyLogo']['name'];
        $tempName = $_FILES['companyLogo']['tmp_name'];
        $finalDatabaseName = time().".jpg";
        $destination = "../images/".$finalDatabaseName;
        move_uploaded_file($tempName,$destination);
        $query="update company set company_logo='$finalDatabaseName' where company_id=$id";    
        if(mysqli_query($connection,$query))
        {
            if(!empty($row['company_logo']) && file_exists('../images/'.$row['company_logo']))
                    unlink('../images/'.$row['company_logo']);
        }
    }
    $query = "update company set company_name='$name' , company_email='$email' , company_address='$address' where company_id=$id";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}




//************************************************************* */
// person records

// insert person records
if(isset($_POST['actionString']) && $_POST['actionString']=='insertPerson'){
   
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $address=$_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nic = $_POST['nic'];
    $realPersonName = $_FILES['personImage']['name'];
    $tempName = $_FILES['personImage']['tmp_name'];
    $finalDatabaseName = time().".jpg";
    $destination = "../images/".$finalDatabaseName;
    move_uploaded_file($tempName,$destination);
    $query = "insert into person (person_firstname,person_lastname,person_nic,person_email,person_phone,person_address,person_image) values ('$firstname','$lastname','$nic','$email','$phone','$address','$finalDatabaseName')";
    //echo $query;
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}


// view Person records

// retrieve all the records of the Person
if(isset($_POST['actionString']) && $_POST['actionString']=='viewPerson'){
    $value = $_POST['value'];
    if($value!="")
    $query="select * from person where person_firstname like '%$value%' or person_lastname like '%$value%' or person_nic like '%$value%' or  person_phone like '%$value%' or person_email like '%$value%' or person_address like '%$value%' ";
    else 
    $query = "select * from person";
    $result=mysqli_query($connection,$query);
    $html="";
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $html.="<tr>
        <td>$i</td>
        <td>".$row['person_firstname']."</td>
        <td>".$row['person_lastname']."</td>
        <td>".$row['person_nic']."</td>
        <td>".$row['person_phone']."</td>
        <td>".$row['person_email']."</td>
        <td>".$row['person_address']."</td>
        <td><img src='images/".$row['person_image']."' height='80px' width='80px'></td>
        <td><button class='btn btn-warning editButton' value='".$row['person_id']."'>Edit</button>
        <button class='btn btn-danger deleteButton mt-1' value='".$row['person_id']."'>Delete</button></td>
        </tr>";
        $i++;
    }
    echo $html;
}



// retrieve one record of the person
if(isset($_POST['actionString']) && $_POST['actionString']=='personRecord'){
    $id = $_POST['id'];
    $query ="select * from person where person_id=".$id;
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);    
}


// delete person record
if(isset($_POST['actionString']) && $_POST['actionString']=='deletePerson'){
    $id = $_POST['id'];
    $q="select * from person where person_id=".$id;
    $result=mysqli_query($connection,$q);
    $row=mysqli_fetch_assoc($result);
    $query ="delete from person where person_id=".$id;
    if(mysqli_query($connection,$query))
    {
    echo "true";
    if(file_exists('../images/'.$row['person_image']))
            unlink('../images/'.$row['person_image']);
}
    else 
    echo "false";
 }


 // updating person record
if(isset($_POST['actionString']) && $_POST['actionString']=='updatePerson'){
   
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $address=$_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nic = $_POST['nic'];
    $id=$_POST['id'];
    if(isset($_FILES['personImage']) && $_FILES['personImage']['error']==UPLOAD_ERR_OK)
    {
        // retrieving older company logo name to delete it from folder in case of image update
        $q="select * from person where person_id=".$id;
        $result=mysqli_query($connection,$q);
        $row=mysqli_fetch_assoc($result);
        
        // updating the image
        $realPersonName = $_FILES['personImage']['name'];
        $tempName = $_FILES['personImage']['tmp_name'];
        $finalDatabaseName = time().".jpg";
        $destination = "../images/".$finalDatabaseName;
        move_uploaded_file($tempName,$destination);
        $query="update person set person_image='$finalDatabaseName' where person_id=$id";    
        if(mysqli_query($connection,$query))
        {
            if(!empty($row['person_image']) && file_exists('../images/'.$row['person_image']))
                    unlink('../images/'.$row['person_image']);
        }
    }
    $query = "update person set person_firstname='$firstname',person_lastname='$lastname',person_email='$email', person_phone='$phone',person_nic='$nic',person_address='$address' where person_id='$id' ";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}

// purchase page


// purchase customer and witness change
if(isset($_POST['actionString']) && $_POST['actionString']=='changeCustomer'){
$value = $_POST['value'];
echo $value;
$query="select * from car where car_platenumber='$value'";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$query="select * from person where person_id<>'".$row['owner_id']."'";
$result=mysqli_query($connection,$query);
$html="";
while($row=mysqli_fetch_assoc($result))
        {
         $html.="<option value='".$row['person_id']."'>".$row['person_firstname']." ".$row['person_lastname']." ".$row['person_nic']." ".$row['person_phone']."</option>";   
        }
        echo $html;
}

// view all sales
if(isset($_POST['actionString']) && $_POST['actionString']=='viewSales'){
    $value=$_POST['value'];
    if($value!="")
    $query ="select * from sale 
    inner join person as w on sale.witness_id=w.person_id 
    inner join person as c on sale.customer_id=c.person_id 
    inner join car on sale.car_platenumber_id=car.car_platenumber 
    inner join person as o on car.owner_id=o.person_id
    inner join company on company.company_id=car.company_id
    inner join color on color.color_id=car.color_id
    inner join engine on engine.engine_id = car.engine_id where sale.car_platenumber_id like '%$value%' or color.color_name like '%$value%' or engine.engine_name like '%$value%' or car.car_manufacture_date like '%$value%' or company.company_name like '%$value%' or o.person_firstname like '%$value%' or o.person_lastname like '%$value%' or o.person_nic like '%$value%' or w.person_firstname like '%$value%' or w.person_lastname like '%$value%' or w.person_nic like '%$value%' or c.person_firstname like '%$value%' or c.person_lastname like '%$value%' or c.person_nic like '%$value%' or sale.sale_price like '%$value%' or sale.sale_description like '%$value%' or sale.sale_status like '%$value%' or sale.sale_date like '%$value%'";
    else 
$query="select * from sale 
inner join person as w on sale.witness_id=w.person_id 
inner join person as c on sale.customer_id=c.person_id 
inner join car on sale.car_platenumber_id=car.car_platenumber 
inner join person as o on car.owner_id=o.person_id
inner join company on company.company_id=car.company_id
inner join color on color.color_id=car.color_id
inner join engine on engine.engine_id = car.engine_id";

$result=mysqli_query($connection,$query);
$html="";
$i=0;
while($row=mysqli_fetch_array($result))
{
    $i++;
$html.="<tr>
<td>$i</td>
<td>$row[5]</td>
<td>$row[52]</td>
<td>$row[54]</td>
<td>$row[36]</td>
<td>$row[48]</td>
<td> $row[39] $row[40] $row[41]</td>
<td> $row[11] $row[12] $row[13]</td>
<td> $row[19] $row[20] $row[21]</td>
<td>$row[4]</td>
<td>$row[2]</td>
<td>$row[1]</td>
<td>$row[8]</td>";
if($row[8]=='Pending')
$html.="<td><button class='btn btn-warning editButton' value='$row[0]'>Edit</button></td>";
else 
$html.="<td>Locked</td>";
$html.="</tr>";
}
echo $html;
}


// insert cal sales
// view all sales
if(isset($_POST['actionString']) && $_POST['actionString']=='insertSale'){
$price = $_POST['price'];
$customer=$_POST['customer'];
$witness = $_POST['witness'];
$car = $_POST['car'];
$description = $_POST['description'];
$date = date('Y-m-d');
$userid= $_SESSION['id'];
$query = "insert into sale (sale_date,sale_description,user_id,sale_price, car_platenumber_id, witness_id, customer_id) 
values ('$date','$description','$userid','$price','$car','$witness','$customer')";
if(mysqli_query($connection,$query))
echo "true";
else 
echo "false";
}



// retrieving a sale record for edit modal
if(isset($_POST['actionString']) && $_POST['actionString']=='saleRecord'){

$id=$_POST['id'];
$query="select * from sale where sale_id=".$id;
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$query="select * from car 
inner join color on color.color_id=car.color_id 
inner join engine on engine.engine_id=car.engine_id 
where car.car_platenumber='".$row['car_platenumber_id']."'";
$result=mysqli_query($connection,$query);
$row1=mysqli_fetch_assoc($result);
array_push($row,$row1);
echo json_encode($row);
}

// updating sale record
if(isset($_POST['actionString']) && $_POST['actionString']=='updateSale'){
    $price = $_POST['price'];
    $customer=$_POST['customer'];
    $witness = $_POST['witness'];
    $car = $_POST['car'];
    $description = $_POST['description'];
    $date = date('Y-m-d');
    $query = "update sale set  sale_description='$description',sale_price='$price', witness_id='$witness', customer_id='$customer', update_date='$date' where car_platenumber_id='$car'";
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
       
}



// purchase server codes

if(isset($_POST['actionString']) && $_POST['actionString']=='viewPurchases'){
$value=$_POST['value'];
if($value!="")
$query="SELECT * FROM car 
inner join color on car.color_id=color.color_id
inner join engine on engine.engine_id=car.engine_id
inner join person on person.person_id=car.owner_id
inner join company on company.company_id=car.company_id
inner join model on model.model_id=car.model_id where 
car_platenumber like '%$value%' or 
color_name like '%$value%' or 
engine_name like '%$value%' or 
model_name like '%$value%' or 
company_name like '%$value%' or 
person_firstname like '%$value%' or 
person_lastname like '%$value%' or 
person_nic like '%$value%' or 
car.status like '%$value%' or 
car_price like '%$value%' or 
car_manufacture_date like '%$value%' or 
car_import_date like '%$value%'";
else 
$query="SELECT * FROM car 
inner join color on car.color_id=color.color_id
inner join engine on engine.engine_id=car.engine_id
inner join person on person.person_id=car.owner_id
inner join company on company.company_id=car.company_id
inner join model on model.model_id=car.model_id
";
$result = mysqli_query($connection,$query);
$html="";
$i=0;
while($row=mysqli_fetch_assoc($result))
{
    $i++;
$html.="<tr>
<td>".$i."</td>
<td>".$row['car_platenumber']."</td>
<td>".$row['color_name']."</td>
<td>".$row['engine_name']."</td>
<td>".$row['model_name']."</td>
<td>".$row['company_name']."</td>
<td>".$row['person_firstname']."</td>
<td>".$row['person_lastname']."</td>
<td>".$row['person_nic']."</td>
<td>".$row['car_manufacture_date']."</td>
<td>".$row['car_import_date']."</td>
<td>".$row['car_price']."</td>
<td><img src='images/".$row['car_image']."' width='60px' height='60px'></td>
<td>".$row['status']."</td>
<td><button class='btn btn-warning editButton' value='".$row['car_platenumber']."'>Edit</button></td>
</tr>";
}
echo $html;

}


// car insert
if(isset($_POST['actionString']) && $_POST['actionString']=='insertCar'){
    $platnumber = $_POST['car_platenumber'];
    $price = $_POST['car_price'];
    $mdate=$_POST['car_manufacture_date'];
    $idate = $_POST['car_import_date'];
    $owner = $_POST['person_id'];
    $companyid = $_POST['company_id'];
    $engineid = $_POST['engine_id'];
    $colorid = $_POST['color_id'];
    $modelid = $_POST['model_id'];
    $realPersonName = $_FILES['carImage']['name'];
    $tempName = $_FILES['carImage']['tmp_name'];
    $finalDatabaseName = time().".jpg";
    $destination = "../images/".$finalDatabaseName;
    $userid=$_SESSION['id'];
    move_uploaded_file($tempName,$destination);
    $query = "insert into car  values ('$platnumber','$colorid','$engineid','$finalDatabaseName','$owner','$mdate','$companyid','$userid','$modelid','$price','$idate','PurchaseNotConfirm')";
    //echo $query;
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}

// car retrieve for edit
// retrieve one record of the person
if(isset($_POST['actionString']) && $_POST['actionString']=='carRecord'){
    $id = $_POST['id'];
    $query ="select * from car where car_platenumber='".$id."'";
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row);    
}
// car update

if(isset($_POST['actionString']) && $_POST['actionString']=='updateCar'){
    $platnumber = $_POST['updatecar_platenumber'];
    $price = $_POST['updatecar_price'];
    $mdate=$_POST['updatecar_manufacture_date'];
    $idate = $_POST['updatecar_import_date'];
    $owner = $_POST['updateperson_id'];
    $companyid = $_POST['updatecompany_id'];
    $engineid = $_POST['updateengine_id'];
    $colorid = $_POST['updatecolor_id'];
    $modelid = $_POST['updatemodel_id'];
    if(isset($_FILES['updatecarImage']) && $_FILES['updatecarImage']['error']==UPLOAD_ERR_OK)
    {
        // retrieving older company logo name to delete it from folder in case of image update
        $q="select * from car where car_platenumber=".$platnumber;
        $result=mysqli_query($connection,$q);
        $row=mysqli_fetch_assoc($result);
        
        // updating the image
        $realPersonName = $_FILES['updatecarImage']['name'];
        $tempName = $_FILES['updatecarImage']['tmp_name'];
        $finalDatabaseName = time().".jpg";
        $destination = "../images/".$finalDatabaseName;
        move_uploaded_file($tempName,$destination);
        $query="update car set car_image='$finalDatabaseName' where car_platenumber=$platnumber";    
        if(mysqli_query($connection,$query))
        {
            if(!empty($row['car_image']) && file_exists('../images/'.$row['car_image']))
                    unlink('../images/'.$row['car_image']);
        }
    }
    $query = "update car set car_platenumber='$platnumber',color_id='$colorid',model_id='$modelid', company_id='$companyid',engine_id='$engineid',car_manufacture_date='$mdate',car_import_date='$idate',owner_id='$owner',car_price='$price' where car_platenumber='$platnumber' ";
   // echo $query;
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
}


// admin view purchase

if(isset($_POST['actionString']) && $_POST['actionString']=='adminViewPurchase'){
    $value=$_POST['value'];
    if($value!="")
    $query="SELECT * FROM car 
    inner join color on car.color_id=color.color_id
    inner join engine on engine.engine_id=car.engine_id
    inner join person on person.person_id=car.owner_id
    inner join company on company.company_id=car.company_id
    inner join model on model.model_id=car.model_id where 
    car_platenumber like '%$value%' or 
    color_name like '%$value%' or 
    engine_name like '%$value%' or 
    model_name like '%$value%' or 
    company_name like '%$value%' or 
    person_firstname like '%$value%' or 
    person_lastname like '%$value%' or 
    person_nic like '%$value%' or 
    car.status like '%$value%' or 
    car_price like '%$value%' or 
    car_manufacture_date like '%$value%' or 
    car_import_date like '%$value%'";
    else 
    $query="SELECT * FROM car 
    inner join color on car.color_id=color.color_id
    inner join engine on engine.engine_id=car.engine_id
    inner join person on person.person_id=car.owner_id
    inner join company on company.company_id=car.company_id
    inner join model on model.model_id=car.model_id
    ";
    $result = mysqli_query($connection,$query);
    $html="";
    $i=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $i++;
    $html.="<tr>
    <td>".$i."</td>
    <td>".$row['car_platenumber']."</td>
    <td>".$row['color_name']."</td>
    <td>".$row['engine_name']."</td>
    <td>".$row['model_name']."</td>
    <td>".$row['company_name']."</td>
    <td>".$row['person_firstname']."</td>
    <td>".$row['person_lastname']."</td>
    <td>".$row['person_nic']."</td>
    <td>".$row['car_manufacture_date']."</td>
    <td>".$row['car_import_date']."</td>
    <td>".$row['car_price']."</td>
    <td><img src='images/".$row['car_image']."' width='60px' height='60px'></td>";
    if($row['status']=='Pending')
    $html.="<td><button class='btn btn-warning confirmButton' value='".$row['car_platenumber']."'>".$row['status']."</button></td>
    <td><button class='btn btn-danger deleteButton' value='".$row['car_platenumber']."'>Delete</button></td>
    </tr>";
    else
    $html.="<td><button class='btn btn-info confirmButton' value='".$row['car_platenumber']."'>".$row['status']."</button></td>
    <td></td>
    </tr>";
    }
    echo $html;
    
    }
    
    
// admin view purchase

if(isset($_POST['actionString']) && $_POST['actionString']=='deletePurchase'){
    $value=$_POST['id'];
    $query="delete from car where car_platenumber='".$value."'";  
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
    }
    

// confirm purchase
if(isset($_POST['actionString']) && $_POST['actionString']=='confirmPurchase'){
    $id=$_POST['id'];
    $value = $_POST['value'];
    if($value=="Purchased")
    $value="Pending";
    else 
    $value="Purchased";
    $query="update car set status='$value' where car_platenumber='".$id."'";  
    if(mysqli_query($connection,$query))
    echo "true";
    else 
    echo "false";
    }
    