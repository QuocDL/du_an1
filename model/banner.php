<?php 
function selectAll_banner()
{
    $sql = "SELECT * FROM banner ORDER BY banner_id";   
    return pdo_query($sql);
}
?>