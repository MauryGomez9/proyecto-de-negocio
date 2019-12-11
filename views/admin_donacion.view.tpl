<h1 class="Texto">CONSOLAS</h1>
<section class="row">
<form action="index.php?page=Admin_donacion" method="post" class="col-8 col-offset-2">
  {{if hasErrors}}
    <section class="row">
      <ul class="error">
        {{foreach errores}}
          <li>{{this}}</li>
        {{endfor errores}}
      </ul>
    </section>
  {{endif hasErrors}}
  <input type="hidden" name="mode" value="{{mode}}"/>
  <input type="hidden" name="xcfrt" value="{{xcfrt}}" />
  <input type="hidden" name="btnConfirmar" value="Confirmar" />
  {{if showIdDonacion}}
  <fieldset class="row">
    <label class="col-5" for="iddonacion">Código de Compra</label>
    <input type="text" name="iddonacion" id="iddonacion" readonly value="{{iddonaciones}}" class="col-7" />
  </fieldset>
  {{endif showIdDonacion}}
  <fieldset class="row">
    <label class="col-5" for="dscdonacion">Descripción Producto</label>
    <input type="text" name="dscdonacion" id="dscdonacion" {{readonly}} value="{{descripcion_donacion}}" class="col-7" />
  </fieldset>
  <fieldset class="row">
    <label class="col-5" for="prcdonacion">Precio Producto</label>
    <input type="text" name="prcdonacion" id="prcdonacion" {{readonly}} value="{{pago}}" class="col-7" />
  </fieldset>
  <fieldset class="row">
    <label class="col-5" for="estdonacion">Tipo Membresia</label>
    <select name="estdonacion" id="estdonacion" class="col-7" {{selectDisable}} {{readonly}} >
      {{foreach tiempoDonaciones}}
        <option value="{{cod}}" {{selected}}>{{dsc}}</option>
      {{endfor tiempoDonaciones}}
    </select>
  </fieldset>
  <fieldset class="row">
    <div class="right">
      {{if showBtnConfirmar}}
      <button type="button" id="btnConfirmar" >Confirmar</button>
      &nbsp;
      {{endif showBtnConfirmar}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </div>
  </fieldset>
  <!--
   <td>{{idmoda}}</td>
    <td>{{dscmoda}}</td>
    <td>{{prcmoda}}</td>
    <td>{{ivamoda}}</td>
    <td>{{estmoda}}</td>
   -->
</form>
</section>
<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=mantenimiento_donaciones");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
