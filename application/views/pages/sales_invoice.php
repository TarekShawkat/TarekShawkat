
<div class="row noMargin">
                    <div class="label_container">
                    <!-- <h4 class="box-title ">فاتورة رقم:</h4> -->
                   <span> <img id='barcode_tag'class="barcode" alt="" src="<?php if(isset($barcode)){echo site_url('B_sales/getSerial_ticket/').$barcode;} ?>"/></span>
                   </div> 
                   <div class="content">
                        <form id="customer_invoice" name="customer_invoice" class="form-inline" action="<?php echo base_url('B_sales/save_invoice') ?>" method="POST" autocomplete="off">
                            <div class='form-group ' >
                                <div class='input-group '>
                                <input class= "btn-med" type="text" id="serial_num" name="serial_num" value='' hidden>

                                    <label for="vendor_name">اسم العميل</label>
                                    <input class= "btn-med" type="text" id="customer_name" name="customer_name" >
                            
                                </div>
                                <div class='input-group '>
                                    <label for="invoice_date">تاريخ الفاتورة </label>
                                    <input class= "btn-sm" type="date" id="invoice_date" name="invoice_date" >
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
                                            <td><input  class="cell" id="items[item_1][cus_id]" name="items[item_1][cus_id]"  hidden >
                                                <input  class="cell" id="items[item_1][item_id]" name="items[item_1][item_id]"  required hidden >
                                                <input  type="text " class="cell" id="items[item_1][item_name]" name="items[item_1][item_name]" list="items-list" >
                                     
                                           
                                            </td>
                                            <td><input  type="number" min="0" step="1" value='0' oninput="quantity(this)" class="cell only_numbers" id="items[item_1][item_quantity]" name="items[item_1][item_quantity]" onkeypress="return only_numbers(event)"></td>
                                            <td><input  type="number" value='0.00' step=".01" oninput="unit_price(this)" class="cell" id="items[item_1][unit_price]" name="items[item_1][unit_price]" onkeypress="return only_numbers(event)" ></td>
                                            <td> <select type="text" class="cell" id ="items[item_1][discount]" name="items[item_1][discount]"  >
                                                    <option></option>   
                                                    <option >10%</option>
                                                    <option>15%</option>
                                                    <option>20%</option>
                                                    <option>25%</option>
                                                    <option>30%</option>
                                            
                                                </select>             
                                            </td>
                                            <td><input  type="text" class="cell" value='0.00'  id="items[item_1][item_total]" name="items[item_1][item_total]" readonly></td>
                                        </tr>                        
                                                                
                                        <tr>                                                                              
                                            <td id='insert_row' onclick="insert_tRow()" > <i class="fas fa-plus"></i>إضافة صنف</td>                                      
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
                                        <td><input id="total_noTax" name="total_noTax" value='0.00' readonly>    </td>
                                    </tr>
                                    <tr>
                                        <th>الضريبة</th>
                                        <td><input id="Tax_amount" name="Tax_amount" value='0.00' readonly> </td>

                                    </tr>
                                    <tr>
                                        <th style="font-weight: bold;">إجمالي</th>
                                        <td style="font-weight: bold;"><input id="total_withTax" value='0.00' name="total_withTax" readonly> </td>

                                    </tr>

                                </table>
                            </div> 
                      
                                <div class="form-button">
                                    <button id="action_btn" type="submit" form="customer_invoice">حفظ</button>
                                    <button type="button" onclick="location.href='http://localhost/imanager/B_sales'" class="btn-fade">الغاء</button>
                                </div>
                      
                                <button id="print_btn" type="button"   hidden >معاينة</button>

                          
                            </div>
                        </form>
                    </div>
                    <!-- /end of content -->
                </div>
                <!-- /end of row -->
                <datalist id="items-list">
         
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
                    

                    document.getElementById('insert_row').addEventListener('click', loadSelectors);
                    function only_numbers(e,allow_decimal){               
                        if(!((e.charCode >= 48 && e.charCode <= 57) || (e.charCode ===46))){
                            return e.preventDefault();
                            }
                        } 
       
                                   
                    function loadSelectors(){
                        var selectors=document.querySelectorAll('input[list="items-list"]');
                        for(i=0; i<selectors.length; i++){
                            selectors[i].addEventListener('input', place_item);
                        }

                    }

                    var tableRowcount=1; 



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

                    //we need to call the function to get proudct info and place name, price, and detect quantity

                    function place_item(e) {
               
                        var input_item = e.target; 
                            item_id = input_item.value;  
                            if(item_id){
                                const xhttp = new XMLHttpRequest();
                            // start xml connection 
                            xhttp.open("POST", "<?php  echo site_url('B_sales/get_product_data/');?>"+item_id,true);
                            // send object 
                            xhttp.send();
                            // if connection successful 
                            xhttp.onload = function() {
                            if(this.status == 200){
                                
                                var item_info = JSON.parse(this.responseText); 

                                id_field_input=input_item.previousElementSibling;
                                id_field_input.value = item_id;  
                                input_item.value = item_info.item_name;
                      
                                input_item.hidden=true; 
                                var x = document.createElement("SPAN");
                                    x.className = "item_label";
                                var y= document.createElement("i");
                                    y.className = "fa fa-times";
                                    y.onclick = function() { remove_item(this); };
                    
                                var t = document.createTextNode(item_info.item_name);
                     
                                x.appendChild(t);
                                x.appendChild(y); 
                                input_item.parentNode.appendChild(x); 

                                quantity_field          =input_item.parentNode.nextElementSibling.childNodes[0]; 
                                quantity_field.value    =1;    
                             
                        
                                price_field             =  input_item.parentNode.nextElementSibling.nextElementSibling.childNodes[0];
                                price_field.value       = item_info.item_unit_price;   
               
                            
                            
                                get_total(price_field);   
                                getInvoiceSummary();         
                 
                                    }
                                }           
                            }                                                  
                        }

                    function insert_inv_item(items) { 
                                                  
                        for(i=0; i<items.length; i++){
                            tableRow=i+1; 
                            let cus_id          = document.getElementById('items[item_'+tableRow +'][cus_id]');
                            let item_id         = document.getElementById('items[item_'+tableRow +'][item_id]');
                            let item_name       = document.getElementById('items[item_'+tableRow +'][item_name]');
                            let item_quantity   = document.getElementById('items[item_'+tableRow +'][item_quantity]');
                            let price           = document.getElementById('items[item_'+tableRow +'][unit_price]');
                     
              
                            cus_id.value        =items[i]['cus_id'];

                            item_id.value       =items[i]['cus_item_id'];
                            item_name.value     =items[i]['item_name'];
                            item_quantity.value =items[i]['cus_item_quantity'];
                            price.value         =items[i]['cus_unit_price'];      

                               item_name.hidden=true; 
                            var x = document.createElement("SPAN");
                                x.className = "item_label";
                            var y= document.createElement("i");
                                y.className = "fa fa-times";
                                y.onclick = function() { remove_item(this); };
                      
                            var t = document.createTextNode(items[i]['item_name']);
                    
                            x.appendChild(t);
                            x.appendChild(y); 
                            item_name.parentNode.appendChild(x); 
                      
                      
          
                                               
                            get_total(price);   
                          
                            if(tableRow === items.length){break;}   
                                                                  
                                insert_tRow();   
                                             
                                                    
                            }    
                              getInvoiceSummary();   
                              loadSelectors();    
                    }
        
                    
                    function remove_item(e){
                        e.parentNode.previousElementSibling.hidden=false; 
                        e.parentNode.previousElementSibling.value='';      
                        e.parentNode.previousElementSibling.previousElementSibling.value='';       
                        e.parentNode.parentNode.nextElementSibling.childNodes[0].value='0';                  
                        e.parentNode.parentNode.nextElementSibling.nextElementSibling.childNodes[0].value='0.00';        
                        e.parentNode.parentNode.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.childNodes[0].value='0.00';              
                        e.parentNode.remove(); 
                        getInvoiceSummary();
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
                        cell1.innerHTML='<input  class="cell" id="items[item_'+tableRowcount +'][cus_id]" name="items[item_'+tableRowcount +'][cus_id]"  hidden ><input  class="cell" id="items[item_'+tableRowcount +'][item_id]" name="items[item_'+tableRowcount +'][item_id]" hidden><input  type="text" class="cell" id="items[item_'+tableRowcount +'][item_name]" name="items[item_'+tableRowcount +'][item_name]" list="items-list" >';
                        cell2.innerHTML= '<input oninput="quantity(this)" type="number" value="0" class="cell only_numbers" step="1" id="items[item_'+tableRowcount +'][item_quantity]" name="items[item_'+tableRowcount +'][item_quantity]" onkeypress="return only_numbers(event)">';
                        cell3.innerHTML= '<input  oninput="unit_price(this)" type="number" value="0.00" step=".01" class="cell"  id="items[item_'+tableRowcount +'][unit_price]" name="items[item_'+tableRowcount +'][unit_price]" onkeypress="return only_numbers(event)">';
                        cell4.innerHTML= '<select type="text" class="cell"  id="items[item_'+tableRowcount +'][discount]" name="items[item_'+tableRowcount +'][discount]"  >';
                        cell5.innerHTML='<input  type="text" class="cell" value="0.00" id="items[item_'+tableRowcount +'][item_total]" name="items[item_'+tableRowcount +'][item_total]" readonly style="width:80%;" ><a style="display: inline-block;" onclick="removeRow(this)"><i class="fa fa-trash-alt pull-left gray"></i></a>';
         
                  

                    }
                    //delete table row
                    function removeRow(element){                
                        let row= element.closest('tr').rowIndex; 
                        document.getElementById("table-items").deleteRow(row);     
                        getInvoiceSummary();                 
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
                 
                        var cus_name        = document.getElementById('customer_name');
                        let invoice_date       = document.getElementById('invoice_date');
                        let barcode_tag     = document.getElementById('barcode_tag'); 
                        let total_noTax        = document.getElementById('total_noTax');
                        let Tax_amount         = document.getElementById('Tax_amount');
                        let total_withTax      = document.getElementById('total_withTax');
                        let  serial_num          =     document.getElementById('serial_num');
                        
                        let print_btn=     document.getElementById('print_btn'); 
                        // start xml object 
                        const xhttp = new XMLHttpRequest();
                        // start xml connection 
                        xhttp.open("POST", "<?php echo site_url('B_sales/edit_invoice/json_data/');?>"+id,true);
                        // send object 
                        xhttp.send();
                        // if connection successful 
                        xhttp.onload = function() {
                            if(this.status == 200){
                                
                                var invoice_details = JSON.parse(this.responseText); 
                           
                                cus_name.value       = invoice_details['ci_customer_id'];
                                barcode_tag.src="http://localhost/imanager/B_sales/getSerial_ticket/"+invoice_details['ci_serial_num']; 
                                 invoice_date.value       = invoice_details['ci_date']; 
                                 serial_num.value= invoice_details['ci_serial_num'];
                                 total_noTax.value   = invoice_details['ci_total']; 
                                //  $sale_available     = invoice_details['invoice_num']; 
                                Tax_amount.value       = invoice_details['ci_tax_id']; 
                                //  $Tax_amount        =
                                total_withTax.value      = invoice_details['ci_due'];

                                print_btn.hidden=false; 
                                print_btn.onclick= function() { redirect(id);}
                                var items= invoice_details['items'];      
                                                 
                            
                                insert_inv_item(items); 
                                                    
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
                           price_field.parentNode.nextElementSibling.nextElementSibling.childNodes[0].value=total_amount.toFixed(2);   
                                     
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
                        let form = document.getElementById('customer_invoice');
                        let form_button = document.getElementById('action_btn');
              
                        //change form action 
                        form_button.innerHTML='تحديث'; 
                        form.action ="http://localhost/imanager/B_sales/update_invoice/"+id_value; 

                    }

                    function redirect(invoice_id){
                        console.log(invoice_id);
                      
                    var url = "http://localhost/imanager/B_sales/print_invoice/"+invoice_id;
           
                    window.location=url;
                    }
 

           
                    loadItems();
             
                    loadSelectors();
                  
                    // invoice_status();
                    <?php if(isset($index) && $index==='show_inv_edit'){
                                        
                                         echo 'place_data();';}?>
            
                    
                </script>
