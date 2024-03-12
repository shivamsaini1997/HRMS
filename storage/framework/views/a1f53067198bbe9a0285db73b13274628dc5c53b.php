<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice</title>
        <style>
            table, th, td{
            border-collapse: collapse;
            padding: 0;
            }
        </style>
    </head>
    <body>
        <table style="width:100%;">
            <tbody >
                <tr style="padding:0px; text-align:center;">
                    <td style="padding:0px;text-decoration: underline;">
                    <img src="<?php echo e(public_path('Access-assist-logo-01.png')); ?>" style="width: 100px; height: 100px;">
                        <h4 class="payslip-title" style="font-family: 'Roboto', sans-serif;">Payslip for the Month of <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $getall_emp_salary->sal_month)->format('F Y')); ?></h4>
                    </td>
                </tr>
                <tr style="text-align:center; padding:0px;">
                    <td style="padding:10px 0px; border-bottom:1px solid #dee2e6; border-top:1px solid #dee2e6; margin-top:40px; font-family: 'Roboto', sans-serif;"> 
                        <b><?php echo e($getall_emp_salary->firstname); ?> <?php echo e($getall_emp_salary->lastname); ?></b>
                    </td>
                </tr>
                <tr>
                    <table>
                        <tbody>
                            <tr>
                                <td style="width:270px">
                                   
                                <p style="font-family: 'Roboto', sans-serif; font-size:14px;"><b>Access Asist</b></p>
                                <p style="font-family: 'Roboto', sans-serif; font-size:14px;">Plot No 6, 3rd Floor, Right Side Lane 2, Saidulajaib, Saket Metro Station, New Delhi-110030</p>
										
                                </td>
                                <td style="width:270px"></td>
                                <td style="text-align: right;">
                                    <h3 class="text-uppercase" style="font-family: 'Roboto', sans-serif; margin:-0px;font-size:14px;"><b>Payslip #<?php echo e($getall_emp_salary->id); ?></b></h3>
                                    <p style="font-family: 'Roboto', sans-serif;  margin-top:5px; font-size:14px;"> Salary Month: <span><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $getall_emp_salary->sal_month)->format('F Y')); ?></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <table>
                       
                    </table>
                </tr>
            </tbody>
        </table>
        <table style="width:100%;  padding:10px 0px 25px;">

            <tbody>
                <tr>
                    <td>
                        <table style="width:100%; border-spacing: 0;">
                            <tbody>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Department</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->dept); ?></td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Gender</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->gender); ?></td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>PAN</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->panno); ?></td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Days Payable</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->payable_days); ?></td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>DOJ</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->doj); ?> </td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>A/C No. </b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->bankaccount); ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table style="width:100%; border-spacing: 0;">
                            <tbody>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Emp. code</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->emp_id); ?></td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Designation</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->design); ?></td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>UAN No</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"></td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>ESI No.</b> </td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;">N/A</td>
                                </tr>
                   
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Location</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;">Delhi</td>
                                </tr>
                                <tr style="padding:0px;">
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Father/Husband Name</b></td>
                                    <td style="width:50%; border-spacing: 0; padding:2px 8px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        
        </table>
        <table style="width:100%;">
            <thead>
                <tr>
                    <th style="font-family: 'Roboto', sans-serif; font-size:16px; ">Earnings</th>
                    <th style="font-family: 'Roboto', sans-serif; font-size:16px;">  Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <table style="width:100%; border-spacing: 0;">
                            <thead>
                                <tr style="font-family: 'Roboto', sans-serif; font-size:14px;">
                                    <th style="font-weight: 700; border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0;text-align: left;padding:5px;">Description</th>
                                    <th style="font-weight: 700; border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0; text-align: right;padding:5px;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="padding:0px;">
                                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0; padding:5px; font-family: 'Roboto', sans-serif; font-size:14px;">Consolidated Fee</td>
                                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0; padding:5px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->consolidated_fee); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table style="width:100%; border-spacing: 0;">
                            <thead>
                                <tr style="font-family: 'Roboto', sans-serif; font-size:14px;">
                                    <th style="font-weight: 700; border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0;text-align: left;padding:5px;">Description</th>
                                    <th style="font-weight: 700; border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0; text-align: right;padding:5px;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="padding:0px;">
                                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0; padding:5px; font-family: 'Roboto', sans-serif; font-size:14px;">TDS</td>
                                    <td style="border-top: 2px solid #000; border-bottom: 2px solid #000; border-spacing: 0; padding:5px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->tds); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
            <tbody style="border-bottom: 5px double;">
                <tr>
                    <td>
                        <table style="width:100%; border-spacing: 0;">
                            <thead>
                                <tr style="font-family: 'Roboto', sans-serif; font-size:14px;">
                                    <th style="font-weight: 700; border-bottom: 2px solid #000; border-spacing: 0;text-align: left;padding:5px;">Gross Pay (A)</th>
                                    <th style="font-weight: 700;  border-spacing: 0; text-align: right;padding:5px;"><?php echo e($getall_emp_salary->net_pay); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $formatter = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                                $words = $formatter->format($getall_emp_salary->net_pay);
                            ?>
                                <tr style="padding:0px;">
                                    <td style="border-spacing: 0; padding:5px; font-family: 'Roboto', sans-serif; font-size:14px;"><b>Net Paid (A - B)</b></td>
                                    <td style="border-top: 2px solid #000; border-spacing: 0; padding:5px; text-align: right; font-family: 'Roboto', sans-serif; font-size:14px;"><?php echo e($getall_emp_salary->net_pay); ?> (in words)</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table style="width:100%; border-spacing: 0;">
                            <thead>
                                <tr style="font-family: 'Roboto', sans-serif; font-size:14px;">
                                    <th style="font-weight: 700;  border-spacing: 0;text-align: left;padding:5px;">Gross Deductions(B)	</th>
                                    <th style="font-weight: 700; border-spacing: 0; text-align: right;padding:5px;"><?php echo e($getall_emp_salary->tds); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="padding:0px;">
                                    <td style="border-top: 2px solid #000;  border-spacing: 0; padding:5px; font-family: 'Roboto', sans-serif; font-size:14px;">Rs. <?php echo e(ucfirst($words)); ?>.</td>
                                    <td style="border-top: 2px solid #000; border-spacing: 0; padding:5px; text-align: right;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr >
                    <td style="border-spacing: 0; padding:5px; font-family: 'Roboto', sans-serif; font-size:14px; padding: 15px 0 15px 5px;"><b>(After Roundoff)</b></td>
                    <td style="border-spacing: 0; padding:5px; font-family: 'Roboto', sans-serif; font-size:14px; padding: 15px 0 15px 5px;"><b></b></td>
                </tr>
            </tbody>
        </table>
        <i>Remarks : This Is Computer Generated Payslip and does not require any signature.</i>
    </body>
</html><?php /**PATH /home/accessas/public_html/hrms/resources/views/admin/demopdf.blade.php ENDPATH**/ ?>