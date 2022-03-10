
<div class="row mt-3" id="form-sign">
        <div class="col-1"></div>
        <div class="col-10 p-3 border rounded shadow p-4 mb-5">
          <form class="row g-3" action="scripts/enviarmensaje.php" method="post">
          <span class="border fs-3 border border-primary text-center">Envio de notas a empleados</span>
              <div class="col-12 col-lg-12">
                <label class="form-label">Nombre del empleado</label>
                  <?php
                    include("scripts/scriptmenadmin.php");
                  ?>

                </select>
              </div>
              <div class="col-12 col-md-12 col-lg-12">
                <label class="form-label">Mensaje</label>
                <input type="text" class="form-control" name="mensaje" id="mensaje" required>
              </div>
               <div class="col-12 col-md-12 col-lg-12 mt-5 text-center">
                <input type="submit" class="btn btn-success" value="Enviar nota">
              </div>
          </form>
        </div>
        <div class="col-1"></div>
    </div>
    </div>
    
