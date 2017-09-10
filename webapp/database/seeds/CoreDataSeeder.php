<?php

use App\Models\Location;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Database\Seeder;

class CoreDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     * @return void
     * @throws Exception
     */
    public function run()
    {

        $this->seedRoles();
    }

    protected function seedRoles()
    {

        $roleTypes = [
            'app_admin',
            'app_user',
            'candidate',
            'company_member'
        ];

        foreach ($roleTypes as $roleType) {
            $role = new Role();
            $role->name = $roleType;
            $role->save();
        }

    }


}
