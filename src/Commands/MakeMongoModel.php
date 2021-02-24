<?php

namespace Galatanovidiu\LaravelSnacks\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

/**
 * List all locally installed packages.
 *
 * @author JeroenG
 **/
class MakeMongoModel extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'galatan:mongo_model {name}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Make a mongo model.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('Models')) ? $rootNamespace.'\\Models' : $rootNamespace;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (parent::handle() === false && ! $this->option('force')) {
            return false;
        }
    }

    /**
     * @param $name
     * @return string|string[]
     */
    protected function buildClass($name)
    {
        return str_replace(
            '{{table_name}}',
            Str::plural(Str::snake($this->argument('name'))),
            parent::buildClass($name)
        );
    }


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return dirname(__DIR__).'/Stubs/mongo_model.stub';
    }
}
