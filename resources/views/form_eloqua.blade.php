<style type="text/css" media="screen">
  /* RESET */.elq-form * {
    margin: 0;
    padding: 0;
  }
  .elq-form input,textarea {
    -webkit-box-sizing:content-box;
    -moz-box-sizing:content-box;
    box-sizing:content-box;
  }
  .elq-form input[type=text],.elq-form textarea,.elq-form select[multiple=multiple] {
    border: 1px solid #A6A6A6;
  }
  .elq-form button,input[type=reset],input[type=button],input[type=submit],input[type=checkbox],input[type=radio],select {
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    box-sizing:border-box;
  }
  /* GENERIC */.elq-form input {
    height: 16px;
    line-height: 16px;
  }
  .elq-form .item-padding {
    padding:6px 5px 9px 9px;
  }
  .elq-form .pp-group {
    padding:0px 5px 0px 9px;
  }
  .elq-form .pp-field {
    padding:6px 0px 9px 0px;
  }
  .elq-form .field-wrapper.individual {
    float: left;
    width: 100%;
    clear: both;
  }
  .elq-form .field-p {
    position: relative;
    margin: 0;
    padding: 0;
  }
  .elq-form .zIndex-fix {
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }
  .elq-form .field-design {
    position:absolute;
    z-index:2;
    top:0;
    left:0;
    right:0;
    bottom:0;
    margin:0;
    padding:0;
  }
  .elq-form .no-fields-prompt {
    float: left;
    width: 100%;
    height: 150px;
    padding-top: 50px;
    clear: both;
  }
  /* SECTION BREAKS */.elq-form .section-break {
    float:left;
    width: 97%;
    margin-right:2%;
    margin-left:1%;
    padding-bottom:6px;
  }
  .elq-form .section-break .heading {
    width:100%;
    font-weight: bold;
    margin:0;
    padding:0;
  }
  /* LABEL */.elq-form .required {
    color: red !important;
    display: inline;
    float: none;
    font-weight: bold;
    margin: 0pt 0pt 0pt;
    padding: 0pt 0pt 0pt;
  }
  /* FIELD GROUP */.elq-form .field-group {
    float: left;
    clear: both;
  }
  .elq-form .field-group.large {
    width:100%;
  }
  .elq-form .field-group.medium {
    width:51%;
  }
  .elq-form .field-group.small {
    width:31%;
  }
  .elq-form .field-group .label {
    float:left;
    width:97%;
    margin-right:2%;
    margin-left:1%;
    padding-bottom:6px;
    font-weight: bold;
  }
  .elq-form .field-group .field-style {
    float: left;
  }
  .elq-form .progressive-profile .pp-inner {
    float: left;
    clear: both;
  }
  .elq-form .progressive-profile .pp-inner.large {
    width:100%;
  }
  .elq-form .progressive-profile .pp-inner.medium {
    width:51%;
  }
  .elq-form .progressive-profile .pp-inner.small {
    width:31%;
  }
  /* RADIO */.elq-form .radio-option {
    display: inline-block;
  }
  .elq-form .radio-option .label {
    display:block;
    float:left;
    padding-right:10px;
    padding-left:22px;
    text-indent:-22px;
  }
  .elq-form .radio-option .input {
    vertical-align:middle;
    margin-right:7px;
  }
  .elq-form .radio-option .inner {
    vertical-align:middle;
  }
  /* CHECKBOX */.elq-form .checkbox-span {
    display:inline-block;
  }
  .elq-form .checkbox-label {
    padding-left:7px;
    position: relative;
    bottom:3px;
  }
  /* INPUT */.elq-form .accept-default {
    width:100%;
  }
  /* SIZING */.elq-form .field-style {
    margin-right:2%;
    margin-left:2%;
  }
  .elq-form .field-style._25 {
    width:21%;
  }
  .elq-form .field-style._50 {
    width:46%;
  }
  .elq-form .field-style._50_left {
    clear:left;
    width:46%;
  }
  .elq-form .field-style._75 {
    width:71%;
  }
  .elq-form .field-style._100 {
    width:96%;
  }
  .elq-form .field-size-top-small {
    width:30%;
  }
  .elq-form .field-size-top-medium {
    width:75%;
  }
  .elq-form .field-size-top-large {
    width:100%;
  }
  .elq-form .field-size-left-small {
    width:21%;
  }
  .elq-form .field-size-left-medium {
    width:46%;
  }
  .elq-form .field-size-left-large {
    width:60%;
  }
  /* INSTRUCTIONS */.elq-form .instructions.default {
    color:#444444;
    display:block;
    font-size:10px;
    padding:6px 0pt 3px;
  }
  .elq-form .instructions.group {
    float:left;
    width:97%;
    margin-right:2%;
    margin-left:2%;
    padding:6px 0pt 3px;
    color:#444444;
    display:block;
    font-size:10px;
  }
  .elq-form .instructions.left-single {
    margin:0 0 0 33%;
  }
  .elq-form .instructions-other {
    margin:0;
  }
  /* POSITIONING */.elq-form .label-position.left {
    display:block;
    line-height:150%;
    padding:1px 0pt 3px;
    float:left;
    width:31%;
    margin:0pt 15px 0pt 0pt;
    word-wrap:break-word;
    overflow-wrap: break-word;
  }
  .elq-form .label-position.top {
    display:block;
    line-height:150%;
    padding:1px 0pt 3px;
    white-space:normal;
  }
  .elq-form .label-position.alignment-left {
    text-align: left;
  }
  .elq-form .label-position.alignment-right {
    text-align: right;
  }
  /* LIST ORDER */.elq-form .list-order {
    display:block;
  }
  .elq-form .list-order.oneColumn {
    margin:0pt 7px 0pt 0pt;
    width:100%;
    clear:both;
  }
  .elq-form .list-order.twoColumn {
    float:left;
    margin:0pt 7px 0pt 0pt;
    width:38%;
  }
  .elq-form .list-order.threeColumn {
    float:left;
    margin:0pt 7px 0pt 0pt;
    width:30%;
  }
  .elq-form .list-order.oneColumnLeft {
    float:left;
    margin:0pt 7px 0pt 0pt;
    width:100%;
  }
  .elq-form .list-order.twoColumnLeft {
    float:left;
    margin:0pt 7px 0pt 0pt;
    width:38%;
  }
  .elq-form .list-order.threeColumnLeft {
    float:left;
    margin:0pt 7px 0pt 0pt;
    width:30%;
  }
  /* GRID STYLE */.elq-form .grid-style {
    display:inline;
    float:left;
    margin-left:2%;
    margin-right:2%;
  }
  .elq-form .grid-style._25 {
    width:21%;
  }
  .elq-form .grid-style._50 {
    width:46%;
  }
  .elq-form .grid-style._75 {
    width:71%;
  }
  .elq-form .grid-style._100 {
    width:96%;
  }
