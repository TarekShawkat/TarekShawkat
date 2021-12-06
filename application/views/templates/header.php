<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <title>مدير المخازن- iManager </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Main Styles -->
        <link rel="icon" href="<?php  echo base_url('assets/icons/'); ?>inventory_icon5.png">
        <link rel="stylesheet" href="<?php  echo base_url('assets/'); ?>css/css-main.css">
        <link rel="stylesheet" href="<?php  echo base_url('assets/'); ?>css/all.css">

    </head>
    <!-- /head -->
    <body>
        <div class="main-menu noPrint"> 
      
             
                <ul  class='menu-link unselectable'>
                    <li class='dropmenu' ><a href="<?php  echo base_url('welcome'); ?>"><i class="fas fa-home"></i>الرئيسية</a></li>
                    <li class='dropmenu' ><a ><i class="fas fa-box-open"></i>الاصناف<i class="fas fa-sort-down"></i></a>
                    <ul id ='' class='dropdown' >
                            <li><a href="<?php  echo base_url('B_items/edit_item/0');?>">إضافة صنف </a></li>
                            <li><a href="<?php  echo base_url('B_items'); ?>"> قائمة الأصناف </a></li>                        
                         
                        </ul>
                </li>
                <li class='dropmenu' ><a ><i class="fas fa-file-invoice-dollar"></i> مبيعات<i class="fas fa-sort-down"></i> </a>
                    <ul id ='' class='dropdown' >                      
                        <li><a href="<?php echo base_url('B_sales/edit_invoice/new');?>"> فاتورة مبيعات</a></li>  
                     
                        <li><a href="<?php echo base_url('B_sales/sales_refund');?>"> مرتجع مبيعات</a></li>     
                        <li><a href="<?php  echo base_url('B_sales');?>">فواتير المبيعات</a></li>  
                                        
                    </ul>
                </li>      
                <li  class='dropmenu'><a><i class="far fa-building"></i>مشتريات<i class="fas fa-sort-down"></i></a>
                    <ul class='dropdown' >
                        <li><a href="<?php  echo base_url('B_purchase/edit_invoice/new');?>"> فاتورة مشتريات </a></li>                                     
                        <li><a href="<?php // echo base_url('B_sales');?>">مرتجع مشتريات</a></li>
                        <li><a href="<?php  echo base_url('B_purchase');?>"> فواتير المشتريات</a></li>     
                        <li><a a href="<?php  echo base_url('B_vendors'); ?>"> قائمة الموردين</a></li>
                    </ul>
                </li>
                    <li><a href=""><i class="fas fa-calculator"></i>الحسابات</a></li>
                
                </ul>
                <div class='logo'>
                <span>مدير المخازن</span>
                  <img src='<?php echo base_url('assets/');?>icons/inventory_icon12.png'></img>
                

                   
                </div>
           
            <!-- /header -->
        </div>
        <!-- /main-menu -->
        <div class="wrapper">
          <div class="main-content">  