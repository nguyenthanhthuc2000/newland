<?php

namespace App\Repository;

interface RepositoryInterFace
{
    /**
     * Get all with order by default column id, desc
     * @param string $orderBy
     * @param string $column
     * @return mixed
     */
    public function getOrderBy($orderBy = 'DESC', $column = 'id');

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * @param mixed $attributes
     * @param array $except
     * @return mixed
     *
     */
    public function createGetId($attributes, $except);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function getByAttributes($attributes);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function getByAttributesAll($attributes);

    /**
     * * Get all order by default column id, desc
     * @param string $orderBy
     * @param string $column
     * @return mixed
     */
    public function getByPaginate($orderBy = 'DESC', $column = 'id');

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createGetIdItem($attributes);

    /**
     * @param string $attributes
     * @return mixed
     */
    public function getItemsBySlug($slug);
}
