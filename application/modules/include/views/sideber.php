<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
        <?php
			$url = $_SERVER['REQUEST_URI'];
		?>
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search">
						<div class="input-box">
							<a href="javascript:;" class="remove"></a>
							<input type="text" placeholder="Search..." />
							<input type="button" class="submit" value=" " />
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
                
                <!--start menu for admin-->
                <!--start menu for admin-->
                <!--start menu for admin-->
        <?php
			if($users_type == 1){
		?>
				<li <?php if (strpos($url, "dashboard") !== false){ echo 'class="active"'; } ?>>
                    <a href="<?php echo base_url('dashboard'); ?>">
                        <i class="icon-home"></i> 
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li <?php if (strpos($url, "super-admin-school") !== false){ echo 'class="active"'; } ?>>
                    <a href="javascript:;">
                        <i class="icon-cogs"></i> 
                        <span class="title">Manage School </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li >
                            <a href="<?php echo base_url('super-admin-school/school/registerSchool'); ?>">
                                Register School
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo base_url('super-admin-school/school/viewRegisterSchool'); ?>">
                                View School
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li <?php if (strpos($url, "settings") !== false){ echo 'class="active"'; } ?>>
                    <a href="javascript:;">
                        <i class="icon-cogs"></i> 
                        <span class="title">Settings </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li >
                            <a href="<?php echo base_url('super-admin-settings/settings/masterPasswordChange'); ?>">
                                Master password
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo base_url('super-admin-settings/settings/superAdminPasswordChange'); ?>">
                                Password change
                            </a>
                        </li>
                    </ul>
                </li>
                <li <?php if (strpos($url, "session") !== false){ echo 'class="active"'; } ?>>
                    <a href="javascript:;">
                        <i class="icon-cogs"></i> 
                        <span class="title">Session Year </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li >
                            <a href="<?php echo base_url('super-admin-session-year/session_year/addSession'); ?>">
                                Add session
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo base_url('super-admin-session-year/session_year/viewBatchSession'); ?>">
                                Show Batch Session
                            </a>
                        </li>
                    </ul>
                </li>
                <li <?php if (strpos($url, "session") !== false){ echo 'class="active"'; } ?>>
                    <a href="javascript:;">
                        <i class="icon-cogs"></i> 
                        <span class="title">Exam Type </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li >
                            <a href="<?php echo base_url('super-admin-exam-type/exam_type'); ?>">
                                Add Exam Type
                            </a>
                        </li>
                        <li >
                            <a href="<?php echo base_url('super-admin-exam-type/exam_type/viewExamTypes'); ?>">
                                Show Exam Type
                            </a>
                        </li>
                    </ul>
                </li>
                <li <?php if (strpos($url, "page") !== false){ echo 'class="active"'; } ?>>
                    <a href="javascript:;">
                        <i class="icon-cogs"></i> 
                        <span class="title">Content Management </span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li >
                            <a href="<?php echo base_url('page'); ?>">
                                Page Management
                            </a>
                        </li>
                    </ul>
                </li>
                
                
                
        <?php
			}
		?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->