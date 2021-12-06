                
            

                <div class="row">
                    <h1>الموردين </h1>
                    <div class="box-content">
                        <div class="box-head">
                            <label for="table_search">بحث</label>
                            <input type="text" id="table_search" onkeyup="search()" placeholder="البحث عن مورد">
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
                    <table class="table sortable" id="searchable" >
                        <!-- <col style="width: 30%;" />
                        <col style="width: 15%;" />
                        <col style="width: 20%;" />
                        <col style="width: 13%;" />
                        <col style="width: 17%;" /> -->
                        <thead>
                            <tr>
                                <th>الشركه</th>
                                <th>المورد</th>
                                <th >العنوان</th>
                                <th >الهاتف</th>
                                <th width="240px">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($vendors as $key => $value){
                                        echo '<tr>'; 
                                            echo'<td>'.$value['supplier_company'].'</td>'; 
                                            echo'<td>'.$value['supplier_name'].'</td>';                                           
                                            echo'<td>'.$value['supplier_add'].'</td>';                                        
                                            echo'<td>'.$value['supplier_phone'].'</td>';                                                                 
                                            echo'<td>'.'<a href="'.base_url('B_vendors/edit_vendor/view/').$value['supplier_id'].'" class="tb-btn success ">عرض<i class="fas fa-eye"></i></a>
                                                        <a href="'.base_url('B_vendors/edit_vendor/edit/').$value['supplier_id'].'" class="tb-btn adjust abtn">تعديل<i class="fas fa-edit"></i></a>
                                                        <a href="'.base_url('B_vendors/edit_vendor/delete/').$value['supplier_id'].'" class="tb-btn alert abtn" onclick="verify_warning(event);">مسح<i class="fas fa-times-circle"></i></a>'.'</td>';   
                                        echo '</tr>';


                
                                    }
                            ?>                
                           
                        </tbody>
                    </table>                    
                </div>
                <!-- /end of row -->



<script>

</script>

