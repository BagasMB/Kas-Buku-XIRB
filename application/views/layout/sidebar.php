    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <div class="sidebar-brand">
                    <span class="align-middle"><i class="fa fa-code me-3"></i>Skandakra</span>
                </div>

                <?php
                $level_id = $this->session->userdata('level');

                $queryMenu = "SELECT * FROM `user_menu` JOIN `user_access_menu` 
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`level_id` = $level_id
                AND `user_menu`.`is_active` = 1
                -- AND NOT EXISTS (SELECT * FROM `user_menu` WHERE `user_menu`.`id`= 8) 
                ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <ul class="sidebar-nav">
                    <!-- <li class="sidebar-header">
                        Pages
                    </li> -->
                    <?php foreach ($menu as $m) : ?>
                        <?php if ($title == $m['menu']) : ?>
                            <li class="sidebar-item active">
                            <?php else : ?>
                            <li class="sidebar-item ">
                            <?php endif; ?>
                            <a class="sidebar-link" href="<?= $m['url'] ?>">
                                <i class="<?= $m['icon'] ?>"></i> <span class="align-middle"><?= $m['menu'] ?></span>
                            </a>
                            </li>
                        <?php endforeach; ?>

                </ul>
            </div>
        </nav>