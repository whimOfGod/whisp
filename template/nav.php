
<nav class="myNav">   
        <ul>
            <li><a href="#"># Whisphome</a></li>
            <li><a href="#"># message</a></li>
            <li><a href="#"># notification</a></li>
            <li><a href="#"># setting</a></li>
            <li><a href="inscription.php">connectez-vous ?</a></li>
            <li><a href="template/disconnect.php">disconnect </a></li>
                <?php if (isset($_SESSION['s_users_id'])) { ?>
                    <div class="user-avatar">
                        <?php if ($_SESSION['s_avatar']) { ?>
                            <img src="images/avatar/<?php echo $_SESSION['s_avatar']; ?>" width=50 alt="Avatar">
                        <?php } else { ?>
                            <img src="images/avatar/default-avatar.png" alt="Default Avatar">
                        <?php } ?>
                    </div>
                <?php } ?>
        </ul>
            
</nav>