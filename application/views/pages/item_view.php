
        <?php  if($status){$disabled="disabled"; $hidden="hidden";} else {$disabled=""; $hidden="";}?>                
                <div class="row">
                
                    <div class="content">
                        <form id="items_form" class="form-inline" action="_POST.php" method="POST" autocomplete="off" <?php ?> >
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
                                            <input type="text" class="btn-small" id="item_code1" name="item_code1" value="<?php  if(isset($item)){echo $item[0]['item_serial'];} ?>" <?php echo $disabled;?> ><br>
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
                                        <input type="number" step="0.01" class="btn-xsmall"  id="sale_price1" name="<?php if(isset($item)){echo $item[0]['item_unit_price'];} ?>" <?php echo $disabled;?>  ><br>
                                        <i>ج.م</i>
                                    </div>
                                    <div class='input-group input-icon-right'>
                                        <label for="cost_price">سعر التكلفة</label><br>
                                        <input type="number" step="0.01" class="btn-xsmall"  id="cost_price" name="cost_price"  value="<?php if(isset($item)){echo $item[0]['item_unit_price'];} ?>" <?php echo $disabled;?> ><br>
                                        <i>ج.م</i>
                                    </div>
                                    <div class='input-group'>
                                        <label for="profit_margin">هامش الربح</label><br>
                                        <input type="text" class="btn-xsmall" id="profit_margin" name="profit_margin" value="<?php if(isset($item)){echo $item[0]['profit_margin'];} ?>" <?php echo $disabled;?> ><br>
                                        <i>%</i>
                                    </div>
                          
                       
                                </div>
                            
                                <input type="radio" id="inventory" name="tabbed" class="tab-btn">
                                <label for="inventory" class="tab-label">المخزن</label>
                                <div class="tab">
                           
                                    <div class='input-group'>
                                        <label for="quantity"> الكمية</label><br>
                                        <input type="text" class="btn-xsmall" id="quantity" name="quantity" value="<?php if(isset($item)){echo $item[0]['item_quantity'];} ?>" <?php echo $disabled;?> ><br>
                                    
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
                                <button type="reset" class="btn-fade" <?php echo $hidden;?>>مسح</button>
                            </div>
                        </form>
                    </div>
                    <!-- /content -->
                </div>
                <!-- /end of row -->
                