<div class="main-content">
                <div class="row invoice">
                    <div class="receipt">
                        <div class="receipt-head">
                            <div class="company-name">
                                <h1>شركه هارون لقطع غيار السيارات الكوري و الياباني</h1>
                                <label>ب.ض: </label><span>54654654</span><br>
                                <label>س.ت: </label><span>11-4-2020</span><br>
                            </div>
                            <div class="invoice_info">
                            <span> <img id='barcode_tag'class="barcode" alt="" src="<?php if(isset($invoice_details['ci_serial_num'])){echo site_url('B_sales/getSerial_ticket/').$invoice_details['ci_serial_num'];} ?>"/></span>
                            <br>

                                <label>تاريخ إصدار:</label><span><?php echo $invoice_details['ci_date'];?></span><br>
                                <label>تاريخ الإستحقاق:</label><span><?php echo $invoice_details['ci_date'];?></span><br>
                       
                            </div>
                        </div>
                        <div class="receipt-info">
                            <div class="from">
                                <h2>من</h2>
                                <h3>شركه هارون لقطع غيار السيارات الكوري و الياباني</h3>
                                <span>ابراج سيتي ستار برج 1 محل 20 بجوار شارع مصر  المحور الخدمي مدينه 6 اكتوبر </span><br>
                                <i>0238244267 / 01000150655 / 01149998444 </i>
                            </div>
                            <div class="to">
                                <h2>الي</h2>
                                <!-- <h3>المتحدة</h3> -->
                                <label> العميل :</label><span> <?php echo $invoice_details['ci_customer_id'];?></span><br>
                                <!-- <label> تليفون</label><span> 01149998444</span><br> -->
                            </div>
                        </div>
                        <div class="receipt-data">
                            <table class="reciept-table">
                            
                                    <thead>
                                        <tr>
                                            <td>الصنف</td>
                                            <td>الكميه</td>
                                            <td>السعر</td>
                                            <td>خصم</td>
                                            <td>إجمالي</td>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($invoice_details['items'] as $key =>$value ){
                                        
                                                echo '<tr>'; 
                                                    echo'<td>'.$value['item_name'].'</td>'; 
                                                    echo'<td>'.$value['cus_item_quantity'].'</td>'; 
                                                    echo'<td>'.$value['cus_unit_price'].'<i>ج.م</i></td>';                                        
                                                    if(!empty($value['cus_discount'])){echo'<td><i>%</i>';if(isset($value['cus_discount'])){echo $value['cus_discount'];} else{echo 0;}echo '</td>'; }
                                                    echo'<td>'.$value['cus_item_quantity']*$value['cus_unit_price'].'</td>'; 
                                                echo '</tr>';
                                        } ?>                                        
           
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" style="text-align: end;"><b>إجمالي بدون ضريبة</b></td>
                                            <td> <b><?php echo $invoice_details['ci_total'];?></b><i>ج.م</i></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-align: end;"><b>ضريبة</b></td>
                                            <td> <i>%</i><b>20</b></td>
                                        </tr>
                                        <tr >
                                            <td colspan="4" style="text-align: end; font-size: 2rem;"><b>إجمالي</b></td>
                                            <td  style=" font-size: 2rem;"> <b><?php echo $invoice_details['ci_due'];?></b><i>ج.م</i></td>
                                        </tr>
                                    </tfoot>
                            
                            </table>
                        </div>
                        <div class="conditions">
                            <span>ملحوظة:</span>
                            <p>هذه الفاتوره لا تعد بفاتوره رسميه
                                يمكن الارتجاع خلال 14 يوم من تاريخ الفاتوره بموجب اصل الفاتوره علي ان تكون البضاعه في حالتها الاصليه </p>
                        </div>
                        <button onclick="window.print()" class="noPrint">طباعة</button>
                    </div>
                    <!-- /end of reciept -->
                </div>
                <!-- /end of row -->