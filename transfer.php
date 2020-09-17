 <?php
    require_once('db_connect.php'); //connect to database

    $name = $_GET['name'];
    $query = "select * from users where name='" . $name . "'";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_array($result);
    
    $query = "select name from users where name<>'" . $row['name'] . "'";
    $result = mysqli_query($link,$query);

    
?>

<html>
	<head>
        <title>Transfer Credits</title>
		
		<style>
		body
{
background-image:url('s2.jpg');
background-repeat:no-repeat;
background-size:100%;
color:white;
}
table
{
background-color:rgba(0,225,225,0.5);
color:white;
border-radius:5px;

box-shadow:2px 2px 2px white;
}

h1{
	color:white;
	font-style:italic;
	font-family:Times New Roman;
	text-decoration:underline;
}
a{
	color:white;
}
a:hover
{
	color:blue;
	height:100px;
}
.c{
	border-radius:6px;
	background-color:cyan;
	
}
		</style>
    </head>

    <body>
	<center>
	<h1>Transfer Credits</h1>
	<br><br>
        <a href="index.php">&lt; Back</a>
        <br>
		<table cellpadding="15px">	
       <tr> <td>Hello <?php echo $row['name'] ?>,</td></tr>
        <br>
        <tr><td>Your credits are:<?php echo $row['credit'] ?></td></tr>
        <br><br>
</table><br>
        <form action="#" method="post">
            <fieldset>
                <legend>Transfer details</legend>
                Credits: <input type="number" name="credits_tr" class="c" min =0 value=1 required>
                <br><br>
                Transfer to: <select name="to_user" class="c" required>
                    <option value =""></option>

                <?php
                        while($tname = mysqli_fetch_array($result)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

                </select>
                <br>
            </fieldset> 
            <br>
            <input type="submit" name="transfer" class ="c" value="Transfer">
        </form>
		
		<?php
		
		if(isset($_POST['transfer'])) {
        if($_POST['credits_tr'] > $row['credit']) {
            echo "Credits transferred cannot be more than " . $row['credit'] . "<br>";
        }

        else {
            $query = "update users set credit=credit-" . $_POST['credits_tr'] . " where name='" . $row['name'] . "'";
            mysqli_query($link,$query);

            $query = "update users set credit=credit+" . $_POST['credits_tr'] . " where name='" . $_POST['to_user'] . "'";
            mysqli_query($link,$query);

            $query = "insert into transfers values('" . $row['name'] . "','" . $_POST['to_user'] . "'," . $_POST['credits_tr'] . ")";
            mysqli_query($link,$query);

            header("Location: index.php");
        }
    }
	?>
		</center>
    </body>
</html>