<?php
include "../control.php";

// ----------------------------------------------------------
// Check for a login and fail out immediately if not present!
// ----------------------------------------------------------
if($userid != "")
{
   $tlid   = $_GET['tlid'];
   $debug  = $_GET['debug'];
   
   if($memtype=="FREE") $earn = $freetrafficearn;
   else $earn = $protrafficearn;

   if ( $debug )
   {
      echo "<!-- userid: $userid -->\n";
      echo "<!-- tlid: $tlid -->\n";
      echo "<!-- earn: $earn -->\n";
   }

   // Store the fact this item has been viewed
   // ----------------------------------------
   $sql  = "SELECT count(*) as qty\n";
   $sql .= "FROM   tlviews\n";
   $sql .= "WHERE  userid = '" . $userid . "'\n";
   $sql .= "AND    tlid   = '" . $tlid   . "'\n";
   $res  = mysql_query($sql) or die("Query failed");
   $row  = mysql_fetch_assoc($res);

   if ( $row['qty']==0 )
   {
   
		assignpoints($referid, $earn);
   
      $query2 = "insert into tlviews set userid='".$userid."', tlid=".$tlid;
      $result2 = mysql_query ($query2) or die ("Query failed");

      // Give points to the user
      // -----------------------
      $query4 = "update members set points=points+".$earn." where userid='".$userid."'";
      $result4 = mysql_query ($query4) or die ("Query failed");
   }
}

// This is where we can output GIF image data
// ------------------------------------------
;

exit;

?>