
            </div>
            <!-- /end of main-content -->
        </div>
        <!-- /end of wrapper -->

        <script src="<?php  echo base_url('assets/'); ?>scripts/tableSearch.js"> </script>
        <script src="<?php  echo base_url('assets/'); ?>scripts/sorttable.js"></script>
        <script src="<?php    echo base_url('assets/'); ?>scripts/modal.js"></script>
        <script src="<?php  echo base_url('assets/'); ?>scripts/paginate.js"></script>
        <script src="<?php  echo base_url('assets/'); ?>scripts/multiTasking.js"></script>
        <script src="<?php  echo base_url('assets/'); ?>scripts/dropdown.js"></script>
        <script>
            let options = {
                numberPerPage:10, //Cantidad de datos por pagina
                goBar:false, //Barra donde puedes digitar el numero de la pagina al que quiere ir
                pageCounter:false, //Contador de paginas, en cual estas, de cuantas paginas
            };

            let filterOptions = {
                el:'#searchable' //Caja de texto para filtrar, puede ser una clase o un ID
            };

            // paginate.init('.paginated',options,filterOptions);

            
        </script>
    
    </body>
</html>