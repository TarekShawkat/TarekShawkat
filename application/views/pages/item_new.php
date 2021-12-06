
        <?php if($status){$disabled="disabled"; $hidden="hidden";} else {$disabled=""; $hidden="";}
            
        ?>
                
                <div class="row" id="create_product" >
                    <h4 class="box-title "<?php echo $hidden;?>>إضافة منتج:</h4>
                    <div class="content">
                    <form id="items_form" class="form-inline" action="<?php     if(isset($item_id)){echo base_url('B_items/edit_item/3/').$item_id;}else{ echo base_url('B_items/edit_item/0/1');}?>" method="POST" autocomplete="off" <?php ?> >
                            <div class='form-group main' >
                                <div class='input-group title'>
                                    <label for="item_name">اسم الصنف</label>
                                    <input class= "btn-xbig" type="text" id="item_name" name="item_name" value="<?php if(isset($item)){echo $item[0]['item_name'];} ?>" <?php echo $disabled;?> >
                                </div>
                                <div class='input-group vertical'>
                                    <label for="sale_available"> متاح للبيع</label>
                                    <input class= "" type="checkbox" id="sale_available" name="sale_available" <?php echo $disabled;?>  >
                                </div>
                                <div class='input-group vertical'>
                                    <label for="purchase_available"> متاح للشراء</label>
                                    <input class= "" type="checkbox"  id="purchase_available" name="purchase_available" <?php echo $disabled;?> >
                                </div>
                            </div>
                          
                            <div class="tabbed">
                                <input type="radio" id="general_info" name="tabbed" class="tab-btn" checked="checked" >
                                <label for="general_info" class="tab-label">معلومات عامه</label>
                                <div class="tab">
                                    <div class='form-group'>
                            
                                        <div class='input-group'>
                                            <label for="item_code"> كود الصنف</label><br>
                                            <input type="text" class="btn-small" id="item_serial" name="item_serial" value="<?php  if(isset($item)){echo $item[0]['item_serial'];} ?>" <?php echo $disabled;?> ><br>
                                        </div>
                                     
                                        <div class='input-group'>
                                            <label for="country">بلد المنشأ</label><br>
                                            <select type="text" id="country" name="country" class="btn-xsmall small" <?php echo $disabled;?>  >
                                                <option></option>   
                                                <option selected >الصين</option>
                                                <option>فرنسا</option>
                                                <option>كوريا</option>
                                                <option>الهند</option>
                                                <option>فلبين</option>
                                                <option>اليابان</option>
                                                <option>المانيا</option>
                                                <option>ايطاليا</option>
                                            </select>                                
                                        </div>
                                      
                                    </div>
                                </div>
                            
                                <input type="radio" id="sales" name="tabbed" class="tab-btn">
                                <label for="sales" class="tab-label">المبيعات</label>
                                <div class="tab">
                                    <div class='input-group input-icon-right'>
                                        <label for="sale_price">سعر البيع</label><br>
                                        <input type="number" step="0.01" class="btn-xsmall"  id="item_unit_price" name="item_unit_price"  value="<?php if(isset($item)){echo $item[0]['item_unit_price'];} ?>" <?php echo $disabled;?>  ><br>
                                        <i>ج.م</i>
                                    </div>
                                    <div class='input-group input-icon-right'>
                                        <label for="cost_price">سعر الجمله</label><br>
                                        <input type="number" step="0.01" class="btn-xsmall"  id="item_cost_price" name="item_cost_price" oninput="cost(this.value)" value="<?php if(isset($item)){echo $item[0]['item_cost_price'];} ?>" <?php echo $disabled;?> ><br>
                                        <i>ج.م</i>
                                    </div>
                                    <div class='input-group'>
                                        <label for="item_discount"> خصم العميل</label><br>
                                        <input type="text" class="btn-xxsmall" id="item_discount_id" name="item_discount_id" value="<?php if(isset($item)){echo $item[0]['item_discount_id'];} ?>" <?php echo $disabled;?> ><br>
                                        <i>%</i>
                                    </div>
                                    <div class='input-group'>
                                        <label for="profit_margin">هامش الربح</label><br>
                                        <input type="text" class="btn-xxsmall" id="profit_margin"   oninput="margin(this.value)" name="profit_margin" value="<?php if(isset($item)){echo $item[0]['profit_margin'];} ?>" <?php echo $disabled;?> ><br>
                                        <i>%</i>
                                    </div>
                            
                          
                       
                                </div>
                            
                                <input type="radio" id="inventory" name="tabbed" class="tab-btn">
                                <label for="inventory" class="tab-label">المخزن</label>
                                <div class="tab">
                           
                                    <div class='input-group'>
                                        <label for="quantity"> الكمية</label><br>
                                        <input type="text" class="btn-xsmall" id="item_quantity" name="item_quantity" value="<?php if(isset($item)){echo $item[0]['item_quantity'];} ?>" <?php echo $disabled;?> ><br>
                                    
                                    </div>
                                </div>
                                <input type="radio" id="variant" name="tabbed" class="tab-btn">
                                <label for="variant" class="tab-label">معلومات المنتج</label>
                                <div class="tab">
                                    
                                    <div class='input-group'>
                                        <label for="part_number"> رقم الجزء  </label><br>
                                        <input type="text" class="btn-small" id="part_number" name="part_number" value="<?php if(isset($item)){echo $item[0]['part_number'];} ?>" <?php echo $disabled;?> ><br>
                                    </div>
                                    <div class='input-group'>
                                        <label for="car_brand">السياره</label><br>
                                        <select type="text" id="car_brand" name="car_brand" class="btn-xsmall small" >
                                            <option></option>   
                                            <option >فيات</option>
                                            <option>مرسيدس</option>
                                            <option>تيوتا</option>
                                            <option>نيسان</option>
                                            <option>فيات</option>
                                            <option>سوزكي</option>
                                            <option>سوبارو</option>
                                            <option>سيات</option>
                                        </select>                                
                                    </div>
                                    <div class='input-group'>
                                        <label for="car_model">الموديل</label><br>
                                        <select type="text" id="car_model" name="car_model" class="btn-xsmall small" >
                                            <option></option>   
                                            <option >E200</option>
                                            <option>التو</option>
                                            <option>صني</option>
                                            <option>امبريزا</option>
                                            <option>تيجو</option>
                                            <option>ليون</option>
                                    
                                        </select>                                </div>
                                    <div class='input-group'>
                                        <label for="car_year">سنه الصنع</label><br>
                                        <select type="text" id="car_year" name="car_year" class="btn-xsmall small" >
                                            <option></option>   
                                            <option value=1 >2007</option>
                                            <option value=2>2008</option>
                                            <option>2009</option>
                                            <option>2010</option>
                                            <option>2011</option>
                                            <option>2012</option>
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                        </select>
                                    </div>
                                </div>
                            
                            </div>        
                            <div class="form-button">
                                <button type="submit" from="items_form" <?php echo $hidden;?>>حفظ</button>                  
                                <button type="button"  class="btn-fade" <?php echo $hidden;?>>الغاء</button>
                            </div>
                       
                        </form>
                    </div>
                    <!-- /content -->
                </div>
                <!-- /end of row -->
                <script>
                    function margin(val) {
                        val = parseFloat(val);
                        if(!document.getElementById("item_cost_price").value)
                        {
                            return; 
                        }
                        else
                        {
                            let cost_price = parseFloat(document.getElementById("item_cost_price").value);                         
                            unit_price = (val/100 * cost_price) + cost_price; 
                            document.getElementById("item_unit_price").value = parseFloat(unit_price).toFixed(2); 
                        }               
                    }

                    function cost(x){
                        x = parseFloat(x);
                        if(!document.getElementById("profit_margin").value )
                        {
                            return; 
                        }
                        else {
                            let p_Margin = parseFloat(document.getElementById("profit_margin").value);                      
                            unit_price = (p_Margin/100 * x) + x;                        
                            document.getElementById("item_unit_price").value =  parseFloat(unit_price).toFixed(2); 
                        }
                    }

                </script>
