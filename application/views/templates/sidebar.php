 <!-- Sidebar -->
 <ul class="navbar-nav bg-primary sidebar-dark sidebar accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-cogs"></i>
         </div>

         <div class="sidebar-brand-text text-capitalize ">
             <dt>MTs Al-Kautsar Bogor</dt>
         </div>
     </a>


     </a>


     <!-- Divider -->
     <hr class="sidebar-divider ">


     <!-- Query Menu-->

     <?php

        // Mengambil role_id
        $role_id = $this->session->userdata('role_id');

        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                      FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                      WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC     
        ";

        $menu = $this->db->query($queryMenu)->result_array();


        ?>

     <!-- LOOPING MENU -->
     <?php foreach ($menu as $m) : ?>
         <div class="sidebar-heading">
             <?= $m['menu']; ?>
         </div>

         <!--SUBMENU -->
         <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *  
            FROM `user_sub_menu` where `menu_id` = $menuId
            AND `is_active` = 1
            ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

         <?php foreach ($subMenu as $sm) : ?>

             <!-- Code untuk list active menu -->
             <?php if ($title == $sm['title']) : ?>
                 <li class="nav-item active">
                 <?php else : ?>

                 <li class="nav-item">
                 <?php endif; ?>

                 <!-- end of active menu -->


                 <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                     <i class="<?= $sm['icon']; ?>"></i>
                     <span><?= $sm['title']; ?></span></a>
                 </li>
             <?php endforeach; ?>


             <!-- Divider -->
             <hr class="sidebar-divider mt-3">

         <?php endforeach; ?>




         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('auth/logout/'); ?>" data-toggle="modal" data-target="#logoutModal">
                 <i class="fas fa-fw fa-sign-out-alt"></i>
                 <span>Logout</span></a>
         </li>



         <!-- Divider -->
         <hr class="sidebar-divider mt-3">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

 </ul>
 <!-- End of Sidebar -->