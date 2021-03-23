<div class="container-fluid">
    <div class="page-header">
        <div class="pull-right">
            <h1><?php $companyName = $this->general_db_model->get_row('contacts','*'); echo @$companyName->company_name;?> Dashboard</h1>
        </div>
        <div>








            <!--            <ul class="minitiles">
                            <li class='grey'>
                                <a href="#">
                                    <i class="fa fa-cogs"></i>
                                </a>
                            </li>
                            <li class='lightgrey'>
                                <a href="#">
                                    <i class="fa fa-globe"></i>
                                </a>
                            </li>
                        </ul>-->
<!--            <ul class="stats">-->
<!--                <!--                <li class='satgreen'>-->
<!--                                    <i class="fa fa-money"></i>-->
<!--                                    <div class="details">-->
<!--                                        <span class="big">$324,12</span>-->
<!--                                        <span>Balance</span>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                <li class='lightred'>-->
<!--                    <i class="fa fa-calendar"></i>-->
<!--                    <div class="details">-->
<!--                        --><?php //if(!empty($admins_logDetails)){
//                            $date = $admins_logDetails[1]->log_time;
//                            $Y = date('Y', strtotime($date));
//                            $m = date('m', strtotime($date));
//                            $d = date('d', strtotime($date));
//                            $mName = date("F", mktime(0, 0, 0, $m, 10));
//                            $dName = date("l", strtotime($date));
//                            $timeDate =  date('F jS, Y g:i:s a', mktime(0, 0, 0, 0, 0, $Y));// November 30th, 2012 12:00:00 am
//                        }?>
<!--                        <span class="big">Last Login</span>-->
<!--                        <span class="medium">--><?php //echo "$timeDate";?><!-- </span>-->
<!--                        <span>--><?php //echo "$dName";?><!--</span>-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
        </div>
    </div>
    </div>
