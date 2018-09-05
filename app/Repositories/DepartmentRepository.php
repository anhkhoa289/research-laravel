<?php
/**
 * Created by PhpStorm.
 * User: Khoa
 * Date: 8/16/2018
 * Time: 11:46 PM
 */

namespace App\Repositories;


use App\Category;
use App\Department;
use App\DepartmentClosure;
use App\DepartmentTree;
use App\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DepartmentRepository extends Repository implements DepartmentRepositoryInterface
{
    public function __construct()
    {
        $this->models = [
            'departmentModel' => Department::class,
            'closureModel' => DepartmentClosure::class,
            'treeModel' => DepartmentTree::class,
        ];
        parent::__construct();
    }

    /**
     * This is the service when init new group
     * Just use when you want create new tree
     * @return integer root_id
     */
    public function createRoot()
    {
        // check isset root_id for current group
        $check = $this->departmentModel
            ->join('department_closures', 'department_closures.descendant', '=', 'departments.id')
            ->where('departments.group_id', $this->group_id)
            ->where('department_closures.ancestor', self::ROOT_OF_DEPARTMENT)
            ->where('department_closures.depth', 1)
            ->select('departments.id')
            ->first();

        // if isset, return it
        if($check) {
            return $check->id;
        }

        DB::beginTransaction();

        // create Root of system Department if not exist
        $rootOfDepartment = $this->departmentModel->find(self::ROOT_OF_DEPARTMENT);
        if (!$rootOfDepartment) {
            $rootOfDepartment = new Department();
            $rootOfDepartment->id = self::ROOT_OF_DEPARTMENT;
            $rootOfDepartment->save();
        }

        // create Department
        $root = new Department();
        $root->group_id = $this->group_id;
        $root->save();

        // create Department Closure
        $rootClosure = [
            [ 'ancestor' => self::ROOT_OF_DEPARTMENT, 'descendant' => $root->id, 'depth' => 1 ],
            [ 'ancestor' => $root->id,                'descendant' => $root->id, 'depth' => 0 ],
        ];
        $this->closureModel->createMany($rootClosure);

        // create Department Tree
        $this->treeModel::create([
            'department_id' => $root->id,
            'path' => '1',
        ]);


        DB::commit();
        return $root->id;
    }

    /**
     * Create new node in tree
     * @param null|integer $parentId
     * @param array data
     */
    public function create($parentId = null, $data = [])
    {

    }
}