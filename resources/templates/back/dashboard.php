<?php toggle_status() ?>
<?php delete_user() ?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Analytics Dashboard
                    <div class="page-title-subheading">This is your website Metrics and analytics served using google
                        analytics API.
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Avg bounce rate</div>
                        <div class="widget-subheading">maintaining a lower bounce rate</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span><?php echo round(dashboard_first_metrics()[0][0], 1) . '%'; ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Avg. Pages per Session</div>
                        <div class="widget-subheading">Average pages visited per session</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span><?php echo round(dashboard_first_metrics()[0][1], 1); ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Avg. Time on Page</div>
                        <div class="widget-subheading">Average Time spent on Page</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span><?php echo round(dashboard_first_metrics()[0][2], 1) . ' sec'; ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-amy-crisp">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Page views</div>
                        <div class="widget-subheading">Page view for the last 28 days</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span><?php echo round(dashboard_first_metrics()[0][3], 1); ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Products Sold</div>
                        <div class="widget-subheading">Revenue streams</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>$14M</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <h5 class="card-title">New visitors vs returning visitors</h5>
                            <canvas id="pipey-chart" width="727" height="363" class="chartjs-render-monitor" style="display: block; width: 727px; height: 363px;"></canvas>
                        </div>
                    </div>
        </div>
        <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Top 5 most visited pages</h5>
                        <ul class="list-group mb-2">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php echo most_viewed_pages()[0][1]; ?></div>
                                                <div class="widget-subheading"><?php echo most_viewed_pages()[0][0]; ?></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary"><?php echo most_viewed_pages()[0][2]; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php echo most_viewed_pages()[1][1]; ?></div>
                                                <div class="widget-subheading"><?php echo most_viewed_pages()[1][0]; ?></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"><?php echo most_viewed_pages()[1][2]; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php echo most_viewed_pages()[2][1]; ?></div>
                                                <div class="widget-subheading"><?php echo most_viewed_pages()[2][0]; ?></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success"><?php echo most_viewed_pages()[2][2]; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php echo most_viewed_pages()[3][1]; ?></div>
                                                <div class="widget-subheading"><?php echo most_viewed_pages()[3][0]; ?></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success"><?php echo most_viewed_pages()[3][2]; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php echo most_viewed_pages()[4][1]; ?></div>
                                                <div class="widget-subheading"><?php echo most_viewed_pages()[4][0]; ?></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success"><?php echo most_viewed_pages()[4][2]; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Events</div>
                            <div class="widget-subheading">Number of created events</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><?php table_count('events') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total webinars</div>
                            <div class="widget-subheading">Number of created webinars</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><?php table_count('webinar') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total posts</div>
                            <div class="widget-subheading">Number of created posts</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><?php table_count('posts') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Income</div>
                            <div class="widget-subheading">Expected totals</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-focus">$147</div>
                        </div>
                    </div>
                    <div class="widget-progress-wrapper">
                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0"
                                aria-valuemax="100" style="width: 54%;"></div>
                        </div>
                        <div class="progress-sub-label">
                            <div class="sub-label-left">Expenses</div>
                            <div class="sub-label-right">100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Active Users</div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th class="text-center">Service</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Reg Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php display_users() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        
    </div>
</div>
<script>
    const delete_buttons = document.querySelectorAll('#PopoverCustomT-1');
    for(const el of delete_buttons ){
        el.addEventListener('click', (e) => {
        let link = e.target.value;
        document.querySelector('.deletion_link').href = link;
        });
    }
</script>
