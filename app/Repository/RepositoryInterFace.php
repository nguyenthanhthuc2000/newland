<?php

namespace App\Repository;

interface RepositoryInterFace
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

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
     * @return mixed
     */
    public function getAllItem();

    /**
     * @param array $attributes
     * @return mixed
     */
    public function createGetIdItem($attributes);
}
