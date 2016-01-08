<!DOCTYPE html>

<head>
<title>ProCD- search</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/stylesheet1.css" type="text/css" media="screen">

</head>
    <body>
    <header>
  <div class="main">
    <br/><br/>
        &nbsp;&nbsp;<h3>Pro<a>CD</a> <strong class="slog"></h3><br />
        <h2><marquee>Prostate cancer Database</marquee></strong> </h2>  
      
      <div style="height:80px">
        <nav>
          <ul class="menu">
            <li><a href="home.php">Home Page</a></li>
            <li><a href="Documentation.php">Documentation</a></li>
            <li class="active"><a href="Search.php">Search</a></li>
            <li><a href="futurework.php">Future Work</a></li>
            <li class="last-item"><a href="contacts.php">Contact</a></li>
          </ul>
        </nav>
          </div>   
      <div style=" height:Auto">          
                 
             <div style="background-color:lightgray; margin:-28px 100px 0px 0px;width:100%; color:black;font-family:'Times New Roman'">
                
                <p style="color:black"><br /><br />
                 
                 <span style="font-size: 10pt; font-size:large; font-family: 'Courier New';font-weight:800; color:darkgreen;margin-left:-10px;">&nbsp;
                    Select any one :</span><br /></p>
                  <?php 
				 
				  error_reporting(0);				 
				 if (isset($_POST['Search']))
				 {
				   $sessionid = isset ($_POST['Search']) ? $_POST['Search'] : "";
				   $radiobuttonvalue = isset ($_POST['rad']) ? $_POST['rad'] : ""; 
				   
				  }
					?>
				  
                  <form style="font-size: 10pt;  font-family: 'Courier New'; color:black;font-weight:800;margin-left:15px;line-height:25px" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <input type="radio" id="a" name="rad" value="EntryId1" <?php if($radiobuttonvalue == "EntryId1") { echo 'checked="checked"';} ?>>EntryId <font color="blue">(get Vocab information)</font>
                  <br />
                  <input type="radio" id="b" name="rad" value="EntryId2" <?php if($radiobuttonvalue == "EntryId2") { echo 'checked="checked"';} ?> >EntryId <font color="blue">(get disease name, protein name)</font>
                  <br />
                  <input type="radio" id="c" name="rad" value="UniprotId" <?php if($radiobuttonvalue == "UniprotId") { echo 'checked="checked"';} ?>>UniprotId <font color="blue">(get Gene name, Dna Seq)</font>
                  <br />
                  <input type="radio" id="d" name="rad" value="Genename" <?php if($radiobuttonvalue == "Genename") { echo 'checked="checked"';} ?>>Genename <font color="blue">(get Gene information)</font>
                  <br />
                  <input type="radio" id="e" name="rad" value="EntryId3" <?php if($radiobuttonvalue == "EntryId3") { echo 'checked="checked"';} ?>>EntryId <font color="blue">(get HTML, PubMed information)</font>
                 <br /><br /><br />
                 <input style="height:30px; width: 150px; border:black 1px solid;font-size:16px;padding-left:7px" value="<?PHP print $sessionid ; ?>" type="text" name="Search" >
                 
                <input style="height:30px" type="submit" value="Go">  <a href="ids.php" target="_blank">Click here</a> if you dont have any value to search.
                  </form>
               
				 
				 <?php 
				 
				 $id='';
				 $query='';
				  //error_reporting(0);
				
				 if (isset($_POST['Search']))
				 {
						 if (isset($_POST['Search']))
				 
					$id=$_POST['Search'];
				
					echo "<table class="."table1>";
				
					$connection = mysqli_connect("localhost", "root", "root597", "mohammad_prostatecancer");
					
					if (isset($_POST['Search']) && $_POST['rad'] == 'EntryId1')
					{
					$query= "call DiseaseVocab(".'"'.$id.'")';
					
					}
					if (isset($_POST['Search']) && $_POST['rad'] == 'EntryId2')
					{
					$query= "call DiseaseProtein(".'"'.$id.'")';
					}
					if (isset($_POST['Search']) && $_POST['rad'] == 'UniprotId')
					{
					$query= "call GetGene(".'"'.$id.'")';
					
					}
					if (isset($_POST['Search']) && $_POST['rad'] == 'Genename')
					{
					$query= "call GetUniGene(".'"'.$id.'")';
					
					}
					if (isset($_POST['Search']) && $_POST['rad'] == 'EntryId3')
					{
					$query= "call GetPubmed_html(".'"'.$id.'")';
					
					}
					
					$result = mysqli_query($connection, $query) or die("<br /> <font color="."red"."> &nbsp&nbsp Entered value is incorrect or you have not selected any option.</font>");

					echo "<tbody>";
					
					$check = mysqli_data_seek($result, 0); 
					$rownew = mysqli_fetch_assoc($result);
					if ($rownew!=Null)
					{
					foreach($rownew as $k => $v ) 
					{       
					echo "<th>".$k."</th>";
					}
					$check = mysqli_data_seek($result, 0); 
					
					while ($rownew = mysqli_fetch_assoc($result))
					{
									
						echo "<tr>";
						foreach($rownew as $k => $v)
							{
								echo "<td>".$v."</td>";
							}
						echo "</tr>"."<br>";
					} 
					echo "</tbody></table>";
					}
					
					else
					{
					echo "<br /> <font color="."red"."> &nbsp&nbsp incorrect value entered in search box or no value entered.</font>";
					}
				}
					
					?>
 
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                 <p style="color: white; background-color: black; border: black 2px solid;height:30px; width: 982px;font-family:'Times New Roman'">   
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  copyright@ProCD</p>   

           		  </div>      
               
          </div>
      </div>
        </header>
        </body>

</html>