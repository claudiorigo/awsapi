<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
    *************************************************************************************************
    * # Productos
    *************************************************************************************************
    * @OA\Get (
    *       path="/api/products/{id}",
    *       operationId="getProductById",
    *       tags={"productos"},
    *       summary="Muestra un producto por id",
    *       description="Retorna un registro por id",
    *       @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="integer")),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="name", type="string", example="Nombre producto"),
    *               @OA\Property(property="slug", type="string", example="nombre-producto"),
    *               @OA\Property(property="description", type="string", example="Descripción de producto"),
    *               @OA\Property(property="price", type="float", example="1000"),
    *               @OA\Property(property="quantity", type="number", example="45"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           )
    *       ),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Producto no existe"),))
    * ),
    * @OA\Get (
    *   path="/api/products",
    *   operationId="getProductsList",
    *   tags={"productos"},
    *   summary="Listar todos los productos",
    *   description="Retorna lista de productos",
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(type="array", property="products",
    *                   @OA\Items(type="object",
    *                       @OA\Property(property="id", type="number", example="1"),
    *                       @OA\Property(property="name", type="string", example="Ejemplo Nombre Producto"),
    *                       @OA\Property(property="slug", type="string", example="ejemplo-de-slug"),
    *                       @OA\Property(property="description", type="string",example="Ejemplo de descripción"),
    *                       @OA\Property(property="price", type="float", example="1000"),
    *                       @OA\Property(property="quantity", type="number", example="45"),
    *                       @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *                       @OA\Property(property="created_at",type="date", example="2022-05-21T00:43:54.000000Z")
    *                   )
    *               )
    *           )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent(@OA\Property(property="message", type="string", example="SQLSTATE[HY000] [2002] No se puede establecer una conexión"),))
    * ),
    * @OA\Post (
    *   path="/api/products",
    *   operationId="postProduct",
    *   tags={"productos"},
    *   summary="Crear nuevo producto",
    *   description="Retorna nuevo producto",
    *  
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema( required={"name"}, required={"slug"}, required={"price"},
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="slug",type="string"),
    *                   @OA\Property(property="description",type="string"),
    *                   @OA\Property(property="price",type="float"),
    *                   @OA\Property(property="quantity",type="number"),
    *                 ),
    *                 example={
    *                     "name":"Nombre de Producto",
    *                     "slug":"nombre-de-producto",
    *                     "description":"Descripción de Producto",
    *                     "price":"100.000",
    *                     "quantity":"45",
    *                }
    *             )
    *         )
    *       ),
    *       @OA\Response(
    *          response=200,
    *          description="success",
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="number", example=1),
    *              @OA\Property(property="name", type="string", example="Nombre de Producto"),
    *              @OA\Property(property="slug", type="string", example="nombre-de-producto"),
    *              @OA\Property(property="description", type="string", example="Descripción de Producto"),
    *              @OA\Property(property="price", type="float", example="1000"),
    *              @OA\Property(property="quantity", type="number", example="45"),
    *              @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *              @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *          )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=422, description="Unprocessable Content", @OA\JsonContent(@OA\Property(property="message", type="string", example="The given data was invalid. field is required"),))
    * ),
    * @OA\Put (
    *   path="/api/products/{id}",
    *   operationId="updateProduct",
    *   tags={"productos"},
    *   summary="Actualiza un producto por id",
    *   description="Retorna el registro actualizado",
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="string")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="slug", type="string"),
    *                   @OA\Property(property="description", type="string"),
    *                   @OA\Property(property="price", type="float"),
    *                   @OA\Property(property="quantity", type="number"),
    *                 ),
    *                 example={
    *                     "name":"Actualiza Nombre",
    *                     "slug":"Actualiza Slug",
    *                     "description":"Actualiza Descripción",
    *                     "price":"110.000",
    *                     "quantity":"45",
    *                   }
    *               )
    *           )
    *       ),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="name", type="string", example="Actualizar Nombre"),
    *               @OA\Property(property="slug", type="string", example="actualizar-nombre-de-slug"),
    *               @OA\Property(property="description", type="string", example="Actualizar Descripción"),
    *               @OA\Property(property="price", type="float", example="900.000"),
    *               @OA\Property(property="quantity", type="number", example="45"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z")
    *          )
    *       ),
    *       @OA\Response(response=400, description="Bad Request"),
    *       @OA\Response(response=404, description="Resource Not Found")
    *       
    * ),
    * @OA\Delete (
    *   path="/api/products/{id}",
    *   operationId="deleteProduct",
    *   tags={"productos"},
    *   summary="Elimina un producto por id",
    *   description="Retorna éxito de la eliminación",
    *   @OA\Parameter(
    *       in="path",
    *       name="id",
    *       required=true,
    *       @OA\Schema(type="string")
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="success",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Producto eliminado con éxito")
    *       )
    *   )
    * ),
    * @OA\Get (
    *   path="/api/products/search/{name}",
    *   operationId="searchProductByName",
    *   tags={"productos"},
    *   summary="Busca productos por nombre",
    *   description="Retorna registros por el nombre de producto",
    *   @OA\Parameter(in="path", name="name", required=true, @OA\Schema(type="string")),
    *   @OA\Response(
    *       response=200,
    *       description="success",
    *       @OA\JsonContent(
    *           @OA\Property(property="id", type="number", example=1),
    *           @OA\Property(property="name", type="string", example="Nombre producto"),
    *           @OA\Property(property="slug", type="string", example="nombre-producto"),
    *           @OA\Property(property="description", type="string", example="Descripción de producto"),
    *           @OA\Property(property="price", type="float", example="1000"),
    *           @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *       )
    *   ),
    *   @OA\Response(response=403, description="Forbidden"),
    *   @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Producto no existe"),))
    * ),
    *
    *************************************************************************************************
    * # Categorías
    *************************************************************************************************
    *
    * @OA\Get (
    *       path="/api/categories/{id}",
    *       operationId="getCategoryById",
    *       tags={"categorías"},
    *       summary="Muestra una categoría por id",
    *       description="Retorna un registro por id",
    *       @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="integer")),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="name", type="string", example="Nombre categoría"),
    *               @OA\Property(property="slug", type="string", example="nombre-categoría"),
    *               @OA\Property(property="icon", type="string", example="<i class=\'fas fa-mobile-alt\'></i>"),
    *               @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/celular-tablet.webp"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           )
    *       ),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Producto no existe"),))
    * ),
    * @OA\Get (
    *   path="/api/categories",
    *   operationId="getCategoriesList",
    *   tags={"categorías"},
    *   summary="Listar todas las categorías",
    *   description="Retorna lista de categorías",
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(type="array", property="category",
    *                   @OA\Items(type="object",
    *                       @OA\Property(property="id", type="number", example="1"),
    *                       @OA\Property(property="name", type="string", example="Ejemplo Nombre Categoría"),
    *                       @OA\Property(property="slug", type="string", example="ejemplo-nombre-categoria"),
    *                       @OA\Property(property="icon", type="string", example="<i class='fas fa-mobile-alt'></i>"),
    *                       @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/celular-tablet.webp"),
    *                       @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *                       @OA\Property(property="created_at",type="date", example="2022-05-21T00:43:54.000000Z")
    *                   )
    *               )
    *           )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=500, description="Internal Server Error", @OA\JsonContent(@OA\Property(property="message", type="string", example="SQLSTATE[HY000] [2002] No se puede establecer una conexión"),))
    * ),
    * @OA\Post (
    *   path="/api/categories",
    *   operationId="postCategory",
    *   tags={"categorías"},
    *   summary="Crear nueva categoría",
    *   description="Retorna nueva categoría",
    *  
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema( required={"name"}, required={"slug"},
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="slug", type="string"),
    *                   @OA\Property(property="icon", type="string"),
    *                   @OA\Property(property="image", type="string"),
    *                 ),
    *                 example={
    *                     "name":"Nombre de Categoría",
    *                     "slug":"nombre-de-categoria",
    *                     "icon":"<i class='fas fa-mobile-alt'></i>",
    *                     "image":"https://claudiorigollet.cl/categories/default.jpg",
    *                }
    *             )
    *         )
    *       ),
    *       @OA\Response(
    *          response=200,
    *          description="success",
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="number", example=1),
    *              @OA\Property(property="name", type="string", example="Nombre de Categoría"),
    *              @OA\Property(property="slug", type="string", example="nombre-de-categoria"),
    *              @OA\Property(property="icon", type="string", example="<i class='fas fa-mobile-alt'></i>"),
    *              @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/default.jpg"),
    *              @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *              @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *          )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=422, description="Unprocessable Content", @OA\JsonContent(@OA\Property(property="message", type="string", example="The given data was invalid. field is required"),))
    * ),
    * @OA\Put (
    *   path="/api/categories/{id}",
    *   operationId="updateCategory",
    *   tags={"categorías"},
    *   summary="Actualiza una categoría por id",
    *   description="Retorna el registro actualizado",
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="string")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="slug", type="string"),
    *                   @OA\Property(property="icon", type="string"),
    *                   @OA\Property(property="image", type="string"),
    *                 ),
    *                 example={
    *                     "name":"Actualiza Categoría",
    *                     "slug":"actualiza-slug-de-categoria",
    *                     "icon":"<i class='fas fa-mobile-alt'></i>",
    *                     "image":"https://claudiorigollet.cl/categories/default.jpg",
    *                   }
    *               )
    *           )
    *       ),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="name", type="string", example="Actualizar Nombre"),
    *               @OA\Property(property="slug", type="string", example="actualizar-nombre-de-slug"),
    *               @OA\Property(property="icon", type="string", example="<i class='fas fa-mobile-alt'></i>"),
    *               @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/default.jpg"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z")
    *          )
    *       ),
    *       @OA\Response(response=400, description="Bad Request"),
    *       @OA\Response(response=404, description="Resource Not Found")
    *       
    * ),
    * @OA\Delete (
    *   path="/api/categories/{id}",
    *   operationId="deleteCategory",
    *   tags={"categorías"},
    *   summary="Elimina una categoría por id",
    *   description="Retorna éxito de la eliminación",
    *   @OA\Parameter(
    *       in="path",
    *       name="id",
    *       required=true,
    *       @OA\Schema(type="string")
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="success",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Categoría eliminada con éxito"),
    *           @OA\Property(property="data", type="number", example="1")
    *       )
    *   )
    * ),    
    *
*/

class SwaggerController extends Controller
{
    //
}
