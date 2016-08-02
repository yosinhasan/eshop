<?php

namespace App\Repositories;

/**
 * Base repository.
 * 
 * @author Yosin_Hasan
 */
interface BaseRepository {

    /**
     * Create an object.
     * 
     * @param $data form data
     * @return boolean. 
     *      Return true if object has been created otherwise false.
     */
    public function create($data);

    /**
     * Read object by id.
     * 
     * @param type $id object id
     * @return Object. 
     *      Return object, if the object
     *           with given id is existed, otherwise null.
     */
    public function read($id);

    /**
     * Update object.
     * 
     * @param $data form data
     * 
     * @return boolean. 
     *      Return true if object has been updated otherwise false.
     */
    public function update($data, $id);

    /**
     * Delete object by id.
     * 
     * @param type $id
     * @return boolean. 
     *      Return true if object has been deleted otherwise false.
     */
    public function delete($id);

    /**
     * Read all.
     * 
     * @return Collection<Oject>
     */
    public function readAll($limit = null);
}
