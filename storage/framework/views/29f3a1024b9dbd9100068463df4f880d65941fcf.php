
<!DOCTYPE html>
<html>
<head>
<style>


#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
 
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
 
  text-align: left;
  background-color: #168DEE;
  color: white;
}
</style>
</head>
<body onload="window.print()">

<h2  style="text-align:center;" ><?php echo e($coupoun_name); ?></h2>

<table id="customers">
  <tr>

  
    
  </tr>

  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
  
  <td style="text-align:center;"> <?php echo QrCode::size(250)->generate($row->code);; ?> <h2 style="text-align:center;"><?php echo e($row->code); ?> </h2> </td>                
  </tr >


  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</table>

</body>
</html>
