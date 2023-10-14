<?php

function isSelected($id, $options)
{
    if ($options) {
        if (is_array($options) && !empty($options)) {
            foreach ($options as $option) {
                if ($id === $option->id) {
                    echo "selected";
                }
            }
        }
    }
}

function isRole($dataArr, $moduleName, $role = 'view')
{
    if (!empty($dataArr[$moduleName])) {
        $roleArr = $dataArr[$moduleName];
        if (!empty($roleArr && in_array($role, $roleArr))) {
            return true;
        }
    }
    return false;
}

function checkPermission($permissionJson, $moduleName, $role)
{
    if (!empty($permissionJson)) {
        $permissionArr = json_decode($permissionJson, true);
        return isRole($permissionArr, $moduleName, $role);
    }
    return false;
}