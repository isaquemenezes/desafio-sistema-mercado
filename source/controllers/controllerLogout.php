<?php
    $sesssion=new Classes\ClassSession();
    $sesssion->destructSessions();

    echo"<script>
            alert('Deslogado com sucesso!'); 
            window.location.href='".DIRPAGE."';
        </script>
    ";