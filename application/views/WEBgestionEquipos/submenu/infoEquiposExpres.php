
<table class="table table-sm table-white">
  <thead>
    <tr>
      <th scope="col" class=></th>
      <th scope="col" class="text-center" >Monitores</th>
      <th scope="col" class="text-center">Computadoras</th>
      <th scope="col" class="text-center">Impresoras</th>
      <th scope="col" class="text-center">UPS</th>
      <th scope="col" class="text-center">Telefonos</th>
      <th scope="col" class="text-center">Personas</th>
    </tr>
  </thead>

  <tbody>
   <!-- monitores -->
   <tr>
    <th scope="row" title="Todos los equipos registrados desde el comienzo">Total Registrados en el tiempo</th>
    <th class="text-center"><?= $contenido['M1'] ?></th>
    <th class="text-center"><?= $contenido2['PC1'] ?></th>
    <th class="text-center"><?= $contenido3['IMP1'] ?></th>
    <th class="text-center"><?= $contenido4['UP1'] ?></th>
    <th class="text-center"><?= $contenido5['TE1'] ?></th>
    <th class="text-center"><?= $contenido6['EM1'] ?></th>
  </tr>
  
  <tr>

    <th scope="row" class="btn-outline-primary text-black"  title="Fuera del inventario actual y son asignables">  <b>Disponibles</b> </th>

    <th  class="text-center"><?= $contenido['M4'] ?></th>
    <th  class="text-center"><?= $contenido2['PC4'] ?></th>
    <th  class="text-center"><?= $contenido3['IMP4'] ?></th>
    <th  class="text-center"><?= $contenido4['UP4'] ?></th>
    <th  class="text-center"><?= $contenido5['TE4'] ?></th>
    <th  class="text-center"><?= $contenido6['EM4'] ?></th>
  </tr>



  <tr>
    <th scope="row" class="btn-outline-danger text-black" title="Inventariado pero no estan disponibles para su uso" > <b>Resolver</b></th>
    <th class="text-center"> <?= $contenido['M3'] ?></th>
    <th class="text-center"> <?= $contenido2['PC3'] ?></th>
    <th class="text-center"> <?= $contenido3['IMP3'] ?></th>
    <th class="text-center"> <?= $contenido4['UP3'] ?></th>
    <th class="text-center"> <?= $contenido5['TE3'] ?></th>
    <th class="text-center"> <?= $contenido6['EM3'] ?></th>
  </tr>

  <tr>
    <th scope="row" class="btn-outline-success text-black" title="Inventariado y Disponible , no requiere cambios"> <b>Correcto</b> </th> 
    <th class="text-center"> <?= $contenido['M2'] ?>  </th>
    <th class="text-center"> <?= $contenido2['PC2'] ?>  </th>
    <th class="text-center"> <?= $contenido3['IMP2'] ?>  </th>
    <th class="text-center"> <?= $contenido4['UP2'] ?>  </th>
    <th class="text-center"> <?= $contenido5['TE2'] ?>  </th>
    <th class="text-center"> <?= $contenido6['EM2'] ?>  </th>
  </tr>

  <tr>
    <th scope="row" class="btn-outline-dark text-black" title="Fuera del inventario actual y  No Disponibles para su uso"> <b>Fuera de servicio</b></th>
    <th class="text-center"><?= $contenido['M5'] ?></th>
    <th class="text-center"><?= $contenido2['PC5'] ?></th>
    <th class="text-center"><?= $contenido3['IMP5'] ?></th>
    <th class="text-center"><?= $contenido4['UP5'] ?></th>
    <th class="text-center"><?= $contenido5['TE5'] ?></th>
    <th class="text-center"><?= $contenido6['EM5'] ?></th>
  </tr>



</tbody>
</table>