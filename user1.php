<?php
include "conn1.php";
echo  "<br>";
$q2="SELECT count(id) as total from users";
$result2=mysqli_query($con,$q2);
$row2=mysqli_fetch_object($result2);
echo "Total rows in Users Table:";
echo $total=$row2->total, "<br>";
  if(!isset($_GET['limit']))
     $limit=10;
  else
      $limit=$_GET['limit'];
   
  if(!isset ($_GET['offset']))
        $offset=0;   
   else
        $offset=$_GET['offset'];
echo "Record show per page:";         
echo $pages=(int)($total/10);
$q="SELECT * FROM `users` LIMIT 0,10";
$result=mysqli_query($con,$q);
if(mysqli_num_rows($result)>0) 
{
    ?>
    <table width="100%" border="1">
     <tr>
       <th>id</th>
       <th>first_name</th>
       <th>last_name</th>
      </tr> 
    <?php
      while($row=mysqli_fetch_object($result))
      {
          ?>
           <tr>
             <td><?php echo $row->id;?></td>
             <td><?php echo $row->first_name;?></td>
             <td><?php echo $row->last_name;?></td>
         </tr>
         <?php
      }
      ?>
      </table>
      <?php
      for($i=0;$i<$pages;$i++)
      {
          $offset=$limit*$i;
          ?>
          <a href="user1.php?offset=<?php echo $offset;?>&limit=<?php echo $limit;?>"><?php echo $i+1;?></a>
          <?php
      }
}
?>


        