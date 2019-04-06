<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "gardeshgari");
if ($mysqli->connect_errno > 0) {
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}
?>
<!doctype html>
<html><head>
        <meta lang="fa">
        <meta charset="UTF-8">
                 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Untitled Document</title>
        
        <style type="text/css">
            body {
                background-color: #E2EBED;
                font-family: Tahoma, Geneva, sans-serif;
                font-size: 12px;
                direction: rtl;
                line-height: 22px;

            }

            #maincontainer {
                width: 660px;
                margin: 0 auto;
                text-align: left;
                height: 100%;
                background-color: #FFF;
                border-left: 3px double #000;
                border-right: 3px double #000;
            }

            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            .pill-nav a {
                display: inline-block;
                color: black;
                text-align: center;
                padding: 14px;
                text-decoration: none;
                font-size: 17px;
                border-radius: 5px;
            }

            .pill-nav a:hover {
                background-color: #ddd;
                color: black;
            }

            .pill-nav a.active {
                background-color: dodgerblue;
                color: white;
            }
            .pagination span{
                display: inline-block;
                min-width: 25px;
                text-align: center;
                margin: 0 2px;
            }
			
.pagination {
  margin: 10px auto;
  width: 300px;
  text-align: center;
}
.pagination td {
  border: solid 1px #1081d0;
}
.pagination td a {
  color: #1081d0;
}
.active {
  background: #1081d0;
  color: #ffffff;
}

	#example td.blue {color:#00F;} 		
	

/* Add a grey background color on mouse-over */
.pagination a:hover:not(.active) {background-color: #ddd;}
		.paged-link{
    display:inline-block;
    line-height:14px;
    float:right;
    margin:2px;
}
.paged-link a{
    display:inline-block;
    border:#06C 1px solid;
    padding:2px;
    text-decoration:none;
}
.paged-link a:hover{
    border:#900 1px solid;
}
.paged-link-selected{
    display:inline-block;
    line-height:14px;
    float:right;
    margin:2px;
}
.paged-link-selected a{
    display:inline-block;
    border:#900 1px solid;
    padding:2px;
    text-decoration:none;
}
.paged-link-selected a:hover{
    border:#900 1px solid;
}
.paged-link-off{
    display:inline-block;
    border:#06C 1px solid;
    padding:2px;
    color:#CCC;
    line-height:14px;
    float:right;
    margin:2px;
}
.paged-link-info{
    display:inline-block;
    float:left;
    padding:2px;
    color:#666;
    line-height:14px;
    margin:2px;
    font-size:11px;
}	
			
	.message .error{
    background: #f35c5c;
    line-height: 33px;
    padding: 0 9px;
    color: #fff;
    margin: 10px 0;
    font-family: tahoma;
    font-size: 13px;
    border-radius: 5px;
}
			
		#register_form h1 {
  text-align: center;
}
#register_form {
  width: 37%;
  margin: 100px auto;
  padding-bottom: 30px;
  border: 1px solid #918274;
  border-radius: 5px;
  background: white;
}
#register_form input {
  width: 80%;
  height: 35px;
  margin: 5px 10%;
  font-size: 1.1em;
  padding: 4px;
  font-size: .9em;
}
#reg_btn {
  height: 35px;
  width: 80%;
  margin: 5px 10%;
  color: white;
  background: #3B5998;
  border: none;
  border-radius: 5px;
}
/*Styling for errors on form*/
.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: #D83D5A;
}
.form_error input {
  border: 1px solid #D83D5A;
}

/*Styling in case no errors on form*/
.form_success span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: green;
}
.form_success input {
  border: 1px solid green;
}
#error_msg {
  color: red;
  text-align: center;
  margin: 10px auto;
}		
			
			
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="pill-nav">
  
		 <a href="#"  id='open-add-hotel'>درج</a>
		 <a href="#" id='open-edit-hotel' data-hotel-id='' >ویرایش</a>
       <a href="/test1/tina10.php?delete=" id='delete-hotel' onclick="return confirm('ایا مطمئن هستید؟')" >حذف</a>
	  </div>
		</nav>
    <?php

printAddForm($mysqli);

if (isset($_POST["add"]) && isset($_POST["CountryName"]) && isset($_POST["CityName"]) && isset($_POST["HotelName"]) && isset($_POST["HotelNumber"])&&  isset($_POST["Ranks"]) && isset($_POST["Tozihat"])) {
    insertHotel($mysqli);
}

if (isset($_GET['delete'])) {
    deleteHotel($mysqli);
}

if (isset($_POST['doEdit'])) {
    editHotel($mysqli);
}

printHotelsTable($mysqli);
		
