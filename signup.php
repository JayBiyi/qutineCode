
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css?v=<?php echo time(); ?>'>
    <script src='main.js'></script>
    </script>
    </head>
    <body style="color: blue;">
<?php
$name =$_POST["name"];
$excl = "<div class=\"excl\">!!!  Wholla!!!  </div>";
$messege = "<div>Well done $name, your profile has been secured ,we can't wait to see your best snaps</div><div>You can now continue sharing your best shots on our social media pages</div>";
$SaybyAge = "";
$sex =$_POST["sex"];
$date =$_POST["birth"];
$contact = $_POST["contact"];
//$year = date("Y/m/d",$date);
$stDate = strval($date);
$realdate= substr($stDate,0,4);
$age = 2020-(intval($realdate));



if($sex==="M"){
    $SaybyAge = "Thank you for being Mr quantine";
}else{
    $SaybyAge = "Thank you for being Miss quantine";
}
$disc = "<div>contact the developer for any inquiries,FB@JasonPrince,IG@PrinceTason,email:jasonprincebs@gmail.com</div>";
//code for file upload
$dir = "profiles/";
$file = $dir . basename($_FILES["file"]["name"]);
$UploadOk = 1;
$imageType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
//check if image is authentic
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check!==false){
        //echo("file is authentic $file");
        $UploadOk = 1;
    }else{
        //echo("file not authentic");
        $UploadOk = 0;
    }
}
move_uploaded_file($_FILES["file"]["tmp_name"],$file);
//code fo databse connecting
$server = "localhost";
$conn = new mysqli($server,"root","","qutine");
if($conn->connect_error){
    die("failed:".$conn->connect_error);
}
$command = "INSERT INTO contestants(name,sex,age,contact,picture) VALUES ('$name','$sex','$age','$contact','$file')";
if($conn->query($command) === TRUE){
    success();
    
}else {
    echo("error!");
}
$conn->close();
//this code is to echo if registration was succesful

//create pic
function success(){
    global $file,$name,$messege,$SaybyAge,$excl,$disc;
$pic = "<div class=\"holder\"><img src=\"$file\" class=\"pic\"><figcaption>$name</figcaption>$messege<br>$SaybyAge</div>";
echo($excl);
echo($pic);
echo($disc);
}
?>
</body>
</html>
