<div class="row">
                    <h1> فواتير العملاء </h1>
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
                                <th>فاتورة رقم</th>
                                <th>التاريخ</th>
                                <th>عدد الاصناف</th>
                                <th> الإجمالي</th>
                                <th>المستحق</th>
                         
                                <th>العميل</th>
                                <th>العمليات</th>
                 
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($cus_invoices as $key => $value){

                                        echo '<tr>'; 
                                            echo'<td>'.$value['ci_serial_num'].'</td>'; 
                                            echo'<td>'.$value['ci_date'].'</td>'; 
                                            echo'<td>'.$value['ci_item_quan'].'</td>';                                        
                                            echo'<td>'.$value['ci_total'].'</td>';                                
                                            echo'<td>'.$value['ci_due'].'</td>';      
                                            echo'<td>'.$value['ci_customer_id'].'</td>';                   
                                            echo'<td>'.'<a href="'.base_url('B_sales/edit_invoice/edit/').$value['ci_id'].'" class="tb-btn success ">عرض<i class="fas fa-eye"></i></a>'.'</td>';   
                                        
                                        echo '</tr>';
                                    }
                            ?>            
                        </tbody>
                    </table>
                                </div>
                    <!-- <div class="box-content left">
                        <div class='box-head'>
                          <span>pagination </span>
                        </div>
                        <div class='box-head left'>
                            <span>عرض 5 من 5 </span>
                          </div>
                    </div> -->
                </div>
                <!-- /end of row -->