<?php
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $res = [
            'status' => true,
            'data'=>$data['search'] 
    ];

    echo json_encode($res);