<header class="clearfix">
      <div id="logo">
        <img src="{{ $logo }}"  alt="AASANA"  />
      </div>
      <div id="company">
        <h2 class="name">Administración de Aeropuertos y Servicios Auxiliares a la Navegación Aérea</h2>
        <div>Calle Reyes Ortiz Esq. Federico Suazo # 74 La Paz-Bolivia</div>
        <div>2-370340</div>
        <div><a href="mailto:info@aasana.bo">info@aasana.bo</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Estiamdos señores:</div>
          <h2 class="name">AASANA</h2>
          <div class="address">Área de Denuncias</div>
        </div>
        <div id="invoice">
          <h1>Código: DEN-{{$denuncia->codigo_correlativo}}</h1>
          <div class="date">Fecha de Registro: {{$denuncia->created_at}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <td class="no">Datos Personales:</td>
            <td class="desc">{{$denuncia->nombres.' '.$denuncia->apellido_paterno.' '.$denuncia->apellido_materno}}</td>
            <td class="unit">{{$denuncia->carnet}}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">Datos de Contacto:</td>
            <td class="desc">{{$denuncia->telefono}}</td>
            <td class="unit">{{$denuncia->correo}}</td>
          </tr>
          <tr>
            <td class="no">Denunciados:</td>
            <td class="desc" colspan="2">{{$denuncia->denunciados}}</td>
          </tr>
          <tr>
            <td class="no">Descripción</td>
            <td class="desc" colspan="2">{{$denuncia->descripcion}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Esta nota tiene una velidez de 5 días</div>
      </div>
    </main>
    <footer>
      AASANA-{{$fecha}}
    </footer>
<style>
  
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  width: 28%;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  width: 54%;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
  width: 30%;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
  width: 46%;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.2em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #000;
  font-size: 1.3em;
  width: 10px;
}

table .desc {
  text-align: left;
}

table .unit {
  /*background: #DDDDDD;]*/
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}

</style>