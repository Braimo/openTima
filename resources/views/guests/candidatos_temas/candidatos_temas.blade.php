@extends('layouts.guests.candidatos')
@section('stylesheets')
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.css')}}">
@stop
@section('scripts')
<script type="text/javascript" src="{{asset('/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
} );
</script>
@stop
@section('title', '|Login')
@section('content')
<div class="ui middle aligned center aligned grid" style="padding-top: 10px">
  <div class="two wide column">
  </div>
  <div class="twelve wide column">
    <h2 class="ui image header">
        <div class="content">
          <div class="ui larg image">
            <img src="/guest/img/header.jpg" alt="Universidade Eduardo Mondlane - Faculdade de Engenharia"/>
          </div>
        </div>
      </h2>
  </div>
  <div class="two wide column">
  </div>
  <div class="twelve wide column">
    <div class="ui horizontal divider">#</div>
  </div>
  <div class="twelve wide column">
      @include('partials._messages')
  </div>
  <div class="twelve wide column">
      <table class="ui selectable very basic table" id="example">
         <thead>
           <th>Dados do tema</th>
           <th class="right aligned">Total de candidatos</th>
         </thead>
         <tbody>
           @foreach($propostas_de_temas as $tema)
             <tr onClick="model({{$tema}})">
               <td>
                 <h4 class="ui image header">
                   <img src="/images/avatar2/small/lena.png" class="ui mini rounded image">
                   <div class="content">
                     {{$tema->designacao}}
                     <div class="sub header">{{$tema->docente_proponente->primeiro_nome.' '.$tema->docente_proponente->ultimo_nome}}
                   </div>
                 </div>
                </h4>
              </td>
             <td class="right aligned">
               {{$tema->total_candidatos}}
             </td>
           </tr>
          @endforeach
       </tbody>
     </table>
</div>
<div class="four wide column">
  <div class="ui raised red segment" id="descricao">
    <p><b>Clica no tema do seu interesse para candidatar-se</b></p>
  </div>
</div>
</div>
<div style="margin-top:20px;" id='calendar'></div>
@stop
<script type="text/javascript">
function model(tema) {
   document.getElementById("proposta_do_tema").innerHTML=tema.designacao;
   //document.getElementById("descricao").innerHTML=tema.descricao;
    document.getElementById("tema_id").value=tema.id;
  $('.ui.small.modal')
.modal('show');

}
</script>

<div class="ui small modal">
  <i class="close icon"></i>
  <div class="header" id="proposta_do_tema"></div>
  <div class="content">
    <form class="ui form" action="{{url('/feng/propostas_de_temas/candidatar-se/'.$tema->id)}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="tema_id" id="tema_id" >
        <div class="field">
          <label>Indique seu nr de estudante:</label>
            <div class="ui input left icon">
              <i class="student icon"></i>
              <input type="text" placeholder="Exemplo: 20171681" name="cod_estudante">
            </div>
        </div>
        <div class="field">
          <label>Indique o problema que pretende resolver:</label>
            <div class="ui input left icon">
              <i class="cloud icon"></i>
              <input type="text" placeholder="Máximo 120 caracteres" name="problema">
            </div>
        </div>
      <div class="field">
        <label>Descrição do problema:</label>
        <textarea class="ui fluid search dropdown" name="descricao_do_problema" placeholder="Faça uma descrição sucinta sobre o problema que pretende resolver">
        </textarea>
      </div>
        <div class="field">
          <button type="submit" class="fluid ui green button" onsubmit="">Gravar</button>
        </div>
      </div>
    </form>
</div>