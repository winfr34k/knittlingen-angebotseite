<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('CompanyTableSeeder');
		$this->command->info('Company table seeded!');

		$this->call('CategoryTableSeeder');
		$this->command->info('Category table seeded!');

		$this->call('SettingsTableSeeder');
		$this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'test@example.com', 'password' => Hash::make('test123'), 'is_admin' => true));
    }

}

class CompanyTableSeeder extends Seeder {

    public function run()
    {
        DB::table('companies')->delete();

        Company::create(array('name' => 'Testfirma GmbH', 'website' => 'http://example.com', 'user_id' => 1));
    }

}

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Category::create(array('name' => 'Weitere'));
    }

}

class SettingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('settings')->delete();

        Setting::create(array('name' => 'maintenanceMode', 'value' => '0'));
        Setting::create(array('name' => 'maintenanceModeText', 'value' => 'Diese Seite ist aus Wartungsgründen offline.'));
    }

}