 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Productos</th>
                <th> $  </th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Comentarios</th>
                
                <th> </th>
            </tr>
        </thead>
        <tbody>
          
            <?php

              if(count($ventas) > 0) :

                for ($i=0; $i < count($ventas) ; $i++) 
                {  

                ?>
                    <tr>
                      <td><?=$ventas[$i]['venta']['id']?></td>
                      <td><?=$ventas[$i]['venta']['fecha']?></td>
                      <td>
                          <table  class="display tablaVentaProducto" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Prod.</th>
                                    <th>Cant.</th>
                                    <th>$C</th>
                                    <th>$V</th>
                                    <th>$G</th>
                                    <th>%G</th>  
                                </tr>
                            </thead>
                            <tbody>

                              <?php
                                foreach ($ventas[$i]['venta_productos'] as $key => $value) 
                                { ?>
                                  <tr>
                                    <td><?=$value['nombre']?></td>
                                    <td><?=$value['cantidad']?></td>
                                    <td><?=$value['precio_costo']?></td>
                                    <td><?=$value['precio_venta']?></td>
                                    <td><?=$value['ganancia']?></td>
                                    <td><?=$value['ganancia_porcentual']?>%</td>
                                  </tr>
                                 <?php
                                }
                              ?>
                                  
                            </tbody>
                          </table> 

                      </td>
                      <td> <?=$ventas[$i]['venta']['venta_final']?> </td>
                      <td><?=$ventas[$i]['venta']['nombre']?></td>
                      <td><?=$ventas[$i]['venta']['apellido']?></td>
                      <td><?=$ventas[$i]['venta']['email']?></td>
                      <td><?=$ventas[$i]['venta']['comentarios']?></td>
                      
                      <td> <a class="btn btn-primary" href=""><i class="fas fa-edit"></i> Editar</a> 
                          <a class="btn btn-danger" href=""><i class="fas fa-trash-alt"></i> Eliminar</a> 
                      </td> 
                   </tr>
          
                <?php
                }

              else:
                  echo "Sin ventas";
              endif;

            ?>

            <?php
              /* foreach ($ventas as $key => $value) { ?>
             
             <tr>
                <td><?=$value['id']?></td>
                <td><?=$value['fecha']?></td>
                <td><?=$value['nombre']?></td>
                <td><?=$value['apellido']?></td>
                <td><?=$value['email']?></td>
                <td><?=$value['comentarios']?></td>
                <td><?=$value['comentarios']?></td>
                <td> <a class="btn btn-primary" href=""><i class="fas fa-edit"></i> Editar</a> 
                    <a class="btn btn-danger" href=""><i class="fas fa-trash-alt"></i> Eliminar</a> 
                </td> 
             </tr>


            <?php } */ ?>
          
      
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Comentarios</th>
                <th>Productos</th>
                <th> </th>
            </tr>
        </tfoot>
    </table>



    <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable();
          } );


        $(document).ready(function() {
              $('.tablaVentaProducto').DataTable({

                 "paging":   false,
                  "ordering": false,
                  "info":     false,
                  "bFilter":     false,
              });
          } );



    </script>