@extends("Initial.inicio")
@section("conteudo")
<a href="{{url('quadra/create')}}" class="button">Adicionar</a>
<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Modalidade</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Editar</th>
      <th>Remover</th>
    </tr>
  </thead>
  <tbody>
    @foreach($quadras as $quadra)
    <tr>
      <td>{{$quadra->Nome}}</td>
      <td>{{$quadra->modalidade}}</td>
      <td>{{$quadra->latitude}}</td>
      <td>{{$quadra->longitude}}</td>
      
      <td>
        <a href="{{route('quadra.edit',$quadra->id)}}" class="button">
          Editar
        </a>
      </td>
      <td>
        <form method="POST" action="{{route('quadra.destroy',$quadra->id)}}" onsubmit="return confirm('tem certeza?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="button">
            Remover
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection