<?php require_once "../includes/header.php"; ?>
<?php require_once "../includes/functions.php"; ?>


<!-- Code for Viewing Fees -->
<div class="main center-fdct">
       <?php
       $regdNo = $_SESSION['regdNo'];
       $student = getStudent($regdNo);
       $data = $student->fetch_assoc();

       try {
              $sql = "SELECT * FROM student JOIN fees ON student.regdNo = fees.regdNo WHERE student.regdNo = '$regdNo'";
              $result = $conn->query($sql);
       } catch (Exception $e) {
              die("<br><b>Error:</b> " . $e->getMessage());
       }
       ?>
       <h1 class="heading">View Fees - <?= $data['batch'] ?> Batch</h1>
       <div class="box-cover">
              <table class="smaller-table">
                     <thead>
                            <tr>
                                   <th>Regd. No.</th>
                                   <th>Name</th>
                                   <th>1st Sem</th>
                                   <th>2nd Sem</th>
                                   <th>3rd Sem</th>
                                   <th>4th Sem</th>
                                   <th>5th Sem</th>
                                   <th>6th Sem</th>
                                   <th>7th Sem</th>
                                   <th>8th Sem</th>
                            </tr>
                     </thead>
                     <tbody>
                            <?php
                            if (!$result->num_rows == 0) {
                                   while ($row = $result->fetch_assoc())   {
                            ?>
                                          <tr>
                                                 <td><?= $row['regdNo'] ?></td>
                                                 <td><?= $row['name'] ?></td>
                                                 <td><?= $row['sem1'] ?></td>
                                                 <td><?= $row['sem2'] ?></td>
                                                 <td><?= $row['sem3'] ?></td>
                                                 <td><?= $row['sem4'] ?></td>
                                                 <td><?= $row['sem5'] ?></td>
                                                 <td><?= $row['sem6'] ?></td>
                                                 <td><?= $row['sem7'] ?></td>
                                                 <td><?= $row['sem8'] ?></td>
                                          </tr>
                            <?php
                                   }
                            }
                            ?>
                     </tbody>
              </table>
       </div>
</div>

<?php require_once "../includes/footer.php"; ?>