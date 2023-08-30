<?php

require 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\IOFactory;

$inputFileName = 'file.xls';
$spreadsheet = IOFactory::load($inputFileName);

// Select the active sheet
$sheet = $spreadsheet->getActiveSheet();

// Get the highest row and column numbers used in the worksheet
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

// Loop through each row of the worksheet
$arr = [];
echo '<pre>';
for ($row = 1; $row <= $highestRow; $row++) {
    // Read cell values
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    
    foreach($rowData as $v){

        array_push($arr, $v);
    }
}

?>

<!-- Database Data insert code commented -->
<?php
   //  $servername = "localhost";
   //  $username = "root";
   //  $password = "";
   //  $dbname = "demo_db";
   // $status = 0;

   // $stmt->bind_param($value[1], $value[2], $value[3], $value[4], $value[5], $value[6], $value[7]);
   //  try {
   //          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   //        // set the PDO error mode to exception
   //        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
   //        $sql = "INSERT INTO excel_info (first_name, last_name, gender, country, age, date, uid)
   //        VALUES ('$value[1]', '$value[2]', '$value[3]', '$value[4]', '$value[5]', '$value[6]'')";
   //        // use exec() because no results are returned
   //        $conn->exec($sql);
   //  } catch(PDOException $e) {
   //    echo $sql . "<br>" . $e->getMessage();
   //  }

   //  $conn = null;
 ?>

<table style="width: 100%">
    <?php 
foreach ($arr as $key => $value) {
    if ($key == 0) { ?>
        <tr style="border: 1px solid black; background-color: black; color: white;text-align: center;">
            <th>#</th>
            <th><?= $value[1]?></th>
            <th><?= $value[2]?></th>
            <th><?= $value[3]?></th>
            <th><?= $value[4]?></th>
            <th><?= $value[5]?></th>
            <th><?= $value[6]?></th>
        </tr>
 <?php   } else {
  ?>
        <tr style="border: 1px solid black; text-align:center;">
            <td><?= $key ?></td>
            <td><?= $value[1]?></td>
            <td><?= $value[2]?></td>
            <td><?= $value[3]?></td>
            <td><?= $value[4]?></td>
            <td><?= $value[5]?></td>
            <td><?= $value[6]?></td>
        </tr>
    <?php }
}
    ?>
        
</table>