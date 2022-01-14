<?php

function numericalOrder($index){
    $currPage = (isset($_REQUEST['page']) && $_REQUEST['page']) ?  $_REQUEST['page'] : 1;
    return ($index + 1) * $currPage;
}