</style>
<div>
  <form method="post" name="Formulariosintítulo-1550255979090" action="https://s242003202.t.eloqua.com/e/f2" onsubmit="return handleFormSubmit(this)" id="form57" class="elq-form" >
    <input value="Formulariosintítulo-1550255979090" type="hidden" name="elqFormName"  />
    <input value="242003202" type="hidden" name="elqSiteId"  />
    <input name="elqCampaignId" type="hidden"  />
    <div id="formElement0" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field0" class="label-position top " >
              Nombre del Proyecto
              <span class="required" >
                *
              </span>
            </label>
            <input id="field0" name="singleLineText" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement1" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field1" class="label-position top " >
              Cantidad total de viviendas del Proyecto
              <span class="required" >
                *
              </span>
            </label>
            <input id="field1" name="singleLineText2" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement2" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field2" class="label-position top " >
              Dirección del Proyecto
              <span class="required" >
                *
              </span>
            </label>
            <input id="field2" name="singleLineText3" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement3" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field3" class="label-position top " >
              Comuna
              <span class="required" >
                *
              </span>
            </label>
            <input id="field3" name="singleLineText4" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement4" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field4" class="label-position top " >
              Fecha Probable de Entrega
              <span class="required" >
                *
              </span>
            </label>
            <input id="field4" name="fechaProbableDeEntrega1" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement5" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field5" class="label-position top " >
              Sala de Ventas
              <span class="required" >
                *
              </span>
            </label>
            <input id="field5" name="singleLineText5" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement6" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field6" class="label-position top " >
              Vivienda Piloto
              <span class="required" >
                *
              </span>
            </label>
            <input id="field6" name="singleLineText6" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement7" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field7" class="label-position top " >
              Comuna
              <span class="required" >
                *
              </span>
            </label>
            <input id="field7" name="singleLineText7" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement8" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field8" class="label-position top " >
              Mandante
              <span class="required" >
                *
              </span>
            </label>
            <input id="field8" name="singleLineText8" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement9" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field9" class="label-position top " >
              RUT Mandante
              <span class="required" >
                *
              </span>
            </label>
            <input id="field9" name="singleLineText9" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement10" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field10" class="label-position top " >
              Representante Legal
              <span class="required" >
                *
              </span>
            </label>
            <input id="field10" name="singleLineText10" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement11" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field11" class="label-position top " >
              RUT Representante Legal
              <span class="required" >
                *
              </span>
            </label>
            <input id="field11" name="singleLineText11" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement12" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field12" class="label-position top " >
              Inscripción de Personería Jurídica
              <span class="required" >
                *
              </span>
            </label>
            <input id="field12" name="inscripciOnDePersonerIaJurIdica1" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement13" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field13" class="label-position top " >
              Notario de Inscripción
              <span class="required" >
                *
              </span>
            </label>
            <input id="field13" name="singleLineText12" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement14" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field14" class="label-position top " >
              Razón Social
              <span class="required" >
                *
              </span>
            </label>
            <input id="field14" name="singleLineText13" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement15" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field15" class="label-position top " >
              Giro
              <span class="required" >
                *
              </span>
            </label>
            <input id="field15" name="singleLineText14" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement16" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field16" class="label-position top " >
              RUT
              <span class="required" >
                *
              </span>
            </label>
            <input id="field16" name="singleLineText15" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement17" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field17" class="label-position top " >
              Dirección
              <span class="required" >
                *
              </span>
            </label>
            <input id="field17" name="singleLineText16" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement18" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field18" class="label-position top " >
              Encargado de Finanzas
              <span class="required" >
                *
              </span>
            </label>
            <input id="field18" name="singleLineText17" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement19" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field19" class="label-position top " >
              Email Encargado de Finanzas
              <span class="required" >
                *
              </span>
            </label>
            <input id="field19" name="singleLineText18" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement20" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field20" class="label-position top " >
              Email DTE
              <span class="required" >
                *
              </span>
            </label>
            <input id="field20" name="singleLineText19" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement21" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field21" class="label-position top " >
              Email PDF
              <span class="required" >
                *
              </span>
            </label>
            <input id="field21" name="singleLineText20" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement22" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field22" class="label-position top " >
              Nombre Contacto Marketing
              <span class="required" >
                *
              </span>
            </label>
            <input id="field22" name="singleLineText21" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement23" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field23" class="label-position top " >
              Cargo
              <span class="required" >
                *
              </span>
            </label>
            <input id="field23" name="singleLineText22" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement24" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field24" class="label-position top " >
              Email
              <span class="required" >
                *
              </span>
            </label>
            <input id="field24" name="singleLineText23" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement25" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field25" class="label-position top " >
              Nombre Agencia Externa
            </label>
            <input id="field25" name="singleLineText24" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement26" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <label for="field26" class="label-position top " >
              Link Oficial del Proyecto
              <span class="required" >
                *
              </span>
            </label>
            <input id="field26" name="singleLineText25" type="text" value="" class="field-size-top-large"  />
          </p>
        </div>
      </div>
    </div>
    <div id="formElement27" class="sc-view form-design-field sc-static-layout item-padding sc-regular-size" >
      <div class="field-wrapper" >
      </div>
      <div class="individual field-wrapper" >
        <div class="_100 field-style" >
          <p class="field-p" >
            <input type="submit" value="Enviar" class="submit-button" style="font-size: 100%; height: 24px; width: 100px"  />
          </p>
        </div>
      </div>
    </div>
  </form>
  <script src="https://img04.en25.com/i/livevalidation_standalone.compressed.js" type="text/javascript" >
  </script>
  <style type="text/css" media="screen" >
    .elq-form .loader{
      vertical-align: middle;
      display: inline-block;
      margin-left:10px;
      border: 3px solid #f3f3f3;
      border-radius: 50%;
      border-top: 3px solid #3498db;
      width: 20px;
      height: 20px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }
    @-webkit-keyframes spin {
      0% {
        -webkit-transform: rotate(0deg);
      }
      100% {
        -webkit-transform: rotate(360deg);
      }
    }
    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
    .LV_validation_message{
      font-weight:bold;
      margin: 0 0 0 5px;
    }
    .LV_valid{
      color:#00CC00;
      display:none;
    }
    .LV_invalid{
      color:#CC0000;
      font-size:10px;
    }
    .LV_valid_field, input.LV_valid_field:hover, input.LV_valid_field:active, textarea.LV_valid_field:hover, textarea.LV_valid_field:active {
      outline: 1px solid #00CC00;
    }
    .LV_invalid_field, input.LV_invalid_field:hover, input.LV_invalid_field:active, textarea.LV_invalid_field:hover, textarea.LV_invalid_field:active {
      outline: 1px solid #CC0000;
    }
  </style>
  <script type="text/javascript" >
    var dom0 = document.querySelector('#form57 #field0');
    var field0 = new LiveValidation(dom0, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field0.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field0.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom1 = document.querySelector('#form57 #field1');
    var field1 = new LiveValidation(dom1, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field1.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field1.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom2 = document.querySelector('#form57 #field2');
    var field2 = new LiveValidation(dom2, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field2.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
              );
    field2.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
              );
    field2.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field2.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom3 = document.querySelector('#form57 #field3');
    var field3 = new LiveValidation(dom3, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field3.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
              );
    field3.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
              );
    field3.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field3.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom4 = document.querySelector('#form57 #field4');
    var field4 = new LiveValidation(dom4, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field4.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom5 = document.querySelector('#form57 #field5');
    var field5 = new LiveValidation(dom5, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field5.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
              );
    field5.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
              );
    field5.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field5.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom6 = document.querySelector('#form57 #field6');
    var field6 = new LiveValidation(dom6, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field6.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
              );
    field6.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
              );
    field6.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field6.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom7 = document.querySelector('#form57 #field7');
    var field7 = new LiveValidation(dom7, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field7.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
              );
    field7.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
              );
    field7.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field7.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom8 = document.querySelector('#form57 #field8');
    var field8 = new LiveValidation(dom8, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field8.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
              );
    field8.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
              );
    field8.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field8.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom9 = document.querySelector('#form57 #field9');
    var field9 = new LiveValidation(dom9, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                   );
    field9.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
              );
    field9.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
              );
    field9.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
              );
    field9.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
              );
    var dom10 = document.querySelector('#form57 #field10');
    var field10 = new LiveValidation(dom10, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field10.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field10.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field10.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field10.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom11 = document.querySelector('#form57 #field11');
    var field11 = new LiveValidation(dom11, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field11.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field11.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field11.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field11.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom12 = document.querySelector('#form57 #field12');
    var field12 = new LiveValidation(dom12, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field12.add(Validate.Presence, {
      failureMessage:"This field is required"}
               );
    var dom13 = document.querySelector('#form57 #field13');
    var field13 = new LiveValidation(dom13, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field13.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field13.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field13.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field13.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom14 = document.querySelector('#form57 #field14');
    var field14 = new LiveValidation(dom14, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field14.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field14.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field14.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field14.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom15 = document.querySelector('#form57 #field15');
    var field15 = new LiveValidation(dom15, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field15.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field15.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field15.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field15.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom16 = document.querySelector('#form57 #field16');
    var field16 = new LiveValidation(dom16, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field16.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field16.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field16.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field16.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom17 = document.querySelector('#form57 #field17');
    var field17 = new LiveValidation(dom17, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field17.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field17.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field17.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field17.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom18 = document.querySelector('#form57 #field18');
    var field18 = new LiveValidation(dom18, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field18.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field18.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field18.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field18.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom19 = document.querySelector('#form57 #field19');
    var field19 = new LiveValidation(dom19, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field19.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field19.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field19.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field19.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom20 = document.querySelector('#form57 #field20');
    var field20 = new LiveValidation(dom20, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field20.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field20.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field20.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field20.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom21 = document.querySelector('#form57 #field21');
    var field21 = new LiveValidation(dom21, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field21.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field21.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field21.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field21.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom22 = document.querySelector('#form57 #field22');
    var field22 = new LiveValidation(dom22, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field22.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field22.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field22.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field22.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom23 = document.querySelector('#form57 #field23');
    var field23 = new LiveValidation(dom23, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field23.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field23.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field23.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field23.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom24 = document.querySelector('#form57 #field24');
    var field24 = new LiveValidation(dom24, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field24.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field24.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field24.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field24.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    var dom25 = document.querySelector('#form57 #field25');
    var field25 = new LiveValidation(dom25, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field25.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field25.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field25.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    var dom26 = document.querySelector('#form57 #field26');
    var field26 = new LiveValidation(dom26, {
      validMessage: "", onlyOnBlur: false, wait: 300}
                                    );
    field26.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(telnet|ftp|https?):\/\/(?:[a-z0-9][a-z0-9-]{0,61}[a-z0-9]\.|[a-z0-9]\.)+[a-z]{2,63}/i);
      }
      , failureMessage: "Value must not contain any URL's"}
               );
    field26.add(Validate.Custom, {
      against: function(value) {
        return !value.match(/(<([^>]+)>)/ig);
      }
      , failureMessage: "Value must not contain any HTML"}
               );
    field26.add(Validate.Length, {
      tooShortMessage:"Invalid length for field value", tooLongMessage: "Invalid length for field value",  minimum: 0, maximum: 35}
               );
    field26.add(Validate.Presence, {
      failureMessage:"Este campo es obligatorio"}
               );
    function handleFormSubmit(ele) {
      var submitButton = ele.querySelector('input[type=submit]');
      var spinner = document.createElement('span');
      spinner.setAttribute('class', 'loader');
      submitButton.setAttribute('disabled', true);
      submitButton.style.cursor = 'wait';
      submitButton.parentNode.appendChild(spinner);
      return true;
    }
    function resetSubmitButton(e){
      var submitButtons = e.target.form.getElementsByClassName('submit-button');
      for(var i=0;i<submitButtons.length;i++){
        submitButtons[i].disabled = false;
      }
    }
    function addChangeHandler(elements){
      for(var i=0; i<elements.length; i++){
        elements[i].addEventListener('change', resetSubmitButton);
      }
    }
    var form = document.getElementById('form57');
    addChangeHandler(form.getElementsByTagName('input'));
    addChangeHandler(form.getElementsByTagName('select'));
    addChangeHandler(form.getElementsByTagName('textarea'));
    var nodes = document.querySelectorAll('#form57 input[data-subscription]');
    if (nodes) {
      for (i = 0, len = nodes.length; i < len; i++) {
        var status = nodes[i].dataset ? nodes[i].dataset.subscription : nodes[i].getAttribute('data-subscription');
        if(status ==='true') {
          nodes[i].checked = true;
        }
      }
    };
    var nodes = document.querySelectorAll('#form57 select[data-value]');
    if (nodes) {
      for (var i = 0; i < nodes.length; i++) {
        var node = nodes[i];
        var selectedValue = node.dataset ? node.dataset.value : node.getAttribute('data-value');
        if (selectedValue) {
          for (var j = 0; j < node.options.length; j++) {
            if(node.options[j].value === selectedValue) {
              node.options[j].selected = 'selected';
              break;
            }
          }
        }
      }
    }
  </script>
</div>
