<?php namespace jakubsacha\adminlte\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Auth\Registrar;
use Kodeine\Acl\Models\Eloquent\Role;

class InstallCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'adminlte:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Go through AdminLte installation process.';
    /**
     * @var Registrar
     */
    private $registrar;

    /**
     * Create a new command instance.
     *
     * @param Registrar $registrar
     */
	public function __construct(Registrar $registrar)
	{
		parent::__construct();
        $this->registrar = $registrar;
    }

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $this->output->writeln('Creating admin account');
        $sName = $this->ask("Name:");
        $sEmail = $this->ask("Email:");
        $sPassword = $this->secret("Password:");

        $oUser = $this->registrar->create([
            'name'=>$sName,
            'email'=>$sEmail,
            'password'=>$sPassword
        ]);

        $oAdminRole = new Role();
        $oAdminRole->name = 'Administrator';
        $oAdminRole->slug = 'administrator';
        $oAdminRole->description = 'manage administration privileges';
        $oAdminRole->save();

        $oUser->assignRole($oAdminRole);

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
        return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
        return [];
	}

}
