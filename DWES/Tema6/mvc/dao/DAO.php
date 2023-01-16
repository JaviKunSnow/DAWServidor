<?php

interface DAO {

    public function findAll();
    public function findById($id);
    public function insert($objeto);
    public function update($objeto);
    public function delete($objeto);

}

?>