            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if (! empty($index) && $index === 'true'): ?>class="active"<?php endif; ?>>
                        <a href="admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if (! empty($marathon_page) && $marathon_page === 'true'): ?>class="active"<?php endif; ?>>
                        <a href="marathon"><i class="fa fa-fw fa-bar-chart-o"></i> Manage Marathon</a>
                    </li>
                    <li <?php if (! empty($add_page) && $add_page === 'true'): ?>class="active"<?php endif; ?>>
                        <a href="add"><i class="fa fa-fw fa-table"></i> Add Marathon</a>
                    </li>
                    <li <?php if (! empty($runners_page) && $runners_page === 'true'): ?>class="active"<?php endif; ?>>
                        <a href="runners"><i class="fa fa-fw fa-edit"></i> Manage Runners</a>
                    </li>
                    <li <?php if (! empty($registration_page) && $registration_page === 'true'): ?>class="active"<?php endif; ?>>
                        <a href="registration"><i class="fa fa-fw fa-desktop"></i> Registration Form</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->