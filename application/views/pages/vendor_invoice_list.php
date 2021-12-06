<div class="row">
                    <h1> الفواتير </h1>
                    <div class="box-content">
                        <div class="box-head">
                            <label for="table_search">بحث</label>
                            <input type="text" id="table_search" onkeyup="search()" placeholder="البحث عن فاتورة">
                        </div>
                        <div class="box-head left" >
                            <label for="show_list">:عرض</label>
                    
                            <select name="show" id="show_list">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select> 
                        </div>
                    </div>
                    <div class="table_div">
                        <table class="table sortable" id="searchable">
                            <col style="width: 15%;" />
                            <col style="width: 15%;" />
                            <col style="width: 15%;" />
                            <col style="width: 13%;" />
                            <col style="width: 17%;" />
                            <thead>
                                <tr>
                                <th> فاتورة رقم</th>
                                    <th>مرجع المورد </th>
                                    <th>التاريخ</th>
                                    <th>عدد الاصناف</th>
                                    <th> المدفوع</th>
                                    <th>الإجمالي</th>
                            
                            
                                    <th>العمليات</th>
                                    <th class="tstatus" >الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($sup_invoices as $key => $value){
                            $status = $value['invoice_status'];
                            //    echo $status;
                            $status_btn='';                         
                            if($status == 1){
                                $status_btn = 'alert'; 
                                $innerHTML='مسودة';                          
                                }
                            elseif($status == 2){$status_btn = 'pending'; $innerHTML='مفتوح';}
                            elseif($status == 3){$status_btn = 'success';$innerHTML='خالص';}
                            
                    
                                            echo '<tr>'; 
                                            echo'<td>'.$value['si_serial_num'].'</td>'; 
                                                echo'<td>'.$value['invoice_num'].'</td>'; 
                                                echo'<td>'.$value['invoice_date'].'</td>'; 
                                                
                                                echo'<td>'.$value['p_item_quantity'].'</td>';                                        
                                                echo'<td>'.$value['si_item_total'].'</td>';                                
                                                echo'<td>'.$value['si_paid'].'</td>';                      
                                                echo'<td>'.'<a href="'.base_url('B_purchase/edit_invoice/edit/').$value['si_id'].'" class="tb-btn success ">عرض<i class="fas fa-eye"></i></a>'.'</td>';   
                                                echo '  <td><span class="status '.$status_btn.' ">'.$innerHTML.'</span></td>'; 
                                            echo '</tr>';
                                        }
                                ?>            
                            </tbody>
                        </table>
                    </div>
                  
                </div>



                <!-- /end of row -->