<?php
    require_once('db_connect.php'); //connect to database

    $query = "select * from users";
    $result = mysqli_query($link,$query);

?>

<html>
	<head>
        <title>Credit Management</title>
		<style>
		body
{
background-image:url('s24.jpg');
background-repeat:no-repeat;
background-size:100%;
}
table
{
background-color:rgba(0,0,0,0.5);
color:white;
margin-top:25px;
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
		</style>
    </head>

    <body>
<center>  
<h1>View Users</h1>      
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<a href="index.html"> >>Back</a>
<table cellpadding="15px">
<tr>
           <th>S No.</th>
    				<th>Name</th>
    				<th>Email</th>
    				<th>Credits</th>

</tr>
</center>


			</div>
			
            <!--fetch and display data from MySQL-->
            <?php
                $i=1;

                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["credit"] . "</td>";
                    echo "<td><a href=transfer.php?name=" . $row['name'] . ">Select</a><td>";
                    echo "</tr>";
                    ++$i;
                }
            ?>

        </table>
    </body>
</html>