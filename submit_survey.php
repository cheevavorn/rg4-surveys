<?php
    require('./libs/config.php');
    $obj = $_POST['answer'];
    $office_id = $obj['office_id'];
    $insert_response = "INSERT INTO TBL_RESPONSE_HEADER(office_id, response_timestamp) ".
                        "VALUES($office_id, NOW())";
    mysqli_query($conn, $insert_response) or die(mysqli_error($conn));
    $response_id = mysqli_insert_id($conn);

    foreach($obj['answer_list'] as $answer){
        $question_id = $answer['question_id']?$answer['question_id']:NULL;
        $answer_id = $answer['answer_id']?$answer['answer_id']:NULL;
        $extra_field = $answer['extra_field']?$answer['extra_field']:NULL;
        
        $insert_answer = "INSERT INTO TBL_RESPONSE_LINEITEM(response_id, question_id, option_id, sub_answer) ".
                        "VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_answer);
        $stmt->bind_param("iiis",$response_id, $question_id, $answer_id, $extra_field);
        $stmt->execute() or die(mysqli_error($conn));
    }
