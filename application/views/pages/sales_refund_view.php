
<div class="row noMargin">
    <div class="label_container">
        <h1 class="box-title "> مرتجع فاتورة:</h1>
    </div>
    <form id="sales_refund" name="sales_refund" class="form-inline" action="<?php //echo base_url('B_sales/invoiceBySerial') ?>" onsubmit="invoiceBySerial()" method="POST" autocomplete="off">
        <div class='form-group ' >
            <div class='input-group '>
                <label for="serial_number">  مسلسل الفاتورة </label>
                <input class= "btn-sm input-icon-right" type="text" id="serial_number" name="serial_number"  dir="ltr" >
            </div>
        </div>
        <div class="form-button">
                                    <button id="action_btn" type="button" form="sales_refund" onclick="invoiceBySerial()" >تحقق</button>
                                    <button type="button" onclick="location.href='http://localhost/imanager/B_sales'" class="btn-fade">الغاء</button>
        </div>
    </form>
</div>
<div id="invoice_form" class="row noMargin" hidden >
                    <div class="label_container">
                    <!-- <h4 class="box-title ">فاتورة رقم:</h4> -->
                   <span> <img id='barcode_tag'class="barcode" alt="" src="<?php if(isset($barcode)){echo site_url('B_sales/getSerial_ticket/').$barcode;} ?>"/></span>
                   </div> 
                   <div class="content">
                        <form id="customer_invoice" name="customer_invoice" class="form-inline" action="<?php //echo base_url('B_sales/save_invoice') ?>" onsubmit="approve_refund()" method="POST" autocomplete="off">
                            <div class='form-group ' >
                                <div class='input-group '>
                                <input class= "btn-med" type="text" id="serial_num" name="serial_num" value='' hidden>
                                <input class= "btn-med" type="text" id="invoice_id" name="invoice_id" value='' hidden>
                                    <label for="vendor_name">اسم العميل</label>
                                    <input class= "btn-med" type="text" id="customer_name" name="customer_name" disabled >
                            
                                </div>
                                <div class='input-group '>
                                    <label for="invoice_date">تاريخ الفاتورة </label>
                                    <input class= "btn-sm" type="date" id="invoice_date" name="invoice_date" readonly>
                                </div>
                            </div>
                            <div class="table-form">
                                <table id='table-items' class="items-table ">
                                        <col style="width: 5%;" />
                                        <col style="width: 30%;" />
                                        <col style="width: 20%;" />
                                        <col style="width: 15%;" />
                                        <col style="width: 15%;" />
                                        <col style="width: 10%;" />
                                    <thead>     
                                        <tr>
                                        <th></th>
                                            <th>الصنف</th>
                                            <th>الكمية</th>
                                            <th>سعر الوحده</th>
                                            <th>ضريبة</th>
                                            <th>المجموع</th>
                                        </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" id="items[item_1][selected]" name="items[item_1][selected]" ></td>
                                            <td><input  class="cell" id="items[item_1][cus_id]" name="items[item_1][cus_id]"  hidden >
                                                <input  class="cell" id="items[item_1][item_id]" name="items[item_1][item_id]"  required hidden >
                                                <input  type="text " class="cell" id="items[item_1][item_name]" name="items[item_1][item_name]" list="items-list" >
                                     
                                           
                                            </td>
                                            <td><input  type="number" min="0" step="1" value='0' oninput="quantity(this)" class="cell only_numbers" id="items[item_1][item_quantity]" name="items[item_1][item_quantity]" onkeypress="return only_numbers(event)" readonly></td>
                                            <td><input  type="number" value='0.00' step=".01" oninput="unit_price(this)" class="cell" id="items[item_1][unit_price]" name="items[item_1][unit_price]" onkeypress="return only_numbers(event)" readonly></td>
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
                                    <button id="next_btn" type="button" onclick="check_refund_items()">التالي</button>
                                    <button type="button" onclick="location.href='<?php echo base_url('/B_sales/sales_refund');?>'" class="btn-fade">الغاء</button>
                                </div>
                      
                                <button id="print_btn" type="button"   hidden >معاينة</button>

                          
                            </div>
                        </form>
                    </div>
                    <!-- /end of content -->
                </div>
                <!-- /end of row -->
                <script> 

            var tableRowcount=1; 

            var serial_reserver; 

            // document.getElementById("next_btn").addEventListener("click", approve_refund); 

                function check_refund_items(){
                    let selected_items={};
                    let items_array=[]; 
                    var counter=0; 
                    table_rows = document.getElementById('table-items').tBodies[0].rows.length; 
           
                    
                    for (let i = 1; i < table_rows+1; i++) {
                     
                       checkbox_status= document.getElementById('items[item_'+i+'][selected]');
        
                       if(checkbox_status.checked){
                            counter++
                           serial_num= document.getElementById('serial_num').value; 
                           inv_id = document.getElementById('invoice_id').value; 
                           
                            item_selected_id = checkbox_status.parentElement.parentElement.children[1].children[1].value;
                            item_selected_name=checkbox_status.parentElement.parentElement.children[1].children[3].innerHTML; 
                            item_selected_quantity = checkbox_status.parentElement.parentElement.children[2].children[0].value;
                            item_selected_price = checkbox_status.parentElement.parentElement.children[3].children[0].value;
                            item_selected_tax = checkbox_status.parentElement.parentElement.children[4].children[0].value;
                            console.log(item_selected_price);
                            selected_items = {
                                                inv_id,
                                                serial_num,
                                                item_selected_id,
                                                item_selected_name,
                                                item_selected_quantity,
                                                item_selected_price,
                                                item_selected_tax
                                            };
                            items_array.push(selected_items);                          
                       }              
                    }
                    console.log(items_array); 
                    if(counter){
                  
                    // console.log(items_array[1].item_selected_name);
                    let paragraph_content =""; 
                    var main_form= document.createElement("form");
                        main_form.id="refund_data"; 
                        main_form.method='POST';
                        main_form.action='refund_process';
                        
                    var main_div= document.createElement("div");
               
                    
                    var serial_num = document.createElement("input");
                        serial_num.id= "serial_num"
                        serial_num.type = "text";
                        serial_num.value = document.getElementById('serial_num').value
                        serial_num.hidden=true; 
                        serial_num.name='serial_number';
                        main_div.appendChild(serial_num); // put it into the DOM
                    var invoice_id = document.createElement("input");
                        invoice_id.id= "invoice_id"
                        invoice_id.type = "text";
                        invoice_id.value = document.getElementById('invoice_id').value
                        invoice_id.hidden=true; 
                        invoice_id.name='invoice_id';
                    main_div.appendChild(invoice_id); // put it into the DOM
//we have to calculate the total and the taxes of the invoice before we send the form
//
                    var invoice_tax = document.createElement("input");
                        invoice_tax.id= "invoice_tax"
                        invoice_tax.type = "text";
                        // invoice_tax.value = document.getElementById('invoice_id').value
                        invoice_tax.hidden=true; 
                        invoice_tax.name='invoice_tax';
                    main_div.appendChild(invoice_tax); // put it into the DOM
                    var invoice_total = document.createElement("input");
                        invoice_total.id= "invoice_total"
                        invoice_total.type = "text";
                        // invoice_total.value = document.getElementById('invoice_id').value
                        invoice_total.hidden=true; 
                        invoice_total.name='invoice_total';
                    main_div.appendChild(invoice_total); // put it into the DOM
               
                    var table=document.createElement("Table");
                    table.id='inv_ref_total'; 
                    table.style.border='none'; 
            
               
                    main_div.appendChild(table);
              
                    
                    for (let i=0; i < items_array.length; i++){
                        // paragraph_content +='<label for="serial_number">الصنف</label><input type=text  value="'+items_array[i].item_selected_name+'"><label for="serial_number">الكمية</label> <input type=number class="btn-xxsmall" value="'+items_array[i].item_selected_quantity+'"><br>';  
                        let rowCount = table.rows.length;
                        let row = table.insertRow(rowCount);
                
                   
                        let label=document.createElement("label");
                            label.innerHTML= "الصنف";
                        let item_id = document.createElement("input");
                            item_id.type = "text";
                            item_id.value = items_array[i].item_selected_id;
                            
                            item_id.hidden=true; 
                            item_id.name='items[item_'+(i+1)+'][item_id]'; 
                        let input = document.createElement("input");
                            input.type = "text";
                            input.value = items_array[i].item_selected_name; // set the CSS class
                            input.className ="btn-med";
                            input.readOnly =true;
                            input.disabled =true;
                            input.name='items[item_'+(i+1)+'][item_name]';
                     
                      
                        let quantity_label = document.createElement("label");
                            quantity_label.innerHTML="الكميه";
                        let quantity_input= document.createElement("input");
                            quantity_input.type = "number";
                            quantity_input.min =1;
                            quantity_input.max = items_array[i].item_selected_quantity;
                            quantity_input.className ="btn-xxsmall";
                            quantity_input.value = 0; 
                            quantity_input.name='items[item_'+(i+1)+'][item_quantity]';
                            quantity_input.oninput=function(){ calculate_total(this.value,document.getElementById('items[item_'+(i+1)+'][item_price]'),document.getElementById('items[item_'+(i+1)+'][item_tax]'),document.getElementById('items[item_'+(i+1)+'][total]') )};

                        let price_input = document.createElement("input");
                            price_input.id= 'items[item_'+(i+1)+'][item_price]';
                            price_input.type = "text";
                            price_input.value = items_array[i].item_selected_price;
                            price_input.hidden=true; 
                            price_input.name='items[item_'+(i+1)+'][item_price]';
                        let tax_input = document.createElement("input");
                            tax_input.id= 'items[item_'+(i+1)+'][item_tax]';
                            tax_input.type = "text";
                            tax_input.value = items_array[i].item_selected_tax;
                            tax_input.hidden=true; 
                            tax_input.name='items[item_'+(i+1)+'][item_tax]';

                        let total_output = document.createElement("input");
                            total_output.id= 'items[item_'+(i+1)+'][total]';
                            total_output.type = "text";
                            total_output.value = items_array[i].item_selected_tax;
                            total_output.hidden=true; 
                            total_output.name='items[item_'+(i+1)+'][total]';
                        let br=document.createElement("br");
                        // let span = document.createElement("SPAN");
                        //     span.className = "item_label";
                        // let text = document.createTextNode(items_array[i].item_selected_name)
                        //     span.appendChild(text)
                        //     input.appendChild(span);
                        let cell0=row.insertCell(0);// name
                        let cell1 = row.insertCell(1);// quantity
                        let cell2 = row.insertCell(2);// price
                            cell2.hidden=true; 
                        let cell3 = row.insertCell(3);// tax
                        cell3.hidden=true; 
                        let cell4 = row.insertCell(4);// total
                        cell4.hidden=true; 
                        cell0.appendChild(label); // put it into the DOM
                        cell0.appendChild(item_id);
                        cell0.appendChild(input);
                        cell1.appendChild(quantity_label);
                        cell1.appendChild(quantity_input);
                        cell2.appendChild(price_input);
                        cell3.appendChild(tax_input);
                        cell4.appendChild(total_output);
                        // main_div.appendChild(br);
                    
                     
                    }
                    main_form.appendChild(main_div);
                    // console.log(main_div);
                    let title_content=' تاكيد مرتجع   ';           
                    // let paragraph_content='<label for="serial_number">الصنف</label><input type=text  value="'+items_array[0].item_selected_name+'"><label for="serial_number">الكمية</label> <input type=number class="btn-xxsmall"><br><label for="serial_number">الصنف</label> <input type="text" id="serial_number" oninput="get_approval()" placeholder=" "><label for="serial_number">الكمية</label> <input type=number class="btn-xxsmall">';
                    // let destination = ;          
                    createModal('refund','refund_process',title_content,main_form);
                            document.getElementById('id01').style.display='block';      
                   }else{
                            alert('برجاء إختيار الصنف المرتجع!')
                   
                    }
                }

                function calculate_total(quantity,price,tax,total){
                    var refunded_items_total = Number(0); 
                    // console.log(quantity); 
                    // console.log(price.value);
                    // console.log(tax);
                    refunded_items_total = quantity*price.value; 
                    total.value= refunded_items_total.toFixed(2);

                    var ref_item_total=Number(0); ; 
                    let ref_items=document.getElementById('inv_ref_total').rows; 

                    for (let index = 0; index < ref_items.length; index++) {
                        console.log(ref_items[index].cells[4].firstChild.value);
                        ref_item_total += Number(ref_items[index].cells[4].firstChild.value);
                        console.log('total'+ ref_item_total); 
                    }

                    document.getElementById('invoice_total').value=ref_item_total.toFixed(2);
                    
                }
            

                function approve_refund(){
                    let title_content='برجاء ادخال مسلسل الفاتورة ';           
                    let paragraph_content='<label for="serial_number"></label> <input type="text" id="serial_number" oninput="get_approval()" placeholder=" مسلسل الفاتورة ">';
                            createModal('warning','destination',title_content,paragraph_content);
                            document.getElementById('id01').style.display='block';           
                }

                function get_serial(){
                    let    title_content='برجاء ادخال مسلسل الفاتورة '; 
                    //   let paragraph_content='هل تريد حذف:';
                    let paragraph_content='<label for="serial_number"></label> <input type="text" id="serial_number" oninput="get_approval()" placeholder=" مسلسل الفاتورة ">';
                    //   let destination= e.target.href;
                    //   e.preventDefault();
                    createModal('warning','destination',title_content,paragraph_content);
                    document.getElementById('id01').style.display='block';              
                    return; 
                }

                function only_numbers(e,allow_decimal){               
                    if(!((e.charCode >= 48 && e.charCode <= 57) || (e.charCode ===46))){
                        return e.preventDefault();
                        }
                } 

                function invoiceBySerial(){
          
                    // start xml object 
                
                    var serial_number= document.getElementById('serial_number').value; 
                    if (serial_reserver == serial_number){
                         return false; 

                    }
                    
        
                    if (serial_number==0){
                        alert("برجاء ادخال مسلسل الفاتوره");  	
                        return false; 
                    }
                    else if (serial_number.length !==13){
                        alert("برجاء إدخال رقم فاتوره صحيح");  	
                        return false; 
                    }
                    var invoice_id  = document.getElementById('invoice_id'); 
                    var cus_name        = document.getElementById('customer_name');
                   let invoice_date       = document.getElementById('invoice_date');
                   let barcode_tag     = document.getElementById('barcode_tag'); 
                   let total_noTax        = document.getElementById('total_noTax');
                   let Tax_amount         = document.getElementById('Tax_amount');
                   let total_withTax      = document.getElementById('total_withTax');
                   let  serial_num          =     document.getElementById('serial_num');

                    const xhttp = new XMLHttpRequest();
                    // start xml connection 
                    xhttp.open("GET", "<?php  echo site_url('B_sales/invoiceBySerial/');?>"+serial_number,true);
                    // send object 
                    xhttp.send();
                    // if connection successful 
                    xhttp.onload = function() {
                        if(this.status == 200){

                            serial_reserver = serial_number; 

                             document.getElementById('invoice_form').hidden =false; 
                            var invoice = JSON.parse(this.responseText); 
                            
                            invoice_id.value = invoice['ci_id'];
                            cus_name.value       = invoice['ci_customer_id'];
                            barcode_tag.src="http://localhost/imanager/B_sales/getSerial_ticket/"+invoice['ci_serial_num']; 
                            invoice_date.value       = invoice['ci_date']; 
                            serial_num.value= invoice['ci_serial_num'];
                            total_noTax.value   = invoice['ci_total']; 
                           //  $sale_available     = invoice_details['invoice_num']; 
                            Tax_amount.value       = invoice['ci_tax_id']; 
                           //  $Tax_amount        =
                            total_withTax.value      = invoice['ci_due'];      
                           
                            var items= invoice['items'];
                           
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
                        
                        
                                var t = document.createTextNode(items[i]['item_name']);
                        
                                x.appendChild(t);
                     
                                item_name.parentNode.appendChild(x); 

                                get_total(price);  
                                if(tableRow === items.length){break;}   
                                                            
                                insert_tRow();                                                                           
                                                                                
                                } 
                                getInvoiceSummary();  

                                //check if the invoice has refunded items 
                                const xhttp = new XMLHttpRequest();
                                // start xml connection 
                                xhttp.open("GET", "<?php  echo site_url('B_sales/retrieve_refunded_invoice/');?>"+invoice_id.value,true);
                                // send object 
                                xhttp.send();
                                // if connection successful 
                                xhttp.onload = function() {
                                if(this.status == 200){
                                let refund_items = JSON.parse(this.responseText); 
                                    console.log(refund_items);
                                }
                                }

                            }
                            else if(this.status == 500){
                                alert("  رقم الفاتوره غير موجود");  	
                                return false; 
                            }
                            // document.getElementById('serial_number').disabled = true; 
                        }
                }

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

                function insert_tRow(){
                        tableRowcount++;
                        var table = document.getElementById("table-items");
                        var rowCount = table.rows.length;
                        var row = table.insertRow(rowCount);
                
                        var cell0=row.insertCell(0);// checkbox
                        var cell1 = row.insertCell(1);// id
                        var cell2 = row.insertCell(2);// code
                        var cell3 = row.insertCell(3);//serial
                        var cell4 = row.insertCell(4);// name 
                        var cell5 = row.insertCell(5);// total

                        cell0.innerHTML='<input type="checkbox" id="items[item_'+tableRowcount +'][selected]" name="items[item_'+tableRowcount +'][selected]" />'
                        cell1.innerHTML='<input  class="cell" id="items[item_'+tableRowcount +'][cus_id]" name="items[item_'+tableRowcount +'][cus_id]"  hidden ><input  class="cell" id="items[item_'+tableRowcount +'][item_id]" name="items[item_'+tableRowcount +'][item_id]" hidden><input  type="text" class="cell" id="items[item_'+tableRowcount +'][item_name]" name="items[item_'+tableRowcount +'][item_name]" list="items-list" >';
                        cell2.innerHTML= '<input oninput="quantity(this)" type="number" value="0" class="cell only_numbers" step="1" id="items[item_'+tableRowcount +'][item_quantity]" name="items[item_'+tableRowcount +'][item_quantity]" onkeypress="return only_numbers(event)">';
                        cell3.innerHTML= '<input  oninput="unit_price(this)" type="number" value="0.00" step=".01" class="cell"  id="items[item_'+tableRowcount +'][unit_price]" name="items[item_'+tableRowcount +'][unit_price]" onkeypress="return only_numbers(event)">';
                        cell4.innerHTML= '<select type="text" class="cell"  id="items[item_'+tableRowcount +'][discount]" name="items[item_'+tableRowcount +'][discount]"  >';
                        cell5.innerHTML='<input  type="text" class="cell" value="0.00" id="items[item_'+tableRowcount +'][item_total]" name="items[item_'+tableRowcount +'][item_total]" readonly style="width:80%;" ><a style="display: inline-block;" onclick="removeRow(this)"><i class="fa fa-trash-alt pull-left gray"></i></a>';
         
                  

                }

                function getInvoiceSummary(){
                        var sum = Number(0); 
                  
                        let total_noTax     =  document.getElementById("total_noTax"); 
                        let Tax_amount      =  document.getElementById("Tax_amount");
                        let total_withTax   =  document.getElementById("total_withTax");
                        let table=document.getElementById('table-items').getElementsByTagName('tr');
                   
                        for(i=1; i<table.length; i++){
                           row_total= table[i].getElementsByTagName('td')[5].childNodes[0].value;
              
                            sum += Number(row_total); 
                        }
                       
                        total_noTax.value   =   sum.toFixed(2); 
                        total_withTax.value =   sum.toFixed(2);  
                      
                }

               
            </script>