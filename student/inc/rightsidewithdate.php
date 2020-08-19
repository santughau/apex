  <h5 class="bg-warning text-center">Your Performence</h5>
            <table class="table table-bordered table-condensed ">
                <thead class="thead-dark">
                        <tr class="info">
                            <th>Exam</th>
                            <th>Marks</th>
                            <th>Date</th>
                        </tr>
                </thead>
                <tbody>
                    
        <?php
        $get_result = "SELECT * FROM result where user_id = '$user_id' ORDER BY result_id DESC ";
        $run_result = mysqli_query($con,$get_result);
        while($row_result=mysqli_fetch_array($run_result)){

        $result_id = $row_result['result_id'];
        $user_id = $row_result['user_id'];
        $exam_name = $row_result['exam_name'];
        $percent = $row_result['percent'];
        $exam_date = $row_result['exam_date'];
        ?>
                        <tr>
                            <th><?php echo $exam_name;?></th>
                            <th><?php echo $percent;?></th>
                            <th><?php echo $exam_date;?></th>
                        </tr>
        <?php } ?>
                        
                </tbody>
            </table>