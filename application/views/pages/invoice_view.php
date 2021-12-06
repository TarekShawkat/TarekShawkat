
                    <div id="invoice_banner" class="invoice_banner" style="display: none;">
                        <div class="invoice_actions">
                        
                            <button id="validate" >تحقق</button>
                            
                            <button id="print" hidden>طباعة</button>
                        
                            <button id="register_payment" hidden>تسجيل دفعة</button>
                        </div>
                        <div class="invoice_header">
                            <div class=header-group>
                                <label id='draft' >مسودة</label>
                            
                                <label id='open' >مفتوح</label>
                            
                                <label id='paid' >خالص</label>
                            </div>
                        
                        </div>
                    </div>
                <div class="row noMargin">
                    <!-- <h4 class="box-title ">إضافة فاتورة:</h4> -->
                    <span> <img id='barcode_tag'class="barcode" alt="" src="<?php  if(isset($barcode)){ echo site_url('B_purchase/getSerial_ticket/').$barcode;}?>"/></span>

                    <div class="content">
                        <form id="vendor_invoice" name="vendor_invoice" class="form-inline" action="<?php echo base_url('B_purchase/save_invoice') ?>" method="POST" autocomplete="off">
                            <div class='form-group ' >
                                <div class='input-group '>
                                <input class= "btn-med" type="text" id="serial_num" name="serial_num" value='' hidden>

                                    <label for="vendor_name">اسم المورد</label>
                                    <input class= "btn-med" type="text" id="vendor_id" name="vendor_id" hidden>
                                    <input class= "btn-med" type="text" id="vendor_name" name="vendor_name" list="vendors_list">
                            
                                </div>
                                <div class='input-group '>
                                    <label for="invoice_date">تاريخ الفاتورة </label>
                                    <input class= "btn-sm" type="date" id="invoice_date" name="invoice_date" >
                                </div>
                                <div class='input-group '>
                                    <label for="vendor_reference">رقم المرجع </label>
                                    <input class= "btn-small" type="text" id="vendor_reference" name="vendor_reference" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) 
                                                                                                                                        ||  (event.charCode >= 97 && event.charCode <= 122) 
                                                                                                                                        ||  (event.charCode >= 48 && event.charCode <= 57) 
                                                                                                                                        ||  (event.charCode ===45 ||event.charCode ===95)" />
                                </div>
               
                      
                                
                            </div>
                            <div class="table-form">
                                <table id='table-items' class="items-table ">
                                        <col style="width: 30%;" />
                                        <col style="width: 20%;" />
                                        <col style="width: 20%;" />
                                        <col style="width: 20%;" />
                                        <col style="width: 10%;" />
                                    <thead>     
                                        <tr>
                                            <th>الصنف</th>
                                            <th>الكمية</th>
                                            <th>سعر الوحده</th>
                                            <th>ضريبة</th>
                                            <th>المجموع</th>
                                        </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td><input  class="cell" id="items[item_1][sup_id]" name="items[item_1][sup_id]"  hidden >
                                                <input  class="cell" id="items[item_1][item_id]" name="items[item_1][item_id]"  required hidden >
                                                <input  type="text " class="cell" id="items[item_1][item_name]" name="items[item_1][item_name]" list="items-list"  >
                                           
                                            </td>
                                            <td><input  type="number" min="0" step="1"  oninput="quantity(this)" class="cell" id="items[item_1][item_quantity]" name="items[item_1][item_quantity]" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"></td>
                                            <td><input  type="number" oninput="unit_price(this)" step="0.01" value='0.00' class="cell" id="items[item_1][unit_price]" name="items[item_1][unit_price]" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"></td>
                                            <td> <select type="text" class="cell" id ="items[item_1][discount]" name="items[item_1][discount]"  >
                                                    <option></option>   
                                                    <option value='1' >10%</option>
                                                    <option>15%</option>
                                                    <option>20%</option>
                                                    <option>25%</option>
                                                    <option>30%</option>
                                            
                                                </select>             
                                            </td>
                                            <td><input  type="text" class="cell" id="items[item_1][item_total]" name="items[item_1][item_total]" readonly></td>
                                        </tr>                        
                                                                
                                        <tr>                                                                              
                                            <td id='insert_row' onclick="insert_tRow()"> <i class="fas fa-plus"></i>إضافة صنف</td>                                      
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-total">
                                <table>
                                <col style="width: 50%;" />
                                 <col style="width: 50%;" />
                        
                                    <tr>
                                        <th>مجموع بدون ضريبة</th>
                                        <td><input id="total_noTax" name="total_noTax" readonly>    </td>
                                    </tr>
                                    <tr>
                                        <th>الضريبة</th>
                                        <td><input id="Tax_amount" name="Tax_amount" readonly> </td>

                                    </tr>
                                    <tr>
                                        <th style="font-weight: bold;">إجمالي</th>
                                        <td style="font-weight: bold;"><input id="total_withTax" name="total_withTax" readonly> </td>

                                    </tr>

                                </table>
                            </div>  
                            <div class="form-button">
                                <button id="action_btn" type="submit" form="vendor_invoice">حفظ</button>
                                <button type="button" onclick="location.href='http://localhost/imanager/B_purchase'" class="btn-fade">الغاء</button>
                            </div>
                        </form>
                    </div>
                    <!-- /end of content -->
                </div>
                <!-- /end of row -->
                <datalist id="items-list">
         
                </datalist>
                <datalist id="vendors_list">

                
                </datalist>
                <script>
                    window.addEventListener('load', (event) => {
                    
                    var today = new Date();
             
                    var dd = today.getDate();
                    var mm = today.getMonth()+1; //As January is 0.
                    var yyyy = today.getFullYear();

                    if(dd<10) dd='0'+dd;
                    if(mm<10) mm='0'+mm;
                    var date = yyyy+'-'+mm+'-'+dd; 
                    document.getElementById('invoice_date').value = date; 
            
       
                });
                    document.querySelector('input[list="vendors_list"]').addEventListener('input', place_vendor);
                    document.getElementById('insert_row').addEventListener('click', loadSelectors);


                
                function loadSelectors(){
                    var selectors=document.querySelectorAll('input[list="items-list"]');
                    for(i=0; i<selectors.length; i++){
                        selectors[i].addEventListener('input', place_item);
                    }

                }
                    var tableRowcount=1; 

                    // input select vendor_id vendor_name
                    function loadVendors(){
                        // start xml object 
                        const xhttp = new XMLHttpRequest();
                        // start xml connection 
                        xhttp.open("POST", "<?php  echo site_url('B_vendors/get_vendors_list');?>",true);
                        // send object 
                        xhttp.send();
                        // if connection successful 
                        xhttp.onload = function() {
                            if(this.status == 200){
                                
                                var vendors = JSON.parse(this.responseText); 
                           
                                
                                for(i=0; i<vendors.length; i++){
                                    var options = document.createElement('option');
                                    options.value = vendors[i].supplier_id; 
                                    options.innerHTML = vendors[i].supplier_company;
                                    document.getElementById("vendors_list").appendChild(options);        
                                }                               
                            }
                        }
                    }


                    function place_vendor(e) {
               
                        var input = e.target; 
                            val = input.value;
                            
                            list = input.getAttribute('list'),
                            options = document.getElementById(list).childNodes;
                            vendor_id_field_input=document.getElementById('vendor_id');  


                        for(var i = 0; i < options.length; i++) {
                            if(options[i].value === val) {
                                vendor_id_field_input.value = val;  
                                input.value = options[i].innerHTML; 
                            break;
                            }
                        }
                    }                    
                    //-----------------------------------------//

                     // input select item_id item_name
                    function loadItems(){
                        // start xml object 
                        const xhttp = new XMLHttpRequest();
                        // start xml connection 
                        xhttp.open("POST", "<?php  echo site_url('B_items/get_items_list');?>",true);
                        // send object 
                        xhttp.send();
                        // if connection successful 
                        xhttp.onload = function() {
                            if(this.status == 200){
                                
                                var items = JSON.parse(this.responseText); 
                           
                                                
                                for(i=0; i<items.length; i++){
                                    var options = document.createElement('option');
                                    options.value = items[i].item_id; 
                                    options.innerHTML = items[i].item_name;
                                    document.getElementById("items-list").appendChild(options);                               
                                }                   
                            }
                        }
                    }

                    function place_item(e) {
               
                        var input_item = e.target; 
                            val = input_item.value;                            
                            list = input_item.getAttribute('list'),
                            options = document.getElementById(list).childNodes;                     
                            id_field_input=input_item.previousElementSibling;    

                        for(var i = 0; i < options.length; i++) {
                            if(options[i].value === val) {
                                id_field_input.value = val;  
                                input_item.value = options[i].innerHTML; 
                            break;
                            }
                        }
                    }  


                    //-----------------------------------------//
                    // insert table row
                    function insert_tRow(){
                        tableRowcount++;
                        var table = document.getElementById("table-items");
                        var rowCount = table.rows.length-1;
                        var row = table.insertRow(rowCount);
                     
                        var cell1 = row.insertCell(0);// id
                        var cell2 = row.insertCell(1);// code
                        var cell3 = row.insertCell(2);//serial
                        var cell4 = row.insertCell(3);// name 
                        var cell5 = row.insertCell(4);// total
                        cell1.innerHTML='<input  class="cell" id="items[item_'+tableRowcount +'][sup_id]" name="items[item_'+tableRowcount +'][sup_id]"  hidden ><input  class="cell" id="items[item_'+tableRowcount +'][item_id]" name="items[item_'+tableRowcount +'][item_id]" hidden><input  type="text" class="cell" id="items[item_'+tableRowcount +'][item_name]" name="items[item_'+tableRowcount +'][item_name]" list="items-list" >';
                        cell2.innerHTML= '<input oninput="quantity(this)" type="number"  class="cell"  id="items[item_'+tableRowcount +'][item_quantity]" name="items[item_'+tableRowcount +'][item_quantity]" >';
                        cell3.innerHTML= '<input  oninput="unit_price(this)" type="number" step="0.01" value="0.00" class="cell"  id="items[item_'+tableRowcount +'][unit_price]" name="items[item_'+tableRowcount +'][unit_price]" >';
                        cell4.innerHTML= '<select type="text" class="cell"  id="items[item_'+tableRowcount +'][discount]" name="items[item_'+tableRowcount +'][discount]"  >';
                        cell5.innerHTML='<input  type="text" class="cell" id="items[item_'+tableRowcount +'][item_total]" name="items[item_'+tableRowcount +'][item_total]" readonly style="width:80%;" ><a style="display: inline-block;" onclick="removeRow(this)"><i class="fa fa-trash-alt pull-left gray"></i></a>';
                      
             

                    }
                    //delete table row
                    function removeRow(element){                
                        let row= element.closest('tr').rowIndex; 
                        document.getElementById("table-items").deleteRow(row);                  
                    }
                    //-----------------------------------------//
                    //calculate item total
                    function quantity(e) {
                        quantity_field= e;  
                        let quantity_value=quantity_field.value; 
                        let item_price=  quantity_field.parentNode.nextElementSibling.childNodes[0].value; 
                          
                        if(item_price)
                        {
                            let total_amount =  quantity_value * item_price ;    
                            quantity_field.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.childNodes[0].value=total_amount.toFixed(2);
                            getInvoiceSummary();    
                        }
                            
                    }

                    function unit_price(e) {

                        price_field= e;  
                        let price_value=price_field.value; 
                        let quantity_value=  price_field.parentNode.previousElementSibling.childNodes[0].value; 
                        if(quantity_value)
                        {
                            let total_amount =  quantity_value * price_value ;             
                           price_field.parentNode.nextElementSibling.nextElementSibling.childNodes[0].value=total_amount.toFixed(2);    
                           getInvoiceSummary();              
                        }  
                        return;                          
                    }

                    function getInvoiceSummary(){
                        var sum = Number(0); 
                  
                        let total_noTax     =  document.getElementById("total_noTax"); 
                        let Tax_amount      =  document.getElementById("Tax_amount");
                        let total_withTax   =  document.getElementById("total_withTax");
                        let table=document.getElementById('table-items').getElementsByTagName('tr');
                   
                        for(i=1; i<table.length-1; i++){
                           row_total= table[i].getElementsByTagName('td')[4].childNodes[0].value;
                            sum += Number(row_total); 
                        }
                       
            
                        total_noTax.value   =   sum.toFixed(2); 
                        total_withTax.value =   sum.toFixed(2);  
                      
                    }
                    //-----------------------------------------//

                    // fill form 
                    function place_data(){
                   

                      
                        let id='<?php if(isset($index) && $index==='show_inv_edit'){
                                         echo $invoice_id;}?>'
                        formAction(id); 
                        var vendor_id           = document.getElementById('vendor_id');
                        var vendor_name        = document.getElementById('vendor_name');
                        let invoice_date       = document.getElementById('invoice_date');
                        let barcode_tag          = document.getElementById('barcode_tag');
                        let vendor_reference   = document.getElementById('vendor_reference');
                        let sale_available     = document.getElementById('sale_available');
                        let total_noTax        = document.getElementById('total_noTax');
                        let Tax_amount         = document.getElementById('Tax_amount');
                        let total_withTax      = document.getElementById('total_withTax');
                        let  serial_num          =     document.getElementById('serial_num');
                 
                        //table items data
                 
                        // let discount       = document.getElementById('items[item_'+tableRowcount +'][discount]');
                        // let item_total     = document.getElementById('items[item_'+tableRowcount +'][item_total]');

                    
                        // start xml object 
                        const xhttp = new XMLHttpRequest();
                        // start xml connection 
                        xhttp.open("POST", "<?php echo site_url('B_purchase/edit_invoice/json_data/');?>"+id,true);
                        // send object 
                        xhttp.send();
                        // if connection successful 
                        xhttp.onload = function() {
                            if(this.status == 200){
                                
                                var invoice_details = JSON.parse(this.responseText); 
                                vendor_id.value       = invoice_details['si_supplier_id']; 
                                 vendor_name.value       = invoice_details['supplier_company'];
                                 barcode_tag.src="http://localhost/imanager/B_purchase/getSerial_ticket/"+invoice_details['si_serial_num']; 
                                 invoice_date.value       = invoice_details['invoice_date']; 
                                 serial_num.value= invoice_details['si_serial_num'];
                                 vendor_reference.value   = invoice_details['invoice_num']; 
                                //  $sale_available     = invoice_details['invoice_num']; 
                                 total_noTax.value       = invoice_details['si_item_total']; 
                                //  $Tax_amount        =
                                total_withTax.value      = invoice_details['si_item_total']; 
                     
                             invoice_status(invoice_details['invoice_status'])   ;
                                
                    

                                var items= invoice_details['items'];      
                                                 
                                for(i=0; i<items.length; i++){
                                 
                                    var tableRow = i+1; 
                                
                             
                                    let sup_id          = document.getElementById('items[item_'+tableRow +'][sup_id]');
                                    let item_id         = document.getElementById('items[item_'+tableRow +'][item_id]');
                                    let item_name       = document.getElementById('items[item_'+tableRow +'][item_name]');
                                    let item_quantity   = document.getElementById('items[item_'+tableRow +'][item_quantity]');
                                    let price           = document.getElementById('items[item_'+tableRow +'][unit_price]');
                             
                                    sup_id.value        =items[i]['sup_id'];
                                    item_id.value       =items[i]['item_id'];
                                    item_name.value     =items[i]['item_name'];
                                    item_quantity.value =items[i]['sup_item_quantity'];
                                    price.value         =items[i]['sup_cost_price'];

                                    get_total(price);                              
                                        if(tableRow === items.length){break;}   
                                                                  
                                    insert_tRow();                                           
                                }                              
                            }
                        } 
                              //hide insert row if the invoice in edit mode; 
                              document.getElementById('insert_row').hidden=true;                           
                    }

                    // calculate item total after insert

                    function get_total(e) {
                        price_field= e;  
                        let price_value=price_field.value; 
                        let quantity_value=  price_field.parentNode.previousElementSibling.childNodes[0].value; 
                        if(quantity_value)
                        {
                            let total_amount =  quantity_value * price_value ;             
                           price_field.parentNode.nextElementSibling.nextElementSibling.childNodes[0].value=total_amount.toFixed(2); ;   
                                     
                        }  
                        return;                          
                    }

                    //control the invoice status boxes

                    function invoice_status(status){             

                        document.getElementById("invoice_banner").style.display = "flex"; 
                     
                        if(status==1){
                          
                            document.getElementById('draft').setAttribute('class','green');
                        }
                        if(status==2){
                         
                            document.getElementById('open').setAttribute('class','green')

                        }
                        if(status==3){
                      
                            document.getElementById('paid').setAttribute('class','green')
                        }
                     
                    
                    }

                    // change form action

                    function formAction(id_value){
                        let form = document.getElementById('vendor_invoice');
                        let form_button = document.getElementById('action_btn');
                        let btn_validate = document.getElementById('validate');
                        let btn_print = document.getElementById('print');
                        let btn_payment = document.getElementById('register_payment');

                        //change control_buttons visability 
                        btn_validate.hidden =true; 
                        btn_print.hidden    =false; 
                        btn_payment.hidden  =false; 
                        //change form action 
                        form_button.innerHTML='تحديث'; 
                        form.action ="http://localhost/imanager/B_purchase/update_invoice/"+id_value; 

                    }

           
                    loadItems();
                    loadVendors();
                    loadSelectors();
                  
                    // invoice_status();
                    <?php if(isset($index) && $index==='show_inv_edit'){
                                         echo 'place_data();';}?>
            
                    
                </script>