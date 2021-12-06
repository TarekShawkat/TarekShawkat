               <div class="row" > 
                    <h1> الاصناف</h1>
                    <div class="box-content">
                        <div class="box-head">
                            <label for="table_search">بحث</label>
                            <input type="text" id="table_search" onkeyup="search()" placeholder="البحث عن منتج">
                        </div>
                        <div class="box-head left" >
                            <label for="show_list">:عرض</label>
                    
                            <select name="show" id="show_list" onchange="changerows(this.value)">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select> 
                        </div>
                    </div>
                    <div class="table_div">
                        <table class="table sortable indexed  " id="searchable">                
                            <!-- <col style="width: 35%;" > 
                            <col style="width: 10%;" >
                            <col style="width: 10%;" >
                            <col style="width: 10%;" >            
                            <col style="width: 15%;" >  -->
                            <!-- <col style="width: 20%;"> -->
            
                            <thead>
                                <tr>
                    
                                    <th>الصنف</th>
                                    <th>الكمية</th>
                                    <th>السعر</th>
                                    <th>الخصم</th>
                                    <th width="15%x">رقم الجزء</th>
                                    <th width="240px">العمليات</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php   foreach($items as $key => $value){
                                            echo '<tr>'; 
                                                echo'<td>'.$value['item_name'].'</td>'; 
                                                echo'<td>'.$value['item_quantity'].'</td>'; 
                                           
                                                echo'<td>'.$value['item_unit_price'].'</td>';                                        
                                                echo'<td>'.$value['item_discount_id'].'</td>';      
                                                echo'<td>'.$value['part_number'].'</td>';                                
                                                echo'<td>'.'<a href="'.base_url('B_items/edit_item/1/').$value['item_id'].'" class="tb-btn success ">عرض<i class="fas fa-eye"></i></a>
                                                            <a href="'.base_url('B_items/edit_item/2/').$value['item_id'].'" class="tb-btn adjust abtn">تعديل<i class="fas fa-edit"></i></a>            
                                                            <a href="'.base_url('B_items/delete/').$value['item_id'].'" class="tb-btn alert abtn" onclick="verify_warning(event);">مسح<i class="fas fa-times-circle"></i></a>'.'</td>';   
                                            echo '</tr>';
                                        }
                                ?>                         
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /end of row -->
                