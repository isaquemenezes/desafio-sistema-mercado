<?php
    $validate=new Classes\ClassValidate();

    $validate->validateFields($_POST);
    
    echo $validate->validateFinalRegPersonalFin($arrVarPerson);

  