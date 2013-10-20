<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Person Information</title>
<style type="text/css">
<!--
body {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 100%;
	background-color: #CCC;
}
#container {
	background: #fff;
	margin: 0 auto;
	text-align: center;
	width: 50em;
}
#header {
	background-color: #6F9;
	height: 60px;
}
#header ul {
	margin: 0px;
	padding: 0px;
	list-style-type: none;
	height: 60px;
	display: inline;
}

#header ul #name   {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	color: #000;
	text-align: center;
}
#header ul #date {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 14px;
	color: #000;
	text-align: center;
}
#leftside {
	background-color: #FFF;
	width: 25em;
	margin: 0px;
	padding: 0px;
	text-align: center;
	float: left;
}
#leftside ul {
	margin: 0px;
	padding: 0px;
	list-style-type: none;
	display: inline;
}
#leftside ul #name   {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	color: #000;
	text-align: center;
}
#leftside ul #name a {
	color: #693;
	text-decoration: none;
}
#leftside ul #name a:hover {
	color: #633;
}
#rightside {
	background-color: #FFF;
	width: 25em;
	margin: 0px;
	padding: 0px;
	text-align: center;
	float: left;
}
#rightside ul {
	margin: 0px;
	padding: 0px;
	list-style-type: none;
	display: inline;
}
#rightside ul #name   {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	color: #000;
	text-align: center;
}
#rightside ul #name a {
	color: #693;
	text-decoration: none;
}
#rightside ul #name a:hover {
	color: #633;
}
#rightside ul #date {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 14px;
	color: #000;
	text-align: center;
}
#footer {
	background-color: #CF9;
	clear: both;
	height: 50px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: small;
	text-align: center;
	margin: 0px;
	padding: 0px;
}
#footer a  {
	color: #663;
	text-decoration: none;
}
#footer a:hover {
	color: #CC6;
	text-decoration: none;
}
-->
</style>
</head>
<script type="text/javascript">
function eventWindow(url) {
    event_popupWin = window.open(url, null, "resizable=yes,scrollbars=yes,toolbar=no,width=1000,height=600");
	event_popupWin.opener = self;
}
</script>
<body>
<?php
   // include("filename to connect to MySQL database");
   // login();
   $id = $_GET['person'];
   $query1 = "Select * from person where id = $id";
   $result1 = mysql_query($query1);
   while($row1 = mysql_fetch_array($result1)) {
	   $name = $row1['fname']." ".$row1['lname'];
	   $direct = $row1['direct'];
	   $level = $row1['level'];
	   $side = $row1['side'];
	   $birthdate = $row1['birthdate'];
	   if ($birthdate == "1999-11-30" || $birthdate == "0000-00-00") {
		  $birthdate1 = "";
		  $birthplace = "";
	   }
	   else {
		  if (substr($birthdate,5,5) == "01-01")
   	         $birthdate1 = "Born: ".date("Y",mktime(0,0,0,substr($birthdate,5,2),substr($birthdate,8,2),substr($birthdate,0,4)));
		  else
   	         $birthdate1 = "Born: ".date("F j, Y",mktime(0,0,0,substr($birthdate,5,2),substr($birthdate,8,2),substr($birthdate,0,4)));
		  $birthplace = $row1['birthplace'];
	   }
	   $deathdate = $row1['deathdate'];
 	   if ($deathdate == "1999-11-30" || $deathdate == "0000-00-00") {
	      $deathdate1 = "";
		  $deathplace = "";
	   }
	   else {
		  if (substr($deathdate,5,5) == "01-01")
   	         $deathdate1 = "Died: ".date("Y",mktime(0,0,0,substr($deathdate,5,2),substr($deathdate,8,2),substr($deathdate,0,4)));
		  else
		     $deathdate1 = "Died: ".date("F j, Y",mktime(0,0,0,substr($deathdate,5,2),substr($deathdate,8,2),substr($deathdate,0,4)));
		  $deathplace = $row1['deathplace'];
	   }
       $fatherid = $row1['fatherid'];
	   if ($fatherid > 0)
		  {
		   $queryf = "Select id, fname, lname from person where id = $fatherid";
           $resultf = mysql_query($queryf);
           while($rowf = mysql_fetch_array($resultf)) {
			 $father = $rowf['fname']." ".$rowf['lname'];
			 }
		  }
       $motherid = $row1['motherid'];
	   if ($motherid > 0)
		  {
		   $querym = "Select id, fname, lname from person where id = $motherid";
           $resultm = mysql_query($querym);
           while($rowm = mysql_fetch_array($resultm)) {
			 $mother = $rowm['fname']." ".$rowm['lname'];
			 }
		  }
?>	   
    <div id="container">
      <div id="header">
         <ul>
           <li id="name"><?php echo $name; ?>
<?php           
           if ($direct == "Y") {
			  switch ($level) {
				 case 1:
				   if ($side == "F")
				      echo " (My Father)";
				   else
				      echo " (My Mother)";
				   break;
				 case 2:
				   echo " (My Grandparent)";
				   break;
				 case 3:
				   echo " (My Great Grandparent)";
				   break;
				 case 4:
				   echo " (My Great Great Grandparent)";
				   break;
				 case 5:
				   echo " (My Great Great Great Grandparent)";
				   break;
				 case 6:
				   echo " (My Great Great Great Great Grandparent)";
				   break;
				 case 7:
				   echo " (My Great Great Great Great Great Grandparent)";
				   break;
			  }
		   }
?>           
           </li>
           <li id="date"><?php echo $birthdate1; ?>  <?php echo $birthplace ?></li>
           <li id="date"><?php echo $deathdate1; ?>  <?php echo $deathplace ?></li>
         </ul>
      </div>
      <div id="leftside">
         <ul>
<?php
           $parents = false;
		   if ($fatherid > 0 && $motherid > 0) {
			  $parents = true;
?>           
              <li id="name">Parents</li><br />
              <li id="name"><a href="personinfo.php?person=<?php echo $fatherid; ?>"><?php echo $father; ?></a></li>
              <li id="name"><a href="personinfo.php?person=<?php echo $motherid; ?>"><?php echo $mother; ?></a></li>
<?php
		   }
		   $siblings = false;
		   $queryc = "SELECT count(id) FROM person where (fatherid = $fatherid and fatherid > 0) or (motherid = $motherid and motherid > 0)";   
           $resultc = mysql_query($queryc);   
           $rowc = mysql_fetch_array($resultc);
           if ($rowc[0] > 1) {
		   //if ($fatherid > 0 || $motherid > 0) {
			   if ($parents) {
?>
                  <br /><hr /><br />
<?php
		   }
?>
              <li id="name">Siblings</li><br />
<?php
		      $siblings = true;
			  $querysi = "SELECT * FROM person where fatherid = $fatherid or motherid = $motherid order by birthdate";   
              $resultsi = mysql_query($querysi);   
              while($rowsi = mysql_fetch_array($resultsi, MYSQL_ASSOC)) {  
			     $siid = $rowsi['id'];
			     if ($siid != $id) {
			        $siname = $rowsi['fname'];
					$sdirect = $rowsi['direct'];
			        $sibirthdate = $rowsi['birthdate'];
	                if ($sibirthdate == "1999-11-30" || $sibirthdate == "0000-00-00") 
		               $sibirthdate1 = "";
	                else	
   	                   $sibirthdate1 = substr($sibirthdate,0,4);
	                $sideathdate = $rowsi['deathdate'];
 	                if ($sideathdate == "1999-11-30" || $sideathdate == "0000-00-00") 
	                   $sideathdate1 = "";
	                else
		               $sideathdate1 = substr($sideathdate,0,4);
?>	
                    <li id="name">
<?php                  if ($sdirect == "Y")
                          echo "<b>";
?>
                       <a href="personinfo.php?person=<?php echo $siid; ?>"><?php echo $siname; ?></a> (<?php echo $sibirthdate1; ?>-<?php echo $sideathdate1; ?>)
<?php                  if ($sdirect == "Y")
                          echo "</b>";
?>                       
                    </li>
<?php		   
			     }
			  }
		   }
		   $documents = false;
		   $query = "SELECT count(id) FROM document where personid = $id";   
           $result = mysql_query($query);   
           $row = mysql_fetch_array($result);
           if ($row[0] > 0)
		      {
?>			   
              <br /><hr /><br />
              <li id="name">Documents</li><br />
<?php           
			  $documents = true;
			  $queryd = "SELECT * FROM document where personid = $id";   
              $resultd = mysql_query($queryd);   
              while($rowd = mysql_fetch_array($resultd, MYSQL_ASSOC)) { 
				 $docid = $rowd['id'];
				 $title = $rowd['title'];
?>			   
                 <li id="name"><a href="javascript:eventWindow('document.php?id=<?php echo $docid; ?>');"><?php echo $title; ?></a></li><br />
<?php 		   
			  }
		   }
           
           if ($parents || $siblings || $documents) {
?>

              <br /><hr />
<?php      }?>
           <br />
           <li id="name"><a href="chart.php?fname=<?php echo $id; ?>">Go to <?php echo $name; ?>'s ancestry chart</a></li><br />
         </ul>
      </div> 
      <div id="rightside">
         <ul>
<?php
	     $querymc = "SELECT count(id) FROM marriage where husbandid = $id or wifeid = $id";   
         $resultmc = mysql_query($querymc);   
         $rowmc = mysql_fetch_array($resultmc);
           if ($rowmc[0] != 0)
		      {
?>				  
           <li id="name">Marriage(s)</li>
<?php
		   $marriage = 0;
		   $querym = "SELECT * FROM marriage where husbandid = $id or wifeid = $id ORDER BY date";   
           $resultm = mysql_query($querym);   
           while($rowm = mysql_fetch_array($resultm, MYSQL_ASSOC)) {
			  if ($marriage == 0)
			     $marriage = 1;
			  else
			     echo "<br><hr>";
              if ($id == $rowm['husbandid']) {
				 $person = "M";
		         $personid = $rowm['husbandid'];
			     $spouseid = $rowm['wifeid'];
		      }
		      else {
				 $person = "F"; 
		         $personid = $rowm['wifeid'];
			     $spouseid = $rowm['husbandid'];
		      }
			  $marrieddate = $rowm['date'];
			  $marriedplace = $rowm['place'];
 	          if ($marrieddate == "1999-11-30" || $marrieddate == "0000-00-00") {
	            $marrieddate1 = "";
		        $marriedplace = "";
	          }
	          else {
		        $marrieddate1 = "Married: ".date("F j, Y",mktime(0,0,0,substr($marrieddate,5,2),substr($marrieddate,8,2),substr($marrieddate,0,4)));
	          }
 			  $divorcedate = $rowm['divorcedate'];
 	          if ($divorcedate == "1999-11-30" || $marrieddate == "0000-00-00")
	            $divorcedate1 = "";
	          else 
		        $divorcedate1 = "Divorced: ".date("F j, Y",mktime(0,0,0,substr($divorcedate,5,2),substr($divorcedate,8,2),substr($divorcedate,0,4)));
		      $querys = "Select id, fname, lname from person where id = $spouseid";
              $results = mysql_query($querys);
              $rows = mysql_fetch_array($results, MYSQL_ASSOC);  
			  $spouse = $rows['fname']." ".$rows['lname'];
?>
           <br />
           <li id="name"><a href="personinfo.php?person=<?php echo $spouseid; ?>"><?php echo $spouse; ?></a></li>
           <li id="date"><?php echo $marrieddate1; ?>  <?php echo $marriedplace; ?></li>
           <li id="date"><?php echo $divorcedate1; ?></li><br />
           <li id="name">Children</li>
<?php
		   if ($person == "M") 
			   $queryc = "Select * from person where fatherid = $personid and motherid = $spouseid order by birthdate";
		   else
   			   $queryc = "Select * from person where fatherid = $spouseid and motherid = $personid order by birthdate";
           $resultc = mysql_query($queryc);   
           while($rowc = mysql_fetch_array($resultc, MYSQL_ASSOC)) {
			   $cid = $rowc['id'];
			   $cname = $rowc['fname'];
			   $cdirect = $rowc['direct'];
			   $cbirthdate = $rowc['birthdate'];
	           if ($cbirthdate == "1999-11-30" || $cbirthdate == "0000-00-00") 
		          $cbirthdate1 = "";
	           else	
   	              $cbirthdate1 = substr($cbirthdate,0,4);
	           $cdeathdate = $rowc['deathdate'];
 	           if ($cdeathdate == "1999-11-30" || $cdeathdate == "0000-00-00") 
	              $cdeathdate1 = "";
	           else
		          $cdeathdate1 = substr($cdeathdate,0,4);
?>	
               <li id="name">
<?php             if ($cdirect == "Y")
                     echo "<b>";
?>               
                  <a href="personinfo.php?person=<?php echo $cid; ?>"><?php echo $cname; ?></a> (<?php echo $cbirthdate1; ?>-<?php echo $cdeathdate1; ?>)
<?php             if ($cdirect == "Y")
                     echo "</b>";
?>              
               </li>
<?php
		       }
	          }
			 }
?>		   
         </ul><br />
      </div>
      <div id="footer">
      <br /><a href="http://www.kcorina.com/familymain.php">Family Tree Home</a> | &copy; 2009 <a href="http://www.kcorina.com">KCorina.com</a>
      </div>   
</div>    
           
<?php
   }
?>   
</body>
</html>
