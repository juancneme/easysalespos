<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

		// DB::table('address')->truncate();
		// DB::table('catalog_products')->truncate();
		// DB::table('catalogs')->truncate();
		// DB::table('business_type')->truncate();
		// DB::table('categories')->truncate();
		// DB::table('clients')->truncate();
		// DB::table('clients_login')->truncate();
		// DB::table('combination')->truncate();
		// DB::table('combination_products')->truncate();
		// DB::table('companies')->truncate();
		// DB::table('companies_users')->truncate();
		// DB::table('configurations')->truncate();
		// DB::table('connections')->truncate();
		// DB::table('contacts')->truncate();
		// DB::table('contracts')->truncate();
		// DB::table('contracts_persons')->truncate();
		// DB::table('couriers')->truncate();
		// DB::table('credentials_services')->truncate();
		// DB::table('credit_payments')->truncate();
		// DB::table('cubes')->truncate();
		// DB::table('deliveries')->truncate();
		// DB::table('excel_field')->truncate();

		//LISTASendforeach
		DB::table('lists')->where('id', '<', 1000 )->delete();
		//PAISES
		// DB::table('lists')->where('id', '>=', 1000 )->where('id', '<', 2000 )->delete();
		//DEPARTAMENTOS
		// DB::table('lists')->where('id', '>=', 2000 )->where('id', '<', 4000 )->delete();
		//PAISES
		// DB::table('lists')->where('id', '>=', 4000 )->delete();
		//TODO
		//DB::table('LISTS')->truncate();

		// DB::table('manufacturers')->truncate();
		DB::table('permissions')->truncate();
		DB::table('permission_role')->truncate();
		DB::table('modules')->truncate();
		DB::table('role_module')->truncate();
		// DB::table('role_user')->truncate();
		DB::table('roles')->truncate();
		// DB::table('shift_managements')->truncate();
		// DB::table('special_prices')->truncate();
		// DB::table('suppliers')->truncate();
		// DB::table('taxcategories')->truncate();
		// DB::table('taxclasses')->truncate();
		// DB::table('taxfamilies')->truncate();
		// DB::table('taxsegments')->truncate();
		// DB::table('transactions')->truncate();
		// DB::table('transactions_details')->truncate();
		// DB::table('transactions_paymentmethods')->truncate();
		// DB::table('users')->truncate();
		// DB::table('vehicles')->truncate();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

		// $this->call(TaxsegmentsSeeder::class);
		// $this->call(TaxfamiliesSeeder::class);
		// $this->call(TaxclassesSeeder::class);
		// $this->call(TaxcategoriesSeeder::class);

		// $this->call(ConnectionsSeeder::class);
		// $this->call(CubesSeeder::class);
		// $this->call(QuerysSeeder::class);

		$this->call(ListsSeeder::class);

		// $this->call(ListspaisSeeder::class);
		// $this->call(ListsciuSeeder::class);
		// $this->call(ListsicoSeeder::class);
		// $this->call(PersonsSeeder::class);
		// $this->call(AddressSeeder::class);
		// $this->call(ContractsSeeder::class);
		// $this->call(UsersSeeder::class);
		$this->call(PermissionsSeeder::class);
		$this->call(ModulesSeeder::class);
		$this->call(RolesSeeder::class);
		// // $this->call(RoleUserSeeder::class);
		$this->call(RoleModuloSeeder::class);
		// $this->call(ConfigurationsSeeder::class);
		$this->call(PermissionRoleSeeder::class);
		// $this->call(ManufacturersSeeder::class);
		// $this->call(ProductsTaxesSeeder::class);
		// // $this->call(ProductsPicturesSeeder::class);
		// $this->call(CategoriesSeeder::class);
		// //$this->call(ProductsSeeder::class);
		// $this->call(CatalogsSeeder::class);
		// //$this->call(BusinessTypeSeeder::class);
		// $this->call(SuppliersSeeder::class);
		// //$this->call(CatalogproductsSeeder::class);
		// $this->call(CompaniesSeeder::class);
		// $this->call(ContractsPersonsSeeder::class);
		// $this->call(UpdateModulesSeeder::class);

	}
}
