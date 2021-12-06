<div class='row dis-flex'>
    <div class="dashboard-cards">
        <h3> إجمالي المبيعات/اليوم</h3>
        <strong>  <?php echo $sales_Day->SalesByDay; ?>  </strong>
    </div>
    <div class="dashboard-cards">
    <h3>  فواتير بيع/اليوم</h3>
    <strong>   <?php echo $inv_Day->invoicesByDay; ?>  </strong>
    </div>
    <div class="dashboard-cards">
    <h3> إجمالي المبيعات/الشهر</h3>  
       <strong> <?php echo $sales_Month->SalesByMonth; ?>  </strong>
    </div>

    <div class="dashboard-cards">
    <h3>  فواتير بيع/الشهر</h3>
    <strong>  <?php echo $inv_Month->invoicesByMonth; ?>  </strong>
    </div>
</div>


