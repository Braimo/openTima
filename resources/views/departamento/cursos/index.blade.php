<div class="ui grid">
  <div class="eigth wide column">
    <div class="ui inverted segment">
      <div class="ui inverted form">
        <div class="three fields">
          <div class="field">
            <input placeholder="Pesquisar por nome" type="text">
          </div>
          <div class="field">
            <label></label>
            <div class="ui selection dropdown">
              <div class="default text">Pesquisar por disciplina</div>
              <i class="dropdown icon"></i>
              <input name="gender" type="hidden">
              <div class="menu">
                <div class="item" data-value="1">Trabalho de Licenciatura</div>
                <div class="item" data-value="2">Estágio Profissional</div>
              </div>
            </div>
          </div>
          <div class="field">
            <button type="button" class="ui submit button" name="search"><i class="search icon"></i></button>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <table class="ui selectable table">
    <thead>
      <tr>
        <th>Estudante</th>
        <th>Referencia do tema</th>
        <th>Tema</th>
        <th>Supervisor</th>
        <th>Progresso</th>
        <th class="right aligned">Detalhes</th>
      </tr>
    </thead>
    <tbody>
      @foreach($temas as $tema)
      <tr>
        <td>
          <img class="ui avatar image" src="{{ App\User::get_gravatar($tema->estudante->email) }}">
          {{$tema->estudante->primeiro_nome.' '.$tema->estudante->ultimo_nome}}
        </td>
        <td>{{$tema->referencia}}</td>
        <td>{{$tema->designacao}}</td>
        @foreach($tema->supervisaos as $supervisor)
        @if($supervisor->papel == 'supervisor')
          <td>
            <img class="ui avatar image" src="{{ App\User::get_gravatar($supervisor->docente->email) }}">
            {{$supervisor->docente->primeiro_nome.' '.$supervisor->docente->ultimo_nome}}
          </td>
        @endif
        @endforeach
        <td>
          <div class="ui active progress">
            <div class="bar">
              <div class="progress">5%</div>
            </div>
          </div>
       </td>
        <td class="right aligned">
          <div class="ui animated fade button" tabindex="0">
            <div class="visible content">Visualizar</div>
            <div class="hidden content">
              <a href="{{url('/feuem/'.$curso->departamento->sigla.'/'.$curso->id.'/estudantes/'.$tema->estudante->id)}}"><i class="unhide icon"></i></a>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
