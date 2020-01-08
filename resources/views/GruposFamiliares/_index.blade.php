<div class="table-responsive-sm">
    <table class="table table-striped" id="tabla" style="width:auto">
       <thead class="thead-dark">
          <tr>
             <th scope="col">Nombre</th>
             <th scope="col"></th>
             <th scope="col"></th>
          </tr>
       </thead>
       <tbody>
          @foreach($gruposFamiliares as $grupoFamiliar)
             <tr>
                <td>{!! $grupoFamiliar !!}</td>
                <td>
                   <a href="frecuenciascontroles/edit" class="btn btn-success btn-sm">Editar</a>
                </td>
                <td>
                   <form action="/frecuenciascontroles" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                   </form>                     
                </td>
             </tr>
          @endforeach
       </tbody>
    </table>
