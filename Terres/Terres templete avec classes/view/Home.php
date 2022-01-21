<?php
/**
 * @file      lost.php
 * @brief     This view is designed to inform the user when he tries to navigate to an resource who doesn't exist
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */

ob_start();
$title = 'Terres. Register';
?>
<div class="container-login100">


<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
    
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <div class="content">
                <div id="gallery">
                    <figure>
                        <header class="heading">Gallery Title Goes Here</header>
                        <ul class="nospace clear">

                            <?php if (isset($_SESSION['picture'])): ?>
                            <?php foreach ($_SESSION['picture']->GetPicture() as $picture) :?>
                            <li class="one_quarter first"><a href="#"><img src="<?= $picture->GetImgPath(); ?>" alt="IMG"></a></li>
                            <?php endforeach ?>
                            <?php endif; ?>

                        </ul>
                        <figcaption>Gallery Description Goes Here</figcaption>
                    </figure>
                </div>
                
                <nav class="pagination">
                    <ul>
                        <li><a href="#">&laquo; Previous</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><strong>&hellip;</strong></li>
                        <li><a href="#">6</a></li>
                        <li class="current"><strong>7</strong></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><strong>&hellip;</strong></li>
                        <li><a href="#">14</a></li>
                        <li><a href="#">15</a></li>
                        <li><a href="#">Next &raquo;</a></li>
                    </ul>
                </nav>
                </div>
            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>
    
</div>
</div>
<?php
$content = ob_get_clean();
require 'gabarit.php';
?>