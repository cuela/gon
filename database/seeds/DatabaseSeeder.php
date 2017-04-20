<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AccessTableSeeder::class);

        $this->call(MenuCategoriaSeeder::class);

        $this->call(TaxonomiaCategoriaSeeder::class);

        $this->call(TaxonomiaSeeder::class);

        $this->call(ContenidoSeeder::class);
        
        $this->call(MenuDataSeeder::class);
        
        $this->call(CategoriaFragmentoSeeder::class);

        $this->call(FragmentoSeeder::class);
        
        $this->call(FragmentoEstaticoSeeder::class);
        
        $this->call(FragmentoCodigo::class);
        
        $this->call(ConfiguracionSeeder::class);

        $this->call(PlantillaSeeder::class);
        
        $this->call(ModuloSeeder::class);

        $this->call(AccionSeeder::class);

        $this->call(ClasificadorSeeder::class);

        //$this->call(ModuloAccionSeeder::class);

        $this->call(ModuloRolSeeder::class);

        $this->call(SecuenciaSeeder::class);
        
        $this->call(HistoryTypeTableSeeder::class);
        
        Model::reguard();
    }
}
