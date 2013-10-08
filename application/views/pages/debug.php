<!--<p>Hello, World!!!</p>
<script type="text/javascript">alert('XSS Code Goes Here');</script>-->


<?php
$array = array(
    'item one',
    'item two',
    array(
        'three' =>'item three'
    )
);
//echo Kohana::debug($array);
//exit();
$message = new Model_Message;
echo Kohana::debug($array, $message->find_all());
exit();