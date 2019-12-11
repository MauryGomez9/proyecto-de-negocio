<section>
  <header>
    <h1 class="Texto">Gestion de Productos</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Descripción</th>
          <th>Tipo Membresia</th>
          <th>Precio</th>
          <th class="right">
            <form action="index.php?page=Admin_donacion" method="post">
            <input type="hidden" name="iddonacion" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach mantenimiento_donaciones}}
        <tr>
          <td>{{iddonaciones}}</td>
          <td>{{descripcion_donacion}}</td>
          <td>{{tiempo}}</td>
          <td>{{pago}}</td>
          <td class="right">
            <form action="index.php?page=Admin_donacion" method="post">
              <input type="hidden" name="iddonacion" value="{{iddonaciones}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              
            </form>
          </td>
        </tr>
        {{endfor mantenimiento_donaciones}}
      </tbody>
    </table>
  </main>
</section>
