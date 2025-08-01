<?php
require_once "connection.php";
require_once "../../includes/functions.php";

session_start();
if (isset($_GET['operation']) && $_GET['operation'] == 'assign-teacher-to-course') {

       $semId = $_POST['semId'];

       $coursesResult = getCourses($semId);
       try{
              foreach($coursesResult as $course){
                     $cid = $course['cid'];

                     $postKey = str_replace('.', '_', $cid);
                     $tid = $_POST[$postKey] ?? null;
                     
                     if(!empty($tid)){
                            $sql = "UPDATE sem{$semId}courses set tid = '$tid' where cid = '$cid'";
                            $conn->query($sql);
                     }
              }
              header("location: ../courses.php?view-courses-semId=$semId&success=Teachers Assigned Successfully.");
              exit();
       }catch(Exception $e){
              exit("<br> <b>Error:</b>".$e->getMessage());
       }

}else if (isset($_GET['operation']) && $_GET['operation'] == 'edit-course-schedule') {

       $semId = $_POST['semId'];

       $coursesResult = getCourses($semId);
               try{
                     foreach($coursesResult as $course){
                            $cid = $course['cid'];

                            $postKey = str_replace('.', '_', $cid);
                            $fromKey = $postKey."_from";
                            $toKey = $postKey."_to";

                            $from = $_POST[$fromKey] ?? null;
                            $to = $_POST[$toKey] ?? null;
                            
                            if(!empty($from) && !empty($to)){
                                   $sql = "UPDATE sem{$semId}courses set
                                          from_time = '$from',
                                          to_time = '$to'
                                          where cid = '$cid'";
                                   $conn->query($sql);
                            }
                                   
                            if(!empty($from)){
                                   $sql = "UPDATE sem{$semId}courses set
                                          from_time = '$from'
                                          where cid = '$cid'";
                                   $conn->query($sql);
                            }
                            if(!empty($to)){
                                   $sql = "UPDATE sem{$semId}courses set
                                          to_time = '$to'
                                          where cid = '$cid'";
                                   $conn->query($sql); 
                            }
                     }
     
                     header("location: ../courses.php?view-course-schedule-semId=$semId&success= Course Schedule Updated Successfully.");
                     exit();

              }catch(Exception $e){
                     exit("<br> <b>Error:</b>".$e->getMessage());
              }
}