?>   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/bootbox.min.js"></script>

    <script>
        $(document).ready(function() {
            $('input[name="operational-id"]').on('change', function() {
                    $('#open-edit-hotel').css('display', '').data('hotelId', $(this).val())
                    $('#delete-hotel').css('display', '').attr('href', '/test1/tina10.php?delete=' + $(this).val())
                })
            $("#open-edit-hotel").click(function(){
                $("#edit-hotel-" + $(this).data().hotelId).modal("show");
            });
            $("#open-add-hotel").click(function(){
                $("#add-hotel").modal("show");
            });
		
        

        })
    </script>
    </body>
</html>

<?php
	
function printEditForm($id, $mysqli)
{
    if ($mysqli->connect_errno > 0) {
        die('Unable to connect to database [' . $mysqli->connect_error . ']');
    }
    $result = $mysqli->query("select * from hotelm where id=$id");
    if (!$result) {
        echo '';
        return null;
    }
    $row = $result->fetch_assoc();
    $CountryName = $row['CountryName'];
    $CityName = $row['CityName'];
    $HotelName = $row['HotelName'];
    $HotelNumber = $row['HotelNumber'];
    $Ranks = $row['Ranks'];
    $Tozihat = $row['Tozihat'];

    echo '<form method="post" action="">';
	echo '<div align="right" >';
    echo "<input type='hidden' name='id' value='$id'>";
    $result = $mysqli->query("select * from countries");
    echo "<span>کشورها:</span>";
    echo "<select name='CountryName'>";
    while ($row = $result->fetch_assoc()) {
        if ($CountryName == $row['CountryName']) {
            echo "<option  value='$CountryName' selected>$CountryName</option>";
        } else {
            echo "<option value='" . $row['CountryName'] . "'>" . $row['CountryName'] . "</option>";
        }
    }
    echo "</select><br><br>";
    $result = $mysqli->query("select * from city");
    echo "<span>شهرها:</span> <select name='CityName'>";
    while ($row = $result->fetch_assoc()) {
        if ($CityName == $row['CityName']) {
            echo "<option value='$CityName' selected>$CityName</option>";
        } else {
            echo "<option value='" . $row['CityName'] . "'>" . $row['CityName'] . "</option>";
        }
    }
    echo "</select>
    <br><br>
    <span>نام هتل:</span>
    <input type='text' name='HotelName' value='$HotelName'>
	<br><br>
	<span>درجه بندی:</span>
	<input type='number' name='Ranks' value='$Ranks'>
	<br><br>
	<span> شماره تماس:</span>
	<input type='number' name='HotelNumber' value='$HotelNumber'>
	

	<br><br>
	<span> توضیحات:</span>
	<br><br>
	<textarea name='Tozihat' rows='5' cols='40'>$Tozihat</textarea>
	<br><br>
    <input type='submit' name='doEdit' class='btn btn-info'  value='ویرایش'></a>
	</div>
    </form>";

}

function printAddForm($mysqli)
{
    $result = $mysqli->query("select * from countries");
    echo "
        <div class='modal' id='add-hotel' tabindex='-1' role='dialog'>
        <div class='modal-dialog' role='document'>
        <div class='modal-content'>
        <div class='modal-header'>
        <h5 class='modal-title'>درج</h5>
        </div>
        <div  align='right' class='modal-body'>
        <form method='post'  action=''>
		";
	
	  
    echo " کشورها: <select name='CountryName'>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['CountryName'] . "'>" . $row['CountryName'] . "</option>";
    }
    echo "</select><br><br>";
    $result = $mysqli->query("select * from city");
    echo " شهرها:<select name='CityName' >";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['CityName'] . "'>" . $row['CityName'] . "</option>";
    }
    echo "</select>
        <br><br>
		
        <span  >نام هتل:</span>
        <input pattern='[a-zA-Z]+' oninvalid='setCustomValidity('Please enter on alphabets only. ')'  type='text'  name='HotelName' id='HotelName'>
		
		
        <br><br>
    
        <span>درجه بندی:</span>
		  <input type='number' name='Ranks'>
        <br><br>
        <span> شماره تماس:</span>
        <input type='number' name='HotelNumber'>
        <br><br>
        <br><br>
        <span> توضیحات:</span>
        <textarea name='Tozihat' rows='5' cols='40'></textarea>
        <br><br>
       
        <br><br>
      
        </div>
        <div class='modal-footer'>
		 <input type='submit' name='add' class='btn btn-success' 'trigger'  id='reg_btn' value='ثبت'>
</div> 
		 </form>
		 <br><br>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>خروج</button>
     
        </div>
        </div>
        </div>
        </div>";
}

