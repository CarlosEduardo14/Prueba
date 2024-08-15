<?php

namespace App;

/**
 * @OA\Info(
 *     title="API de Tareas",
 *     version="1.0.0",
 *     description="Documentación de la API para gestionar tareas.",
 *     @OA\Contact(
 *         email="contacto@example.com"
 *     )
 * )
 * @OA\Schema(
 *     schema="Tarea",
 *     type="object",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID de la tarea"
 *     ),
 *     @OA\Property(
 *         property="titulo",
 *         type="string",
 *         description="Título de la tarea"
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción de la tarea"
 *     ),
 *     @OA\Property(
 *         property="fecha_vencimiento",
 *         type="string",
 *         format="date",
 *         description="Fecha de vencimiento de la tarea"
 *     ),
 *     @OA\Property(
 *         property="estado",
 *         type="string",
 *         description="Estado de la tarea"
 *     )
 * )
 */
class Anotaciones
{
    // Este archivo solo sirve para documentar la API.
}