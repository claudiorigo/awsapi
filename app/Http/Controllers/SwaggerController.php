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
    *               @OA\Property(property="subcategory_id", type="number", example="5"),
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
    *                       @OA\Property(property="subcategory_id", type="number", example="5"),
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
    *                   @OA\Property(property="subcategory_id", type="number"),
    *                 ),
    *                 example={
    *                     "name":"Nombre de Producto",
    *                     "slug":"nombre-de-producto",
    *                     "description":"Descripción de Producto",
    *                     "price":"100.000",
    *                     "quantity":"45",
    *                     "subcategory_id":"5",
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
    *              @OA\Property(property="subcategory_id", type="number", example="5"),
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
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="number")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="slug", type="string"),
    *                   @OA\Property(property="description", type="string"),
    *                   @OA\Property(property="price", type="float"),
    *                   @OA\Property(property="quantity", type="number"),
    *                   @OA\Property(property="subcategory_id", type="number"),
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
    *               @OA\Property(property="subcategory_id", type="number", example="5"),
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
    *           @OA\Property(property="subcategory_id", type="number", example="5"),
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
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Categoría no existe"),))
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
    *
    *************************************************************************************************
    * # Subcategorías
    *************************************************************************************************
    *
    * @OA\Get (
    *       path="/api/subcategories/{id}",
    *       operationId="getSubcategoryById",
    *       tags={"subcategorías"},
    *       summary="Muestra una subcategoría por id",
    *       description="Retorna un registro por id",
    *       @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="integer")),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="name", type="string", example="Nombre Subcategoría"),
    *               @OA\Property(property="slug", type="string", example="nombre-subcategoría"),
    *               @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/celular-tablet.webp"),
    *               @OA\Property(property="color", type="boolean", example="1"),
    *               @OA\Property(property="size", type="boolean", example="0"),
    *               @OA\Property(property="category_id", type="number", example="1"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           )
    *       ),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Subcategoría no existe"),))
    * ),
    * @OA\Get (
    *   path="/api/subcategories",
    *   operationId="getSubcategoriesList",
    *   tags={"subcategorías"},
    *   summary="Listar todas las subcategorías",
    *   description="Retorna lista de subcategorías",
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(type="array", property="subcategory",
    *                   @OA\Items(type="object",
    *                       @OA\Property(property="id", type="number", example="1"),
    *                       @OA\Property(property="name", type="string", example="Ejemplo Nombre Subcategoría"),
    *                       @OA\Property(property="slug", type="string", example="ejemplo-nombre-subcategoria"),
    *                       @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/celular-tablet.webp"),
    *                       @OA\Property(property="color", type="boolean", example="1"),
    *                       @OA\Property(property="size", type="boolean", example="0"),
    *                       @OA\Property(property="category_id", type="number", example="1"),    
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
    *   path="/api/subcategories",
    *   operationId="postSubcategory",
    *   tags={"subcategorías"},
    *   summary="Crear nueva subcategoría",
    *   description="Retorna nueva subcategoría",
    *  
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema( required={"name"}, required={"slug"},
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="slug", type="string"),
    *                   @OA\Property(property="image", type="string"),
    *                   @OA\Property(property="color", type="boolean"),
    *                   @OA\Property(property="size", type="boolean"),
    *                   @OA\Property(property="category_id", type="number"),
    *                 ),
    *                 example={
    *                     "name":"Nombre de Categoría",
    *                     "slug":"nombre-de-categoria",
    *                     "image":"https://claudiorigollet.cl/categories/default.jpg",
    *                     "color":"1",
    *                     "size":"0",
    *                     "category_id":"1",
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
    *              @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/default.jpg"),
    *              @OA\Property(property="color", type="boolean", example="1"),
    *              @OA\Property(property="size", type="boolean", example="0"),
    *              @OA\Property(property="category_id", type="number", example="1"),
    *              @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *              @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *          )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=422, description="Unprocessable Content", @OA\JsonContent(@OA\Property(property="message", type="string", example="The given data was invalid. field is required"),))
    * ),
    * @OA\Put (
    *   path="/api/subcategories/{id}",
    *   operationId="updateSubcategory",
    *   tags={"subcategorías"},
    *   summary="Actualiza una subcategoría por id",
    *   description="Retorna el registro actualizado",
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="string")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="slug", type="string"),
    *                   @OA\Property(property="image", type="string"),
    *                   @OA\Property(property="color", type="boolean"),
    *                   @OA\Property(property="size", type="boolean"),
    *                   @OA\Property(property="category_id", type="number"),
    *                 ),
    *                 example={
    *                     "name":"Actualiza Categoría",
    *                     "slug":"actualiza-slug-de-categoria",
    *                     "image":"https://claudiorigollet.cl/categories/default.jpg",
    *                     "color":"1",
    *                     "size":"0",
    *                     "category_id":"1",
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
    *               @OA\Property(property="image", type="string", example="https://claudiorigollet.cl/categories/default.jpg"),
    *               @OA\Property(property="color", type="boolean", example="1"),
    *               @OA\Property(property="size", type="boolean", example="0"),
    *               @OA\Property(property="category_id", type="number", example="1"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z")
    *          )
    *       ),
    *       @OA\Response(response=400, description="Bad Request"),
    *       @OA\Response(response=404, description="Resource Not Found")
    *       
    * ),
    * @OA\Delete (
    *   path="/api/subcategories/{id}",
    *   operationId="deleteSubcategory",
    *   tags={"subcategorías"},
    *   summary="Elimina una subcategoría por id",
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
    *           @OA\Property(property="message", type="string", example="Subcategoría eliminada con éxito"),
    *           @OA\Property(property="data", type="number", example="1")
    *       )
    *   )
    * ),    
    *
    *
    *************************************************************************************************
    * # Ventas
    *************************************************************************************************
    *
    * @OA\Get (
    *       path="/api/sales/{id}",
    *       operationId="getSaleById",
    *       tags={"ventas"},
    *       summary="Muestra una venta por id",
    *       description="Retorna un registro por id",
    *       @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="integer")),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="amount", type="decimal", example="45.000"),
    *               @OA\Property(property="status", type="enum", example="('finalizado', 'anulado')"),
    *               @OA\Property(property="product_id", type="number", example="3"),
    *               @OA\Property(property="user_id", type="number", example="8"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           )
    *       ),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Venta no existe"),))
    * ),
    * @OA\Get (
    *   path="/api/sales",
    *   operationId="getSalesList",
    *   tags={"ventas"},
    *   summary="Listar todas las ventas",
    *   description="Retorna lista de ventas",
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(type="array", property="sales",
    *                   @OA\Items(type="object",
    *                       @OA\Property(property="id", type="number", example="1"),
    *                       @OA\Property(property="amount", type="decimal", example="45.000"),
    *                       @OA\Property(property="status", type="enum", example="('finalizado', 'anulado')"),
    *                       @OA\Property(property="product_id", type="number", example="3"),
    *                       @OA\Property(property="user_id", type="number", example="8"),
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
    *   path="/api/sales",
    *   operationId="postSale",
    *   tags={"ventas"},
    *   summary="Crear nueva venta",
    *   description="Retorna nueva venta",
    *  
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema( required={"amount"}, required={"status"},
    *               @OA\Property(type="object",
    *                   @OA\Property(property="amount", type="decimal"),
    *                   @OA\Property(property="status", type="enum"),
    *                   @OA\Property(property="product_id", type="number"),
    *                   @OA\Property(property="user_id", type="number"),
    *                 ),
    *                 example={
    *                     "amount":"29.990",
    *                     "status":"finalizado",
    *                     "product_id":"5",
    *                     "user_id":"3",
    *                }
    *             )
    *         )
    *       ),
    *       @OA\Response(
    *          response=200,
    *          description="success",
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="number", example=1),
    *              @OA\Property(property="amount", type="decimal", example="29.990"),
    *              @OA\Property(property="status", type="enum", example="finalizado"),
    *              @OA\Property(property="product_id", type="number", example="5"),
    *              @OA\Property(property="user_id", type="number", example="3"),
    *              @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *              @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *          )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=422, description="Unprocessable Content", @OA\JsonContent(@OA\Property(property="message", type="string", example="The given data was invalid. field is required"),))
    * ),
    * @OA\Put (
    *   path="/api/sales/{id}",
    *   operationId="updateSale",
    *   tags={"ventas"},
    *   summary="Actualiza una venta por id",
    *   description="Retorna el registro actualizado",
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="number")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="amount", type="decimal"),
    *                   @OA\Property(property="status", type="enum"),
    *                   @OA\Property(property="product_id", type="number"),
    *                   @OA\Property(property="user_id", type="number"),
    *                 ),
    *                 example={
    *                     "amount":"29.990",
    *                     "status":"finalizado",                    
    *                     "product_id":"5",
    *                     "user_id":"3",
    *                   }
    *               )
    *           )
    *       ),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="amount", type="decimal", example="29.990"),
    *               @OA\Property(property="status", type="enum", example="finalizado"),
    *               @OA\Property(property="product_id", type="number", example="3"),
    *               @OA\Property(property="user_id", type="number", example="5"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z")
    *          )
    *       ),
    *       @OA\Response(response=400, description="Bad Request"),
    *       @OA\Response(response=404, description="Resource Not Found")
    *       
    * ),
    * @OA\Delete (
    *   path="/api/sales/{id}",
    *   operationId="deleteSale",
    *   tags={"ventas"},
    *   summary="Elimina una venta por id",
    *   description="Retorna éxito de la eliminación",
    *   @OA\Parameter(
    *       in="path",
    *       name="id",
    *       required=true,
    *       @OA\Schema(type="number")
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="success",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Venta eliminada con éxito"),
    *           @OA\Property(property="data", type="number", example="1")
    *       )
    *   )
    * ),    
    *
    *
    *************************************************************************************************
    * # Usuarios
    *************************************************************************************************
    *
    * @OA\Get (
    *       path="/api/users/{id}",
    *       operationId="getUserById",
    *       tags={"usuarios"},
    *       summary="Muestra una usuario por id",
    *       description="Retorna un registro por id",
    *       @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="integer")),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="name", type="string", example="Cristian Vergara"),
    *               @OA\Property(property="email", type="string", example="cris_vergara@duocuc.cl"),
    *               @OA\Property(property="profile_photo_url", type="string", example="https://ui-avatars.com/api/?name=C+R&color=7F9CF5&background=EBF4FF"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           )
    *       ),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Usuario no existe"),))
    * ),
    * @OA\Get (
    *   path="/api/users",
    *   operationId="getUsersList",
    *   tags={"usuarios"},
    *   summary="Listar todas los usuarios",
    *   description="Retorna lista de usuarios",
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(type="array", property="users",
    *                   @OA\Items(type="object",
    *                       @OA\Property(property="id", type="number", example="1"),
    *                       @OA\Property(property="name", type="string", example="Cristian Vergara"),
    *                       @OA\Property(property="email", type="string", example="cris_vergara@duocuc.cl"),
    *                       @OA\Property(property="profile_photo_url", type="string", example="https://ui-avatars.com/api/?name=C+R&color=7F9CF5&background=EBF4FF"),
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
    *   path="/api/users",
    *   operationId="postUser",
    *   tags={"usuarios"},
    *   summary="Crear nuevo usuario",
    *   description="Retorna nuevo usuario",
    *  
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema( required={"name"}, required={"email"}, required={"password"},
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="email", type="string"),
    *                   @OA\Property(property="password", type="string"),
    *                 ),
    *                 example={
    *                     "name":"Cristian Vergara",
    *                     "email":"cris_vergara@duocuc.cl",
    *                     "password":"********",
    *                }
    *             )
    *         )
    *       ),
    *       @OA\Response(
    *          response=200,
    *          description="success",
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="number", example=1),
    *              @OA\Property(property="name", type="string", example="Cristian Vergara"),
    *              @OA\Property(property="email", type="string", example="cris_vergara@duocuc.cl"),
    *              @OA\Property(property="password", type="string", example="********"),
    *              @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *              @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *          )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=422, description="Unprocessable Content", @OA\JsonContent(@OA\Property(property="message", type="string", example="The given data was invalid. field is required"),))
    * ),
    * @OA\Put (
    *   path="/api/users/{id}",
    *   operationId="updateUser",
    *   tags={"usuarios"},
    *   summary="Actualiza un usuario por id",
    *   description="Retorna el registro actualizado",
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="number")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="name", type="string"),
    *                   @OA\Property(property="email", type="string"),
    *                   @OA\Property(property="password", type="string"),
    *                 ),
    *                 example={
    *                     "name":"Cristian Vergara",
    *                     "email":"cris_vergara@duocuc.cl",
    *                     "password":"********",
    *                   }
    *               )
    *           )
    *       ),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="name", type="string", example="Cristian Vergara"),
    *               @OA\Property(property="email", type="string", example="cris_vergara@duocuc.cl"),
    *               @OA\Property(property="password", type="string", example="********"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z")
    *          )
    *       ),
    *       @OA\Response(response=400, description="Bad Request"),
    *       @OA\Response(response=404, description="Resource Not Found")
    *       
    * ),
    * @OA\Delete (
    *   path="/api/users/{id}",
    *   operationId="deleteUser",
    *   tags={"usuarios"},
    *   summary="Elimina un usuario por id",
    *   description="Retorna éxito de la eliminación",
    *   @OA\Parameter(
    *       in="path",
    *       name="id",
    *       required=true,
    *       @OA\Schema(type="number")
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="success",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Usuario eliminada con éxito"),
    *           @OA\Property(property="data", type="number", example="1")
    *       )
    *   )
    * ),    
    *
    *************************************************************************************************
    * # Boletas
    *************************************************************************************************
    *
    * @OA\Get (
    *       path="/api/tickets/{id}",
    *       operationId="getTicketById",
    *       tags={"boletas"},
    *       summary="Muestra una boleta por id",
    *       description="Retorna un registro por id",
    *       @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="integer")),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="ticket_amount", type="number", example="82.200"),
    *               @OA\Property(property="nro_ticket", type="interger", example="1195183"),
    *               @OA\Property(property="sale_id", type="number", example="7"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           )
    *       ),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Boleta no existe"),))
    * ),
    * @OA\Get (
    *   path="/api/tickets",
    *   operationId="getTicketsList",
    *   tags={"boletas"},
    *   summary="Listar todas las boletas",
    *   description="Retorna lista de boletas",
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(type="array", property="tickets",
    *                   @OA\Items(type="object",
    *                       @OA\Property(property="id", type="number", example="1"),
    *                       @OA\Property(property="ticket_amount", type="number", example="82.200"),
    *                       @OA\Property(property="nro_ticket", type="interger", example="1195183"),
    *                       @OA\Property(property="sale_id", type="number", example="7"),
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
    *   path="/api/tickets",
    *   operationId="postTicket",
    *   tags={"boletas"},
    *   summary="Crear nueva boleta",
    *   description="Retorna nueva boleta",
    *  
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema( required={"ticket_amount"}, required={"nro_ticket"},
    *               @OA\Property(type="object",
    *                   @OA\Property(property="ticket_amount", type="number"),
    *                   @OA\Property(property="nro_ticket", type="interger"),
    *                   @OA\Property(property="sale_id", type="number"),
    *                 ),
    *                 example={
    *                     "ticket_amount":"82.200",
    *                     "nro_ticket":"1195183",
    *                     "sale_id":"7",
    *                }
    *             )
    *         )
    *       ),
    *       @OA\Response(
    *          response=200,
    *          description="success",
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="number", example=1),
    *              @OA\Property(property="ticket_amount", type="number", example="82.200"),
    *              @OA\Property(property="nro_ticket", type="interger", example="1195183"),
    *              @OA\Property(property="sale_id", type="number", example="7"),
    *              @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *              @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *          )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=422, description="Unprocessable Content", @OA\JsonContent(@OA\Property(property="message", type="string", example="The given data was invalid. field is required"),))
    * ),
    * @OA\Put (
    *   path="/api/tickets/{id}",
    *   operationId="updateTicket",
    *   tags={"boletas"},
    *   summary="Actualiza un usuario por id",
    *   description="Retorna el registro actualizado",
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="number")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="ticket_amount", type="number"),
    *                   @OA\Property(property="nro_ticket", type="interger"),
    *                   @OA\Property(property="sale_id", type="number"),
    *                 ),
    *                 example={
    *                     "ticket_amount":"82.200",
    *                     "nro_ticket":"1195183",
    *                     "sale_id":"7",
    *                   }
    *               )
    *           )
    *       ),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="ticket_amount", type="number", example="82.200"),
    *               @OA\Property(property="nro_ticket", type="interger", example="1195183"),
    *               @OA\Property(property="sale_id", type="number", example="7"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z")
    *          )
    *       ),
    *       @OA\Response(response=400, description="Bad Request"),
    *       @OA\Response(response=404, description="Resource Not Found")
    *       
    * ),
    * @OA\Delete (
    *   path="/api/tickets/{id}",
    *   operationId="deleteTicket",
    *   tags={"boletas"},
    *   summary="Elimina una boleta por id",
    *   description="Retorna éxito de la eliminación",
    *   @OA\Parameter(
    *       in="path",
    *       name="id",
    *       required=true,
    *       @OA\Schema(type="number")
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="success",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Boleta eliminada con éxito"),
    *           @OA\Property(property="data", type="number", example="1")
    *       )
    *   )
    * ),    
    *
    *************************************************************************************************
    * # Facturas
    *************************************************************************************************
    *
    * @OA\Get (
    *       path="/api/bills/{id}",
    *       operationId="getBillById",
    *       tags={"facturas"},
    *       summary="Muestra una factura por id",
    *       description="Retorna un registro por id",
    *       @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="integer")),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="bill_amount", type="number", example="76.900"),
    *               @OA\Property(property="nro_bill", type="interger", example="5784233"),
    *               @OA\Property(property="sale_id", type="number", example="2"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *           )
    *       ),
    *       @OA\Response(response=403, description="Forbidden"),
    *       @OA\Response(response=404, description="Not Found", @OA\JsonContent(@OA\Property(property="message", type="string", example="Factura no existe"),))
    * ),
    * @OA\Get (
    *   path="/api/bills",
    *   operationId="getBillsList",
    *   tags={"facturas"},
    *   summary="Listar todas las facturas",
    *   description="Retorna lista de facturas",
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(type="array", property="bills",
    *                   @OA\Items(type="object",
    *                       @OA\Property(property="id", type="number", example="1"),
    *                       @OA\Property(property="bill_amount", type="number", example="76.900"),
    *                       @OA\Property(property="nro_bill", type="interger", example="5784233"),
    *                       @OA\Property(property="sale_id", type="number", example="2"),
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
    *   path="/api/bills",
    *   operationId="postBill",
    *   tags={"facturas"},
    *   summary="Crear nueva factura",
    *   description="Retorna nueva factura",
    *  
    *   @OA\RequestBody(
    *       @OA\MediaType(
    *           mediaType="application/json",
    *           @OA\Schema( required={"bill_amount"}, required={"nro_bill"},
    *               @OA\Property(type="object",
    *               @OA\Property(property="bill_amount", type="number"),
    *               @OA\Property(property="nro_bill", type="interger"),
    *               @OA\Property(property="sale_id", type="number"),
    *                 ),
    *                 example={
    *                     "bill_amount":"76.900",
    *                     "nro_bill":"5784233",
    *                     "sale_id":"2",
    *                }
    *             )
    *         )
    *       ),
    *       @OA\Response(
    *          response=200,
    *          description="success",
    *          @OA\JsonContent(
    *              @OA\Property(property="id", type="number", example=1),
    *              @OA\Property(property="bill_amount", type="number", example="76.900"),
    *              @OA\Property(property="nro_bill", type="interger", example="5784233"),
    *              @OA\Property(property="sale_id", type="number", example="2"),
    *              @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *              @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *          )
    *       ),
    *       @OA\Response(response=401, description="Unauthenticated"),
    *       @OA\Response(response=400, description="Invalid"),
    *       @OA\Response(response=422, description="Unprocessable Content", @OA\JsonContent(@OA\Property(property="message", type="string", example="The given data was invalid. field is required"),))
    * ),
    * @OA\Put (
    *   path="/api/bills/{id}",
    *   operationId="updateBill",
    *   tags={"facturas"},
    *   summary="Actualiza un factura por id",
    *   description="Retorna el registro actualizado",
    *   @OA\Parameter(in="path", name="id", required=true, @OA\Schema(type="number")),
    *   @OA\RequestBody(
    *       @OA\MediaType(mediaType="application/json",
    *           @OA\Schema(
    *               @OA\Property(type="object",
    *                   @OA\Property(property="bill_amount", type="number"),
    *                   @OA\Property(property="nro_bill", type="interger"),
    *                   @OA\Property(property="sale_id", type="number"),
    *                 ),
    *                 example={
    *                     "bill_amount":"76.900",
    *                     "nro_bill":"5784233",
    *                     "sale_id":"2",
    *                   }
    *               )
    *           )
    *       ),
    *       @OA\Response(
    *           response=200,
    *           description="success",
    *           @OA\JsonContent(
    *               @OA\Property(property="id", type="number", example=1),
    *               @OA\Property(property="bill_amount", type="number", example="76.900"),
    *               @OA\Property(property="nro_bill", type="interger", example="5784233"),
    *               @OA\Property(property="sale_id", type="number", example="2"),
    *               @OA\Property(property="updated_at", type="date", example="2022-05-21T00:43:54.000000Z"),
    *               @OA\Property(property="created_at", type="date", example="2022-05-21T00:43:54.000000Z")
    *          )
    *       ),
    *       @OA\Response(response=400, description="Bad Request"),
    *       @OA\Response(response=404, description="Resource Not Found")
    *       
    * ),
    * @OA\Delete (
    *   path="/api/bills/{id}",
    *   operationId="deleteBill",
    *   tags={"facturas"},
    *   summary="Elimina una factura por id",
    *   description="Retorna éxito de la eliminación",
    *   @OA\Parameter(
    *       in="path",
    *       name="id",
    *       required=true,
    *       @OA\Schema(type="number")
    *   ),
    *   @OA\Response(
    *       response=200,
    *       description="success",
    *       @OA\JsonContent(
    *           @OA\Property(property="message", type="string", example="Factura eliminada con éxito"),
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
