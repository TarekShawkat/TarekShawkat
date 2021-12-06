                <div class="row">
                    <h4 class="box-title ">إضافة مورد:</h4>
                    <div class="content">
                        <form id="vendor_form" class="form-inline" action="<?php echo base_url('B_vendors/create_vendor') ?>" method="POST" autocomplete="off">
                            <div class='form-group main' >
                                <div class='input-group title'>
                                    <label for="item_name">اسم المورد</label>
                                    <input class= "btn-xbig" type="text" id="company_name" name="company_name" >
                                </div>
                            </div>
               
                            <div class='form-group'>
                                <div class='input-group'>
                                    <label for="sale_price"> صاحب العمل</label><br>
                                    <input type="text" class="btn-small" id="vendor_name" name="vendor_name" ><br>
                                </div>
                        
                                <div class='input-group'>
                                    <label for="sale_price"> تليفون</label><br>
                                    <input type="text" class="btn-small" id="vendor_phone" name="vendor_phone" ><br>
                                </div>
                                <div class='input-group'>
                                    <label for="sale_price"> العنوان</label><br>
                                    <input type="text" class="btn-xbig" id="vendor_add" name="vendor_add" maxlength="50" ><br>
                                </div>
                            </div>         
                            <div class="form-button">
                                <button type="submit" from="items_form">حفظ</button>
                                <button type="reset" class="btn-fade">الغاء</button>
                            </div>
                        </form>
                    </div>
                    <!-- /content -->
                </div>
                <!-- /end of row -->

                <script>
                    function place_vendor_data(){

                        let id='<?php if(isset($index) && ($index==='vendor_edit' || $index==='vendor_view')){
                                         echo $vendor_id;}?>'

                        // let supplier_id         = document.getElementById('vendor_id');                     
                        let supplier_company    = document.getElementById('company_name');
                        let supplier_name       = document.getElementById('vendor_name');
                        let supplier_phone      = document.getElementById('vendor_phone');
                        let supplier_add        = document.getElementById('vendor_add');
                   

                        // start xml object 
                        const xhttp = new XMLHttpRequest();
                        // start xml connection 
                        xhttp.open("POST", "<?php echo site_url('B_vendors/edit_vendor/json_data/');?>"+id,true);
                        // send object 
                        xhttp.send();
                        // if connection successful 
                        xhttp.onload = function() {
                            if(this.status == 200){
                                
                                var vendor_info = JSON.parse(this.responseText); 
                                console.log(vendor_info);
                                // supplier_id.value       = vendor_info['si_supplier_id']; 
                                supplier_name.value     = vendor_info['supplier_name'];                         
                                supplier_company.value  = vendor_info['supplier_company']; 
                                supplier_phone.value    = vendor_info['supplier_phone']; 
                                supplier_add.value      = vendor_info['supplier_add'];                    
                              
         
                             
                            }
                        }                    
                    }

                    function button_action(id_value){
                        let form = document.getElementById('vendor_form');
                        form.action ="http://localhost/imanager/B_vendors/update_vendor/"+id_value; 
                    }

                    function disabled(){

                        form_elements=document.getElementById('vendor_form').getElementsByTagName('input');
                        for(i=0;i<form_elements.length; i++){
                            form_elements[i].setAttribute("disabled", true);
                            }
                        }

                    
                    <?php if(isset($index) && ($index==='vendor_edit' || $index==='vendor_view')){
                                echo 'place_vendor_data();';

                            }
                            if(isset($index) && $index==='vendor_edit')
                            {
                             
                               echo' button_action('.$vendor_id.');'; 
                            }
                            if(isset($index) && $index==='vendor_view')
                            {
                               echo' disabled();'; 
                               echo' button_action('.$vendor_id.');'; 
                            }
                    ?>
                </script>
