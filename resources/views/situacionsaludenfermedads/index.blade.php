    
   <h5>Enfermedades</h5>
   <button type="button" class="btn btn-primary" onclick="location.href='../../situacionsaludenfermedads/create/{{$situacionsalud->id}}'">Agregar Nuevo</button>
   <table class="table" id="tabla" style="width:auto">
      <thead>
         <tr>
            <th scope="col">Enfermedad</th>
            <th scope="col">Recibe Tratamiento</th>
            <th scope="col">Lugar de Tratamiento</th>
            <th scope="col"></th>
            <th scope="col"></th>
         </tr>
      </thead>
      <tbody>
         @foreach($situacionsaludenfermedads as $situacionsaludenfermedad)
         @if($situacionsaludenfermedad->situacion_salud->id==$situacionsalud->id)
            <tr>
               <td>{!! $situacionsaludenfermedad->enfermedad->nombre !!}</td>
               <td>
                  @if($situacionsaludenfermedad->tratamiento==true)
                     SI
                  @else
                     NO
                  @endif
               </td>
               <td> {{ isset($situacionsaludenfermedad->lugar_tratamiento) ? $situacionsaludenfermedad->lugar_tratamiento->nombre : '' }}</td>
               <td>
                  <a href="http://localhost/situacionsaludenfermedads/{{ $situacionsaludenfermedad->id }}/edit"  class="btn btn-success btn-sm">Editar</a>
               </td>
               <td>
                     <form action="http://localhost/situacionsaludenfermedads/{{ $situacionsaludenfermedad->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="form-group">
                              <input type="hidden" name="url" class="form-control" id="" value={{URL::previous()}}>
                      </div>
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                     </form>             
               </td>
            </tr>
            @endif
         @endforeach
      </tbody>
   </table>
