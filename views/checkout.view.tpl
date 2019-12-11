<section>
  <h1 class="Texto">Pago con PayPal</h1>
  <section class="row">
    <section class="col-md-8 col-offset-2">
      <form action="index.php?page=checkout" method="post">
        <fieldset class="row bg-blue-grey">
            <div class="col-md-4"><b>Descripción</b></div>
            <div class="col-md-4 right"><b>Tiempo</b></div>
            <div class="col-md-4 right"><b>Precio</b></div>
        </fieldset>

        <fieldset class="row">
            <input class="col-md-4" value="{{concepto}}" name="name" type="text"/>
            <input class="col-md-4" value="{{time}}" name="time" type="text"/>
            <input class="col-md-4" value="{{precio}}" name="price" type="text"/>
        </fieldset>

        <fieldset>
          <div class="row">
            <div class="col-md-1"></div>
            <label class="col-md-4">Nombre completo: &nbsp;&nbsp;&nbsp;</label>
            <input class="col-md-6" type="text" name="txtNombre" required/>
          </div>
          <div class="row">
            <div class="col-md-1"></div>
            <label class="col-md-4">Número de Identidad: &nbsp;&nbsp;&nbsp;</label>
            <input class="col-md-6" type="text" name="txtIdentidad" required/>
          </div>
          <div class="row">
            <div class="col-md-1"></div>
            <label class="col-md-4">Télefono móvil: &nbsp;&nbsp;&nbsp;</label>
            <input class="col-md-6" type="text" name="txtPhone" required/>
          </div>
          <div class="row">
            <div class="col-md-1"></div>
            <label class="col-md-4">Correo electrónico: &nbsp;&nbsp;&nbsp;</label>
            <input class="col-md-6" type="mail" name="txtMail" required/>
          </div>
          <div class="row">
            <div class="col-md-1"></div>
            <label class="col-md-4">Número de tarjeta: &nbsp;&nbsp;&nbsp;</label>
            <input class="col-md-1" type="text" name="txtMes" placeholder="Mes" required/>&nbsp;
            <input class="col-md-1" type="text" name="txtAnno" placeholder="Año" required/>&nbsp;
            <input class="col-md-3" type="text" name="txtNumero"  placeholder="Tarjeta" required/>&nbsp;
            <input class="col-md-1" type="text" name="txtCVC" placeholder="CVC" required>
          </div>
        </fieldset>
        <fieldset class="row right">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="submit" class="btn-primary l-padding" name="btnSubmit" value="submit">
            Pagar
          </button>
        </fieldset>
      </form>
    </section>
  </section>
</section>
