<section class="content-header">
    <nav class="navbar navbar-default navbar-sub animated bounce">
        <a class="navbar-brand" href="<?php echo current_url(); ?>"><i class="fa fa-book color" aria-hidden="true"></i></a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#system_logs" data-toggle="tab"><i class="fa fa-server" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('loger_system_logs'); ?></a></li>
                <li><a href="#error_logs" data-toggle="tab" class="tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('loger_error_logs'); ?></a></li>
                <li><a href="#exception_logs" data-toggle="tab" class="tab_title"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $this->lang->line('loger_exception_logs'); ?></a></li>
            </ul>
        </div>
    </nav>
    <div class="tab-content" style="padding-bottom: 1px;">
        <div class="tab-pane fade active in" id="system_logs">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                     <table id="loger_table" class="<?php echo datatable_class(); ?>">
                        <thead>
                            <tr>
                                <th style="width: 20px;">#</th>
                                <th><?php echo $this->lang->line('loger_event'); ?></th>
                                <th><?php echo $this->lang->line('loger_details'); ?></th>
                                <th><?php echo $this->lang->line('loger_user'); ?></th>
                                <th><?php echo $this->lang->line('loger_date_time'); ?></th>
                                <th><?php echo $this->lang->line('loger_pc'); ?></th>
                                <th><?php echo $this->lang->line('loger_os'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($extra['system_log'] as $key => $value) {
                                $status = "success";
                                if ($value['log_status']==3) {
                                    $status = "info";
                                }elseif ($value['log_status']==4) {
                                    $status = "warning";
                                }elseif ($value['log_status']==5) {
                                    $status = "danger";
                                }else{
                                    $status = "success";
                                }

                                $num = ($key+1);
                                echo "<tr class='{$status}'>";
                                echo "<td>{$num}</td>";
                                echo "<td>{$value['document_code']}</td>";
                                echo "<td>{$value['description']}</td>";
                                echo "<td>{$value['full_name']}</td>";
                                echo "<td>{$value['date_time']}</td>";
                                echo "<td>{$value['pc_name']}</td>";
                                echo "<td>{$value['useragent']}</td>";
                                echo '</tr>';
                            } ?>
                            <!-- <tr>
                                <td colspan="13" class="danger text-center"><?php //echo $this->lang->line('common_no_record_found'); ?></td>
                            </tr> -->
                        </tbody>
                    </table>                   
                </div>
            </div>      
        </div>
        <div class="tab-pane fade" id="error_logs">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                     <table id="loger_table" class="<?php echo datatable_class(); ?>">
                        <thead>
                            <tr>
                                <th style="width: 20px;">#</th>
                                <th><?php echo $this->lang->line('loger_event'); ?></th>
                                <th><?php echo $this->lang->line('loger_details'); ?></th>
                                <th><?php echo $this->lang->line('loger_user'); ?></th>
                                <th><?php echo $this->lang->line('loger_date_time'); ?></th>
                                <th><?php echo $this->lang->line('loger_pc'); ?></th>
                                <th><?php echo $this->lang->line('loger_os'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($extra['error_log'] as $key => $value) {
                                $status = "success";
                                if ($value['error_type']=='Notice') {
                                    $status = "info";
                                }elseif ($value['error_type']=='Warning') {
                                    $status = "warning";
                                }elseif ($value['error_type']=='Error') {
                                    $status = "danger";
                                }else{
                                    $status = "success";
                                }

                                $num = ($key+1);
                                echo "<tr class='{$status}'>";
                                echo "<td>{$num}</td>";
                                echo "<td>{$value['error_type']}</td>";
                                echo "<td>{$value['error_description']}<br>{$value['error_file']} {$value['error_line_no']}</td>";
                                //echo "<td>{$value['full_name']}</td>";
                                echo "<td>{$value['date_time']}</td>";
                                echo "<td>{$value['pc_name']}</td>";
                                //echo "<td>{$value['useragent']}</td>";
                                echo '</tr>';
                            } ?>
                            <!-- <tr>
                                <td colspan="13" class="danger text-center"><?php //echo $this->lang->line('common_no_record_found'); ?></td>
                            </tr> -->
                        </tbody>
                    </table>                   
                </div>
            </div>  
        </div>
        <div class="tab-pane fade" id="exception_logs">
            <div class="box box-color animated zoomIn">
                <div class="box-body">
                     <table id="loger_table" class="<?php echo datatable_class(); ?>">
                        <thead>
                            <tr>
                                <th style="width: 20px;">#</th>
                                <th><?php echo $this->lang->line('loger_event'); ?></th>
                                <th><?php echo $this->lang->line('loger_details'); ?></th>
                                <th><?php echo $this->lang->line('loger_user'); ?></th>
                                <th><?php echo $this->lang->line('loger_date_time'); ?></th>
                                <th><?php echo $this->lang->line('loger_pc'); ?></th>
                                <th><?php echo $this->lang->line('loger_os'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($extra['exception_log'] as $key => $value) {
                                $status = "success";
                                if ($value['error_type']=='Notice') {
                                    $status = "info";
                                }elseif ($value['error_type']=='Warning') {
                                    $status = "warning";
                                }elseif ($value['error_type']=='Error') {
                                    $status = "danger";
                                }else{
                                    $status = "success";
                                }

                                $num = ($key+1);
                                echo "<tr class='{$status}'>";
                                echo "<td>{$num}</td>";
                                echo "<td>{$value['error_type']}</td>";
                                echo "<td>{$value['error_description']}<br>{$value['error_file']} {$value['error_line_no']}</td>";
                                //echo "<td>{$value['full_name']}</td>";
                                echo "<td>{$value['date_time']}</td>";
                                echo "<td>{$value['pc_name']}</td>";
                                //echo "<td>{$value['useragent']}</td>";
                                echo '</tr>';
                            } ?>
                            <!-- <tr>
                                <td colspan="13" class="danger text-center"><?php //echo $this->lang->line('common_no_record_found'); ?></td>
                            </tr> -->
                        </tbody>
                    </table>                   
                </div>
            </div>  
        </div>
    </div>
</section>