function insertHotel($mysqli)
{
    $CountryName = $_POST['CountryName'];
    $CityName = $_POST['CityName'];
    $HotelName = $_POST['HotelName'];
    $HotelNumber = $_POST['HotelNumber'];
    $Ranks = $_POST['Ranks'];
    $Tozihat = $_POST['Tozihat'];
    $select = $mysqli->query("select count(*) from hotelm");
	$check=mysqli_query($mysqli,"select * from hotelm where CountryName='$CountryName'and CityName='$CityName'and HotelName='$HotelName'and HotelNumber='$HotelNumber'and Ranks='$Ranks'and Tozihat='$Tozihat'");
	$checkrows=mysqli_num_rows($check);
	if($checkrows>0){

  print "<script type=\"text/javascript\">"; 
  print "alert('The informations are already inserted')"; 
  print "</script>";
	 } else {
	
		
	

    $query = "insert into hotelm (CountryName,CityName,HotelName,HotelNumber,Ranks,Tozihat)
            values('$CountryName','$CityName','$HotelName','$HotelNumber','$Ranks','$Tozihat')";
    $mysqli->query($query);
	}
}

function printHotelsTable($mysqli)
	
{  echo "
	
        <table id='example' class='table table-hover' border='2px' 'table table-sm '>
		
            <tr class='active border=2px '>
			<thead>
                <td></td>
               <td>#</td>
                <td  class='blue' style= 'font-size:20px'>کشور</td>
                <td class='blue' style= 'font-size:20px'>شهر</td>
                <td class='blue' style= 'font-size:20px'>نام هتل</td>
                <td class='blue' style= 'font-size:20px'>شماره هتل</td>
                <td class='blue' style= 'font-size:20px'>رنک</td>
                <td class='blue' style= 'font-size:20px'>توضیحات</td>
                </thead>
            </tr>

	
			";
	
$per_page = 5;
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start = $per_page * $page;
$start = $start - $per_page;
$query = "SELECT * FROM hotelm LIMIT $start , $per_page";
$result = mysqli_query($mysqli,$query);
while ($row = mysqli_fetch_assoc($result)) {
		
           $id = $row['id'];
        $CountryName = $row['CountryName'];
        $CityName = $row['CityName'];
        $HotelName = $row['HotelName'];
        $HotelNumber = $row['HotelNumber'];
        $Ranks = $row['Ranks'];
        $Tozihat = $row['Tozihat'];
        echo "
        <tr>
            <td><input type='radio' name='operational-id' value='$id'></td>
          <td>$id</td>
            <td>$CountryName</td>
            <td>$CityName</td>
            <td>$HotelName</td>
            <td>$HotelNumber</td>
            <td>$Ranks</td>
            <td>$Tozihat</td>
            
			 
         ";
		

    }
    echo '</table>';
?>

<?php
$query2 = "SELECT COUNT(*) as total FROM hotelm";
$result2 = mysqli_query($mysqli,$query2);
$total = mysqli_fetch_assoc($result2);
$total_page = (ceil($total['total'] / $per_page));

echo '<div class="pagination">';
    $prev = $page-1;
    if($page <=1) {
        echo "
                <span> < prev </span>
            ";
    }else {
        echo "
                <span><a href=\"?page=".$prev."\"> < prev </a></span>
            ";
    }

    for($i=1;$i<=$total_page;$i++){  

        if($i==$page) {
            echo "
                    <span class='active'>$i</span>
                ";
        }
        else {
            echo "
                    <span><a href=\"?page=".$i."\">".$i."</a></span>
                ";
        }
    }
    $next = $page+1;
    if($page>=$total_page) {
        echo "
                 <span>next ></span>
            ";
    } else {
        echo "
                 <span><a href=\"?page=$next\">next ></a></span>
            ";
    }
    
echo '</div>';


?>
 <?php
        echo "
       
            <div class='modal' tabindex='-1' role='dialog' id='edit-hotel-$id'>
            <div class='modal-dialog' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
            <h5 class='modal-title'>ویرایش </h5>
           
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>
			
 
            <div class='modal-body'>
			 
         ";
		
        printEditForm($id, $mysqli);
        echo "
		 <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>خروج</button>
             <div class='dialog' id='edit-hotel-$id'  title='ویرایش'>
            </div>
        
            </div>
            </div>
            </div>
         
            </td>
            </tr>";
    }


function deleteHotel($mysqli)
{
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM hotelm where id=$id");
}

function editHotel($mysqli)
{
    $id = $_POST['id'];
    $CountryName = $_POST['CountryName'];
    $CityName = $_POST['CityName'];
    $HotelName = $_POST['HotelName'];
    $HotelNumber = $_POST['HotelNumber'];
    $Ranks = $_POST['Ranks'];
    $Tozihat = $_POST['Tozihat'];
    $update = ("update hotelm set CountryName = '$CountryName',CityName = '$CityName',HotelName = '$HotelName',
    HotelNumber = '$HotelNumber',Ranks = '$Ranks',Tozihat = '$Tozihat' where id = $id");
    $mysqli->query($update);
}



?>




