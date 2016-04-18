<?php
    require_once 'controller/mainController.php';
    $page = new mainController();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php require_once 'inc/_head.php'; ?>
<body>
    
    <?php
        require_once 'inc/_header.php';
     ?>

    <?php $page->updatePage(); ?>

    <?php require_once 'inc/_footer.php'; ?>

</body>
</html> 