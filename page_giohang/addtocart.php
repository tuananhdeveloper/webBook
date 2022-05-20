<?php 
if (!empty($_GET)) {
    if(isset($_GET[ADD_TO_CART])) {
        $productId = $_GET[PARA_PRODUCT_ID];
        $loginId = $_SESSION[S_USERNAME];
        $accountId = $_SESSION[S_ACCOUNT_ID];
        
    }
}
?>