<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tareas",
     *     summary="Obtener todas las tareas",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tareas",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Tarea")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Solicitud incorrecta"
     *     )
     * )
     */
    //Método para mostrar la vista inicial y también permite realizar filtros a los datos
    public function index(Request $request)
    {
        //Se extrae los datos de los campos
        $estado = $request->input('estado');
        $titulo = $request->input('titulo');
        $descripcion = $request->input('descripcion');

        // Crear una consulta base
        $query = Tarea::query();

        // Aplicar filtros si están presentes
        if ($estado) {
            $query->where('estado', $estado);
        }

        if ($titulo) {
            $query->where('titulo', 'like', "%$titulo%");
        }

        if ($descripcion) {
            $query->where('descripcion', 'like', "%$descripcion%");
        }

        // Ejecutar la consulta y obtener resultados
        $tareas = $query->get();

        //Se retorna los datos a la vista
        return response()->json($tareas);
    }

    //Método para visualizar el formulario para crear la tarea
    public function create()
    {
        return view('crear');
    }

    /**
     * @OA\Post(
     *     path="/api/tareas",
     *     summary="Crear una nueva tarea",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Tarea")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tarea creada exitosamente",
     *         @OA\JsonContent(ref="#/components/schemas/Tarea")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Solicitud incorrecta"
     *     )
     * )
     */
    //Método para guardar la tarea en la base de datos
    public function store(Request $request)
    {
        //Se validan los campos de los datos y se muestra el mensaje correspondiente
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_vencimiento' => 'required',
            'estado' => 'required|not_in:N/A'
        ],[
            'titulo.required' => 'El título es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'La fecha de vencimiento debe ser una fecha válida.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.not_in' => 'Selecciona un estado válido.',
        ]);
    
        //Se crea el registro en la base de datos
        $tarea = Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'estado' => $request->estado
        ]);
        //Se retorna a la vista principal y se muestra un mesaje de confirmación
        return response()->json($tarea, 201);
    }

    public function edit(Tarea $tarea)
    {
        return view('crear', compact('tarea'));
    }

    /**
     * @OA\Get(
     *     path="/api/tareasEditar/{tarea}",
     *     summary="Obtener una tarea por ID",
     *     @OA\Parameter(
     *         name="tarea",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea encontrada",
     *         @OA\JsonContent(ref="#/components/schemas/Tarea")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tarea no encontrada"
     *     )
     * )
     */
    public function show(Tarea $tarea)
    {
        return response()->json($tarea);
    }

    //Método para visualizar los datos a actualizar
    /*public function edit(Tarea $tarea)
    {
        //Se muestra la vista con los datos que se seleccionaron anteriormente
        
    }*/

    /**
     * @OA\Put(
     *     path="/api/tareasActualizar/{tarea}",
     *     summary="Actualizar una tarea por ID",
     *     @OA\Parameter(
     *         name="tarea",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Tarea")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea actualizada",
     *         @OA\JsonContent(ref="#/components/schemas/Tarea")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tarea no encontrada"
     *     )
     * )
     */
    //Método para actualizar la tarea en la base de datos.
    public function update(Request $request, Tarea $tarea)
    {
        //Se realiza la validación de los campos, para que los datos sean correctos
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_vencimiento' => 'required',
            'estado' => 'required|not_in:N/A'
        ],[
            'titulo.required' => 'El título es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'La fecha de vencimiento debe ser una fecha válida.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.not_in' => 'Selecciona un estado válido.',
        ]);

        //Se acvtualiza el registro en la base de datos
        $s = $tarea->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'estado' => $request->estado
        ]);

        //Se retorna a la vista principal y se muestra un mensaje de confirmando o no la actualización
        /*if($s){
            return redirect()->route('index')->with('success', 'Tarea actualizada exitosamente.');
        }else{
            return redirect()->route('index')->with('success', 'La tarea no se pudo actualizar.');
        }*/
        return response()->json($tarea);
        
    }

    /**
     * @OA\Delete(
     *     path="/api/tareasEliminar/{tarea}",
     *     summary="Eliminar una tarea por ID",
     *     @OA\Parameter(
     *         name="tarea",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea eliminada exitosamente"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tarea no encontrada"
     *     )
     * )
     */
    //Método para eliminar la tarea de la base de datos
    public function destroy(Tarea $tarea)
    {
        //Se valida si verdaderamente se eliminó la tarea y se muestra un mensaje de confirmación según corresponda
        /*if($tarea->delete()){
            return redirect()->route('index')->with('success', 'Tarea eliminada exitosamente.');
        }else{
            return redirect()->route('index')->with('success', 'La tarea no se pudo eliminar');
        }*/
        $tarea->delete();
        return response()->json(['message' => 'Tarea eliminada exitosamente.']);
    }
}
