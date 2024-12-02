<?php
function check_access($id)
{

    $ci = \Config\Database::connect();
    $builder = $ci->table('information');
    $builder->where('id', $id);
    $query = $builder->get()->getResultArray();

    foreach ($query as $a) {

        if ($a['is_active'] == 1) {
            return ("checked");
        }
    }
}
